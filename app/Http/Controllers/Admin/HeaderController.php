<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateHeaderRequest;
use App\Models\Header;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HeaderController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('header_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $headers = Header::with(['media'])->get();

        return view('admin.headers.index', compact('headers'));
    }

    public function edit(Header $header)
    {
        abort_if(Gate::denies('header_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headers.edit', compact('header'));
    }

    public function update(UpdateHeaderRequest $request, Header $header)
    {
        $header->update($request->all());

        if ($request->input('about_us', false)) {
            if (!$header->about_us || $request->input('about_us') !== $header->about_us->file_name) {
                if ($header->about_us) {
                    $header->about_us->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('about_us'))))->toMediaCollection('about_us');
            }
        } elseif ($header->about_us) {
            $header->about_us->delete();
        }

        if ($request->input('gallery', false)) {
            if (!$header->gallery || $request->input('gallery') !== $header->gallery->file_name) {
                if ($header->gallery) {
                    $header->gallery->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery'))))->toMediaCollection('gallery');
            }
        } elseif ($header->gallery) {
            $header->gallery->delete();
        }

        if ($request->input('videos', false)) {
            if (!$header->videos || $request->input('videos') !== $header->videos->file_name) {
                if ($header->videos) {
                    $header->videos->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('videos'))))->toMediaCollection('videos');
            }
        } elseif ($header->videos) {
            $header->videos->delete();
        }

        if ($request->input('news', false)) {
            if (!$header->news || $request->input('news') !== $header->news->file_name) {
                if ($header->news) {
                    $header->news->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('news'))))->toMediaCollection('news');
            }
        } elseif ($header->news) {
            $header->news->delete();
        }

        if ($request->input('programs', false)) {
            if (!$header->programs || $request->input('programs') !== $header->programs->file_name) {
                if ($header->programs) {
                    $header->programs->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('programs'))))->toMediaCollection('programs');
            }
        } elseif ($header->programs) {
            $header->programs->delete();
        }

        if ($request->input('faq', false)) {
            if (!$header->faq || $request->input('faq') !== $header->faq->file_name) {
                if ($header->faq) {
                    $header->faq->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('faq'))))->toMediaCollection('faq');
            }
        } elseif ($header->faq) {
            $header->faq->delete();
        }

        if ($request->input('cooperation', false)) {
            if (!$header->cooperation || $request->input('cooperation') !== $header->cooperation->file_name) {
                if ($header->cooperation) {
                    $header->cooperation->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('cooperation'))))->toMediaCollection('cooperation');
            }
        } elseif ($header->cooperation) {
            $header->cooperation->delete();
        }

        if ($request->input('contact', false)) {
            if (!$header->contact || $request->input('contact') !== $header->contact->file_name) {
                if ($header->contact) {
                    $header->contact->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('contact'))))->toMediaCollection('contact');
            }
        } elseif ($header->contact) {
            $header->contact->delete();
        }

        if ($request->input('branches', false)) {
            if (!$header->branches || $request->input('branches') !== $header->branches->file_name) {
                if ($header->branches) {
                    $header->branches->delete();
                }
                $header->addMedia(storage_path('tmp/uploads/' . basename($request->input('branches'))))->toMediaCollection('branches');
            }
        } elseif ($header->branches) {
            $header->branches->delete();
        }

        return redirect()->route('admin.headers.index');
    }

    public function show(Header $header)
    {
        abort_if(Gate::denies('header_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headers.show', compact('header'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('header_create') && Gate::denies('header_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Header();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
