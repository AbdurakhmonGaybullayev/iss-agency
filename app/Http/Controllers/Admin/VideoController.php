<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVideoRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Video;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videos = Video::get();

        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        abort_if(Gate::denies('video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = Video::where('type',1)->pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.videos.create', compact('parents'));
    }

    public function store(StoreVideoRequest $request)
    {
        $video = Video::create($request->all());

        if ($request->input('cover', false)) {
            $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        if ($request->input('file', false)) {
            $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $video->id]);
        }

        return redirect()->route('admin.videos.index');
    }

    public function edit(Video $video)
    {
        abort_if(Gate::denies('video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = Video::where('type',1)->where('id','!=','id')->pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $video->load('parent');

        return view('admin.videos.edit', compact('parents', 'video'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->update($request->all());

        if ($request->input('cover', false)) {
            if (!$video->cover || $request->input('cover') !== $video->cover->file_name) {
                if ($video->cover) {
                    $video->cover->delete();
                }
                $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($video->cover) {
            $video->cover->delete();
        }

        if ($request->input('file', false)) {
            if (!$video->file || $request->input('file') !== $video->file->file_name) {
                if ($video->file) {
                    $video->file->delete();
                }
                $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($video->file) {
            $video->file->delete();
        }

        return redirect()->route('admin.videos.index');
    }

    public function show(Video $video)
    {
        abort_if(Gate::denies('video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->load('parent');

        return view('admin.videos.show', compact('video'));
    }

    public function destroy(Video $video)
    {
        abort_if(Gate::denies('video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->delete();

        return back();
    }

    public function massDestroy(MassDestroyVideoRequest $request)
    {
        Video::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('video_create') && Gate::denies('video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Video();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
