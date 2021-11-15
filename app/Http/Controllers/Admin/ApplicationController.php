<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Models\Application;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applications = Application::with(['user'])->get();

        $users = User::get();

        return view('admin.applications.index', compact('applications', 'users'));
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->load('user');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationRequest $request)
    {
        Application::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
