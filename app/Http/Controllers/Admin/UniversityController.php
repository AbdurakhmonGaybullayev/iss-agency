<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUniversityRequest;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\Direction;
use App\Models\University;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UniversityController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('university_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $universities = University::with(['country', 'directions', 'certificates', 'media'])->get();

        $countries = Country::get();

        $directions = Direction::get();

        $certificates = Certificate::get();

        return view('admin.universities.index', compact('universities', 'countries', 'directions', 'certificates'));
    }

    public function create()
    {
        abort_if(Gate::denies('university_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $directions = Direction::pluck('name_uz', 'id');

        $certificates = Certificate::pluck('name', 'id');

        return view('admin.universities.create', compact('countries', 'directions', 'certificates'));
    }

    public function store(StoreUniversityRequest $request)
    {
        $university = University::create($request->all());
        $university->directions()->sync($request->input('directions', []));
        $university->certificates()->sync($request->input('certificates', []));
        if ($request->input('university_logo', false)) {
            $university->addMedia(storage_path('tmp/uploads/' . basename($request->input('university_logo'))))->toMediaCollection('university_logo');
        }

        if ($request->input('image', false)) {
            $university->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $university->id]);
        }

        return redirect()->route('admin.universities.index');
    }

    public function edit(University $university)
    {
        abort_if(Gate::denies('university_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $directions = Direction::pluck('name_uz', 'id');

        $certificates = Certificate::pluck('name', 'id');

        $university->load('country', 'directions', 'certificates');

        return view('admin.universities.edit', compact('countries', 'directions', 'certificates', 'university'));
    }

    public function update(UpdateUniversityRequest $request, University $university)
    {
        $university->update($request->all());
        $university->directions()->sync($request->input('directions', []));
        $university->certificates()->sync($request->input('certificates', []));
        if ($request->input('university_logo', false)) {
            if (!$university->university_logo || $request->input('university_logo') !== $university->university_logo->file_name) {
                if ($university->university_logo) {
                    $university->university_logo->delete();
                }
                $university->addMedia(storage_path('tmp/uploads/' . basename($request->input('university_logo'))))->toMediaCollection('university_logo');
            }
        } elseif ($university->university_logo) {
            $university->university_logo->delete();
        }

        if ($request->input('image', false)) {
            if (!$university->image || $request->input('image') !== $university->image->file_name) {
                if ($university->image) {
                    $university->image->delete();
                }
                $university->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($university->image) {
            $university->image->delete();
        }

        return redirect()->route('admin.universities.index');
    }

    public function show(University $university)
    {
        abort_if(Gate::denies('university_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $university->load('country', 'directions', 'certificates', 'universityDocuments');

        return view('admin.universities.show', compact('university'));
    }

    public function destroy(University $university)
    {
        abort_if(Gate::denies('university_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $university->delete();

        return back();
    }

    public function massDestroy(MassDestroyUniversityRequest $request)
    {
        University::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('university_create') && Gate::denies('university_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new University();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
