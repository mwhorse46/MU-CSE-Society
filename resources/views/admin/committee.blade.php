@extends('admin.master')

@section('page-title')
{{ $title }}
@endsection

@section('dashboard-name')
{{ $title }}
@endsection

@section('content')
<div class="content" style="position:absolute; top:55px">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="sub-content">
        <h3>Member's Roles</h3>
        <table class="tbl-role">
            <tbody>
                <tr>
                    <td>Role</td>
                    <td>Rank</td>
                    <td><a class="btnAddItem icon-plus" style="font-size:16px" onclick="openRoleAddForm()"> Add New Role </a></td>
                </tr>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->role }}</td>
                    <td>{{ $role->rank }}</td>
                    <td>
                        <a onclick="openRoleEditForm( {{$role->id}}, '{{$role->role}}', {{$role->rank}})" class="btnCreate icon-edit"> Edit </a>
                        <a href="{{ asset('admin/deleteRole?id='.$role->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete icon-delete"> Delete </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="form-popup form-role" id="RoleForm">
        <form name="roleForm" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Member Role</h3>
            <table width=100%>
                <tbody>
                    <tr>
                        <input type="hidden" name="id" id="ID">
                    </tr>
                    <tr>
                        <td class="td-left"> Role* </td>
                        <td><input type="text" placeholder="New Role" name="role" id="ROLE" maxlength="100" required></td>
                    </tr>

                    <tr>
                        <td class="td-left"> Rank* </td>
                        <td><input type="number" placeholder="Role Rank" name="rank" id="RANK" min="1" required></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" class="btnCreate" id="BtnAdd" value="Add">
            <button type="button" class="btnDelete" onclick="closeRoleForm()">Cancel</button>
        </form>
    </div>

    <br>
    <a href="{{ route('addmember') }}" class="btnAddItem icon-plus"> Add Member </a>
    <h3>Committee Members</h3>


</div>
@endsection 