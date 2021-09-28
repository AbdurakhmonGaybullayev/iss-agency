<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCooperationRequest;
use App\Models\Cooperation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CooperationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cooperation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cooperations = Cooperation::with(['user'])->get();

        return view('admin.cooperations.index', compact('cooperations'));
    }

    public function show(Cooperation $cooperation)
    {
        abort_if(Gate::denies('cooperation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cooperation->load('user');

        return view('admin.cooperations.show', compact('cooperation'));
    }

    public function destroy(Cooperation $cooperation)
    {
        abort_if(Gate::denies('cooperation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cooperation->delete();

        return back();
    }

    public function massDestroy(MassDestroyCooperationRequest $request)
    {
        Cooperation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
