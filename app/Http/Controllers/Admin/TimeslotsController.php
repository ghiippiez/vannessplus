<?php

namespace VannessPlus\Http\Controllers\Admin;

use VannessPlus\Timeslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use VannessPlus\Http\Controllers\Controller;
use VannessPlus\Http\Requests\Admin\StoreTimeslotsRequest;
use VannessPlus\Http\Requests\Admin\UpdateTimeslotsRequest;

class TimeslotsController extends Controller
{
    /**
     * Display a listing of Timeslot.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('timeslot_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('timeslot_delete')) {
                return abort(401);
            }
            $timeslots = Timeslot::onlyTrashed()->get();
        } else {
            $timeslots = Timeslot::all();
        }

        return view('admin.timeslots.index', compact('timeslots'));
    }

    /**
     * Show the form for creating new Timeslot.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('timeslot_create')) {
            return abort(401);
        }
        
        $managers = \VannessPlus\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.timeslots.create', compact('managers'));
    }

    /**
     * Store a newly created Timeslot in storage.
     *
     * @param  \VannessPlus\Http\Requests\StoreTimeslotsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeslotsRequest $request)
    {
        if (! Gate::allows('timeslot_create')) {
            return abort(401);
        }
        $timeslot = Timeslot::create($request->all());



        return redirect()->route('admin.timeslots.index');
    }


    /**
     * Show the form for editing Timeslot.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('timeslot_edit')) {
            return abort(401);
        }
        
        $managers = \VannessPlus\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $timeslot = Timeslot::findOrFail($id);

        return view('admin.timeslots.edit', compact('timeslot', 'managers'));
    }

    /**
     * Update Timeslot in storage.
     *
     * @param  \VannessPlus\Http\Requests\UpdateTimeslotsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeslotsRequest $request, $id)
    {
        if (! Gate::allows('timeslot_edit')) {
            return abort(401);
        }
        $timeslot = Timeslot::findOrFail($id);
        $timeslot->update($request->all());



        return redirect()->route('admin.timeslots.index');
    }


    /**
     * Display Timeslot.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('timeslot_view')) {
            return abort(401);
        }
        $timeslot = Timeslot::findOrFail($id);

        return view('admin.timeslots.show', compact('timeslot'));
    }


    /**
     * Remove Timeslot from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('timeslot_delete')) {
            return abort(401);
        }
        $timeslot = Timeslot::findOrFail($id);
        $timeslot->delete();

        return redirect()->route('admin.timeslots.index');
    }

    /**
     * Delete all selected Timeslot at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('timeslot_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Timeslot::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Timeslot from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('timeslot_delete')) {
            return abort(401);
        }
        $timeslot = Timeslot::onlyTrashed()->findOrFail($id);
        $timeslot->restore();

        return redirect()->route('admin.timeslots.index');
    }

    /**
     * Permanently delete Timeslot from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('timeslot_delete')) {
            return abort(401);
        }
        $timeslot = Timeslot::onlyTrashed()->findOrFail($id);
        $timeslot->forceDelete();

        return redirect()->route('admin.timeslots.index');
    }
}
