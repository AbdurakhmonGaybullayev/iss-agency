<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHeaderRequest;
use App\Models\Header;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HeaderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('header_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $headers = Header::all();

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

        return redirect()->route('admin.headers.index');
    }

    public function show(Header $header)
    {
        abort_if(Gate::denies('header_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headers.show', compact('header'));
    }
}
