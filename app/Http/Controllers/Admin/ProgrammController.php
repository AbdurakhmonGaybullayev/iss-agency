<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgrammRequest;
use App\Http\Requests\StoreProgrammRequest;
use App\Http\Requests\UpdateProgrammRequest;
use App\Models\Programm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgrammController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('programm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programms = Programm::all();

        return view('admin.programms.index', compact('programms'));
    }

    public function create()
    {
        abort_if(Gate::denies('programm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.programms.create');
    }

    public function store(StoreProgrammRequest $request)
    {
        $programm = Programm::create($request->all());

        return redirect()->route('admin.programms.index');
    }

    public function edit(Programm $programm)
    {
        abort_if(Gate::denies('programm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.programms.edit', compact('programm'));
    }

    public function update(UpdateProgrammRequest $request, Programm $programm)
    {
        $programm->update($request->all());

        return redirect()->route('admin.programms.index');
    }

    public function show(Programm $programm)
    {
        abort_if(Gate::denies('programm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programm->load('programmDirections');

        return view('admin.programms.show', compact('programm'));
    }

    public function destroy(Programm $programm)
    {
        abort_if(Gate::denies('programm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programm->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgrammRequest $request)
    {
        Programm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
