<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateHomeDirectionSectionRequest;
use App\Models\HomeDirectionSection;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HomeDirectionSectionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('home_direction_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeDirectionSections = HomeDirectionSection::with(['media'])->get();

        return view('admin.homeDirectionSections.index', compact('homeDirectionSections'));
    }

    public function edit(HomeDirectionSection $homeDirectionSection)
    {
        abort_if(Gate::denies('home_direction_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homeDirectionSections.edit', compact('homeDirectionSection'));
    }

    public function update(UpdateHomeDirectionSectionRequest $request, HomeDirectionSection $homeDirectionSection)
    {
        $homeDirectionSection->update($request->all());

        if ($request->input('image', false)) {
            if (!$homeDirectionSection->image || $request->input('image') !== $homeDirectionSection->image->file_name) {
                if ($homeDirectionSection->image) {
                    $homeDirectionSection->image->delete();
                }
                $homeDirectionSection->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($homeDirectionSection->image) {
            $homeDirectionSection->image->delete();
        }

        return redirect()->route('admin.home-direction-sections.index');
    }

    public function show(HomeDirectionSection $homeDirectionSection)
    {
        abort_if(Gate::denies('home_direction_section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homeDirectionSections.show', compact('homeDirectionSection'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('home_direction_section_create') && Gate::denies('home_direction_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HomeDirectionSection();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
