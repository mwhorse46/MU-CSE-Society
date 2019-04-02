<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Role;
use App\Member;

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
        $topMember = DB::table('members')->join('roles', 'roles.id', '=', 'members.role_id')->skip(0)->take(3)->orderBy('rank', 'ASC')->get(['members.*', 'roles.role', 'roles.rank']);

        $count = Member::count();
        $limit = $count - 3;
        if ($count > 3) {
            $others = DB::table('members')->join('roles', 'roles.id', '=', 'members.role_id')->skip(3)->take($limit)->orderBy('rank', 'ASC')->get(['members.*', 'roles.role', 'roles.rank']);
        } else {
            $others = Member::where('name', '=', 'null');
        }
        return view('admin.committee', ['title' => $title, 'roles' => $roles, 'topMember' => $topMember, 'others' => $others]);
    }

    public function addForm()
    {
        $title = "Committee";
        $roles = Role::orderBy('rank', 'ASC')->get();
        $action = "/admin/insertMember";
        $button = "Save";
        return view('admin.memberEditForm', ['title' => $title, 'roles' => $roles, 'action' => $action, 'button' => $button]);
    }

    public function insertMember(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact' => 'min:5|max:11'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image');
            $extension = $imageName->getClientOriginalExtension();
            $image = date('Y-m-d') . '-' . str_random(10) . '.' . $extension;
            $imageName->move(public_path('images/'), $image);
        }

        $member = new Member();
        $member->name = $request->input('name');
        $member->image = $image;
        $member->role_id = $request->input('role');
        $member->mail = $request->input('mail');
        $member->contact = $request->input('contact');
        $member->address = $request->input('address');
        $member->session = $request->input('period');
        $member->work = $request->input('work')===null? "" : $request->input('work');

        $member->save();
        return redirect('/admin/committee')->with('status', 'Member Added Successfully.');
    }

    public function editForm(Request $request)
    {
        $id = $request->get('id');
        $member = DB::table('members')->join('roles', 'roles.id', '=', 'members.role_id')->where('members.id', '=', $id)->first(['members.*', 'roles.role', 'roles.rank']);
        $roles = Role::orderBy('rank', 'ASC')->get();

        $title = "Committee";
        $action = "/admin/updateMember";
        $button = "Update";
        return view('admin.memberEditForm', ['title' => $title, 'member' => $member, 'roles' => $roles, 'action' => $action, 'button' => $button]);
    }

    public function updateMember(Request $request)
    {
        $id = $request->get('id');
        $member = Member::find($id);

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact' => 'min:5|max:11'
        ]);

        $image = $request->get('imageOld');
        if ($request->hasFile('image')) {
            $imageName = $request->file('image');
            $extension = $imageName->getClientOriginalExtension();
            $image = date('Y-m-d') . '-' . str_random(10) . '.' . $extension;
            $imageName->move(public_path('images/'), $image);
        }

        $member->name = $request->input('name');
        $member->image = $image;
        $member->role_id = $request->input('role');
        $member->mail = $request->input('mail');
        $member->contact = $request->input('contact');
        $member->address = $request->input('address');
        $member->session = $request->input('period');
        $member->work = $request->input('work')===null? "" : $request->input('work');

        $member->save();
        return redirect('/admin/committee')->with('status', 'Member Updated Successfully.');
    }

    public function deleteMember(Request $request)
    {
        $id = $request->get('id');
        $member = Member::find($id);
        $member->delete();
        return redirect('/admin/committee')->with('status', 'Member Deleted Successfully.');
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
