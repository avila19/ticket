<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPriorityRequest;
use App\Http\Requests\StorePriorityRequest;
use App\Http\Requests\UpdatePriorityRequest;
use App\Priority;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrioritiesController extends Controller
{
    public function index()
    {

        $priorities = Priority::all();

        return view('admin.priorities.index', compact('priorities'));
    }

    public function create()
    {

        return view('admin.priorities.create');
    }

    public function store(StorePriorityRequest $request)
    {
        $priority = Priority::create($request->all());

        return redirect()->route('admin.priorities.index');
    }

    public function edit(Priority $priority)
    {

        return view('admin.priorities.edit', compact('priority'));
    }

    public function update(UpdatePriorityRequest $request, Priority $priority)
    {
        $priority->update($request->all());

        return redirect()->route('admin.priorities.index');
    }

    public function show(Priority $priority)
    {

        return view('admin.priorities.show', compact('priority'));
    }

    public function destroy(Priority $priority)
    {

        $priority->delete();

        return back();
    }

}
