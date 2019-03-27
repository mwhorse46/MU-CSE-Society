<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Committee";
        $roles = Role::orderBy('rank', 'ASC')->get();
        return view('admin.committee', ['title' => $title, 'roles' => $roles]);
    }

    public function addForm()
    {
        $title = "Committee";
        return "Have Not Worked Yet!!!";
    }
    
    public function insertRole(Request $request)
    {
        $role = new Role();
        $role->role = $request->input('role');
        $role->rank = $request->input('rank');

        $role->save();
        return redirect('/admin/committee')->with('status', 'Member Role Added Successfully.');
    }

    public function updateRole(Request $request)
    {
        $id = $request->get('id');
        $role = Role::find($id);
        $role->role = $request->input('role');
        $role->rank = $request->input('rank');

        $role->save();
        return redirect('/admin/committee')->with('status', 'Member Role Updated Successfully.');
    }

    public function deleteRole(Request $request)
    {
        $id = $request->get('id');
        $role = Role::find($id);
        $role->delete();
        return redirect('/admin/committee')->with('status', 'Role Deleted Successfully.');
    }
}
