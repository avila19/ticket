<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStatusRequest;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Status;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusesController extends Controller
{
    public function index()
    {

        $statuses = Status::all();

        return view('admin.statuses.index', compact('statuses'));
    }

    public function create()
    {

        return view('admin.statuses.create');
    }

    public function store(StoreStatusRequest $request)
    {
        $status = Status::create($request->all());

        return redirect()->route('admin.statuses.index');
    }

    public function edit(Status $status)
    {

        return view('admin.statuses.edit', compact('status'));
    }

    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->update($request->all());

        return redirect()->route('admin.statuses.index');
    }

    public function show(Status $status)
    {

        return view('admin.statuses.show', compact('status'));
    }

    public function destroy(Status $status)
    {

        $status->delete();

        return back();
    }

}
