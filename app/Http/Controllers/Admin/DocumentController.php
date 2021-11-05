<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentRequest;
use App\Models\Certificate;
use App\Models\Direction;
use App\Models\Document;
use App\Models\University;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documents = Document::with(['user', 'university', 'certificates', 'direction', 'media'])->get();

        $users = User::get();

        $universities = University::get();

        $certificates = Certificate::get();

        $directions = Direction::get();

        return view('admin.documents.index', compact('documents', 'users', 'universities', 'certificates', 'directions'));
    }

    public function show(Document $document)
    {
        abort_if(Gate::denies('document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document->load('user', 'university', 'certificates', 'direction');

        return view('admin.documents.show', compact('document'));
    }


    public function destroy(Document $document)
    {
        abort_if(Gate::denies('document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        function deleteDirectory($dir) {
            if (!file_exists($dir)) {
                return true;
            }

            if (!is_dir($dir)) {
                return unlink($dir);
            }

            foreach (scandir($dir) as $item) {
                if ($item == '.' || $item == '..') {
                    continue;
                }

                if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                    return false;
                }

            }

            return rmdir($dir);
        }

        if (deleteDirectory(public_path('storage/documents/'.$document->folder_name)) && $document->delete()){
            return back();
        }


    }



    public function massDestroy(MassDestroyDocumentRequest $request)
    {
        Document::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('document_create') && Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Document();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }


}
