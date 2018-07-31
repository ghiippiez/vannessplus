<?php

namespace VannessPlus\Http\Controllers\Admin;

use VannessPlus\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use VannessPlus\Http\Controllers\Controller;
use VannessPlus\Http\Requests\Admin\StoreUsersRequest;
use VannessPlus\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }


                $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        
        $roles = \VannessPlus\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $positions = \VannessPlus\Appointment::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.users.create', compact('roles', 'positions'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \VannessPlus\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $user = User::create($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        
        $roles = \VannessPlus\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $positions = \VannessPlus\Appointment::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles', 'positions'));
    }

    /**
     * Update User in storage.
     *
     * @param  \VannessPlus\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        
        $roles = \VannessPlus\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $positions = \VannessPlus\Appointment::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$timeslots = \VannessPlus\Timeslot::where('manager_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'timeslots'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
