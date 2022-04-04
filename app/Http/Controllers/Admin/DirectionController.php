<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDirectionRequest;
use App\Http\Requests\StoreDirectionRequest;
use App\Http\Requests\UpdateDirectionRequest;
use App\Models\Direction;
use App\Models\Programm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DirectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('direction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $directions = Direction::with(['programms'])->get();

        $programms = Programm::get();

        return view('admin.directions.index', compact('directions', 'programms'));
    }

    public function create()
    {
        abort_if(Gate::denies('direction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programms = Programm::pluck('name_uz', 'id');

        return view('admin.directions.create', compact('programms'));
    }

    public function store(StoreDirectionRequest $request)
    {
        $direction = Direction::create($request->all());
        $direction->programms()->sync($request->input('programms', []));

        return redirect()->route('admin.directions.index');
    }

    public function edit(Direction $direction)
    {
        abort_if(Gate::denies('direction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programms = Programm::pluck('name_uz', 'id');

        $direction->load('programms');

        return view('admin.directions.edit', compact('programms', 'direction'));
    }

    public function update(UpdateDirectionRequest $request, Direction $direction)
    {
        $direction->update($request->all());
        $direction->programms()->sync($request->input('programms', []));

        return redirect()->route('admin.directions.index');
    }

    public function show(Direction $direction)
    {
        abort_if(Gate::denies('direction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $direction->load('programms', 'directionDocuments', 'directionUniversities');

        return view('admin.directions.show', compact('direction'));
    }

    public function destroy(Direction $direction)
    {
        abort_if(Gate::denies('direction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $direction->delete();

        return back();
    }

    public function massDestroy(MassDestroyDirectionRequest $request)
    {
        Direction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
