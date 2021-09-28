<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMainHeaderRequest;
use App\Http\Requests\StoreMainHeaderRequest;
use App\Http\Requests\UpdateMainHeaderRequest;
use App\Models\MainHeader;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MainHeaderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('main_header_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainHeaders = MainHeader::with(['media'])->get();

        return view('admin.mainHeaders.index', compact('mainHeaders'));
    }

    public function create()
    {
        abort_if(Gate::denies('main_header_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mainHeaders.create');
    }

    public function store(StoreMainHeaderRequest $request)
    {
        $mainHeader = MainHeader::create($request->all());

        if ($request->input('background_image', false)) {
            $mainHeader->addMedia(storage_path('tmp/uploads/' . basename($request->input('background_image'))))->toMediaCollection('background_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mainHeader->id]);
        }

        return redirect()->route('admin.main-headers.index');
    }

    public function edit(MainHeader $mainHeader)
    {
        abort_if(Gate::denies('main_header_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mainHeaders.edit', compact('mainHeader'));
    }

    public function update(UpdateMainHeaderRequest $request, MainHeader $mainHeader)
    {
        $mainHeader->update($request->all());

        if ($request->input('background_image', false)) {
            if (!$mainHeader->background_image || $request->input('background_image') !== $mainHeader->background_image->file_name) {
                if ($mainHeader->background_image) {
                    $mainHeader->background_image->delete();
                }
                $mainHeader->addMedia(storage_path('tmp/uploads/' . basename($request->input('background_image'))))->toMediaCollection('background_image');
            }
        } elseif ($mainHeader->background_image) {
            $mainHeader->background_image->delete();
        }

        return redirect()->route('admin.main-headers.index');
    }

    public function show(MainHeader $mainHeader)
    {
        abort_if(Gate::denies('main_header_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mainHeaders.show', compact('mainHeader'));
    }

    public function destroy(MainHeader $mainHeader)
    {
        abort_if(Gate::denies('main_header_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainHeader->delete();

        return back();
    }

    public function massDestroy(MassDestroyMainHeaderRequest $request)
    {
        MainHeader::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('main_header_create') && Gate::denies('main_header_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MainHeader();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
