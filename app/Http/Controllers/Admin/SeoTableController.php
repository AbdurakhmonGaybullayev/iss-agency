<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSeoTableRequest;
use App\Models\SeoTable;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SeoTableController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('seo_table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seoTables = SeoTable::with(['media'])->get();

        return view('admin.seoTables.index', compact('seoTables'));
    }

    public function edit(SeoTable $seoTable)
    {
        abort_if(Gate::denies('seo_table_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seoTables.edit', compact('seoTable'));
    }

    public function update(UpdateSeoTableRequest $request, SeoTable $seoTable)
    {
        $seoTable->update($request->all());

        if ($request->input('image', false)) {
            if (!$seoTable->image || $request->input('image') !== $seoTable->image->file_name) {
                if ($seoTable->image) {
                    $seoTable->image->delete();
                }
                $seoTable->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($seoTable->image) {
            $seoTable->image->delete();
        }

        return redirect()->route('admin.seo-tables.index');
    }

    public function show(SeoTable $seoTable)
    {
        abort_if(Gate::denies('seo_table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seoTables.show', compact('seoTable'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('seo_table_create') && Gate::denies('seo_table_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SeoTable();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
