<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCooperationOfferTextRequest;
use App\Models\CooperationOfferText;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CooperationOfferTextController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cooperation_offer_text_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cooperationOfferTexts = CooperationOfferText::all();

        return view('admin.cooperationOfferTexts.index', compact('cooperationOfferTexts'));
    }

    public function edit(CooperationOfferText $cooperationOfferText)
    {
        abort_if(Gate::denies('cooperation_offer_text_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cooperationOfferTexts.edit', compact('cooperationOfferText'));
    }

    public function update(UpdateCooperationOfferTextRequest $request, CooperationOfferText $cooperationOfferText)
    {
        $cooperationOfferText->update($request->all());

        return redirect()->route('admin.cooperation-offer-texts.index');
    }

    public function show(CooperationOfferText $cooperationOfferText)
    {
        abort_if(Gate::denies('cooperation_offer_text_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cooperationOfferTexts.show', compact('cooperationOfferText'));
    }
}
