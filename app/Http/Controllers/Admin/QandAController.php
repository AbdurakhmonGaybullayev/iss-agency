<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQandARequest;
use App\Http\Requests\StoreQandARequest;
use App\Http\Requests\UpdateQandARequest;
use App\Models\QandA;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QandAController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('qand_a_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qandAs = QandA::all();

        return view('admin.qandAs.index', compact('qandAs'));
    }

    public function create()
    {
        abort_if(Gate::denies('qand_a_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qandAs.create');
    }

    public function store(StoreQandARequest $request)
    {
        $qandA = QandA::create($request->all());

        return redirect()->route('admin.qand-as.index');
    }

    public function edit(QandA $qandA)
    {
        abort_if(Gate::denies('qand_a_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qandAs.edit', compact('qandA'));
    }

    public function update(UpdateQandARequest $request, QandA $qandA)
    {
        $qandA->update($request->all());

        return redirect()->route('admin.qand-as.index');
    }

    public function show(QandA $qandA)
    {
        abort_if(Gate::denies('qand_a_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qandAs.show', compact('qandA'));
    }

    public function destroy(QandA $qandA)
    {
        abort_if(Gate::denies('qand_a_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qandA->delete();

        return back();
    }

    public function massDestroy(MassDestroyQandARequest $request)
    {
        QandA::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
