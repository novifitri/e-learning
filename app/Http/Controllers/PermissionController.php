<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view("permission.index", compact("roles", "permissions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("permission.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ],
        [
            'name.required' => "Nama role harus diisi",
            "name.max" => "Karakter tidak boleh lebih dari 255"
        ]);
        Permission::create(['name' => $request->get('name')]);
        $request->session()->flash('success', 'A new permissions has been created');
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::all();
        // dd($role->permissions->pluck("id"));
        // dd($permissions->pluck("id")->toArray());
        // dd(in_array($role->permissions->pluck("id")->toArray(), $permissions->pluck("id")->toArray()));
        return view("permission.edit", compact("role", "permissions"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->syncPermissions($request->get("permissions"));
        $request->session()->flash('success', 'Assing permission to role successfuly');
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $permissions = Permission::findById($id);
        $permissions->delete();
        $request->session()->flash('success', 'Permissions has been deleted');
        return redirect()->route('permissions.index');
    }
}
