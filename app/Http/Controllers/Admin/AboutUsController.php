<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('about_us_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aboutuses = AboutUs::with(['media'])->get();

        return view('admin.aboutuses.index', compact('aboutuses'));
    }

    public function edit(AboutUs $aboutus)
    {
        abort_if(Gate::denies('about_us_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutuses.edit', compact('aboutus'));
    }

    public function update(UpdateAboutUsRequest $request, AboutUs $aboutus)
    {
        $aboutus->update($request->all());

        if ($request->input('image', false)) {
            if (!$aboutus->image || $request->input('image') !== $aboutus->image->file_name) {
                if ($aboutus->image) {
                    $aboutus->image->delete();
                }
                $aboutus->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($aboutus->image) {
            $aboutus->image->delete();
        }

        return redirect()->route('admin.aboutuses.index');
    }

    public function show(AboutUs $aboutus)
    {
        abort_if(Gate::denies('about_us_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.aboutuses.show', compact('aboutus'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('about_us_create') && Gate::denies('about_us_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AboutUs();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
