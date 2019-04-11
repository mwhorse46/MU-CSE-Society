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

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="sub-content">
        <button class="collapsible" onclick="toggle()">
            <div class="icon-drop-down toggle rotate-down">&nbsp;</div>&nbsp;&nbsp;<strong>Member's Roles</strong>
        </button>
        <div class="role">
            <table class="tbl-role">
                <tbody>
                    <tr>
                        <td><strong>Role</strong></td>
                        <td><strong>Rank</strong></td>
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
        <hr style="margin-top: 15px; width: 50%">
    </div>

    <a href="{{ route('addmember') }}" class="btnAddItem icon-plus" style="margin-top: -20px"> Add Member </a>
    <h3 style="margin-bottom: 0px">Committee Members</h3>

    <div class="sub-content">    
        <div class="selector">
            <p>Select from working period :</p>
            <select id="Period-Select" class="select-period">
                @php
                $start = 2017;
                $now = new DateTime();
                $end = $now->format('Y');
                @endphp
                @for($i = $end; $i >= $start; $i--)
                <option value="{{ $i }}">
                    {{ $i }}
                </option>
                @endfor
            </select>
        </div>

        <div class="row-flex">
            @php ($delay = 0.0)
            @foreach($topMember as $member)
            <div class="wow slideInUp column-300 column-member {{ $member->session }}" data-wow-delay="{{ $delay.'s' }}">
                <img class="img-member" src="{{ asset( 'images/'.$member->image ) }}" alt="{{ $member->image }}">
                <div class="info-member">
                    <h2>{{ $member->name }}</h2>
                    <h3>{{ $member->role }}</h3>
                    <h4>{{ $member->mail }}</h4>
                    <h4>{{ $member->contact }}</h4>
                </div>
                <div class="works-member">
                    <strong>Works: </strong>{{ $member->work }}
                </div>

                <a href="{{ asset('admin/editMember?id='.$member->id) }}" class="btnCreate icon-edit"> Edit </a>
                <a href="{{ asset('admin/deleteMember?id='.$member->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete icon-delete"> Delete </a>
            </div>
            @php ($delay = $delay + 0.15)
            @endforeach

            @foreach($others as $member)
            <div class="wow slideInUp column-300 column-member {{ $member->session }}" data-wow-delay="{{ $delay.'s' }}">
                <img class="img-member" src="{{ asset( 'images/'.$member->image ) }}" alt="{{ $member->image }}">
                <div class="info-member">
                    <h2>{{ $member->name }}</h2>
                    <h3>{{ $member->role }}</h3>
                    <h4>{{ $member->mail }}</h4>
                    <h4>{{ $member->contact }}</h4>
                </div>
                <div class="works-member">
                    <strong>Works: </strong>{{ $member->work }}
                </div>

                <a href="{{ asset('admin/editMember?id='.$member->id) }}" class="btnCreate icon-edit"> Edit </a>
                <a href="{{ asset('admin/deleteMember?id='.$member->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete icon-delete"> Delete </a>
            </div>
            @php ($delay = $delay + 0.15)
            @endforeach
        </div>
    </div>

    <div class="popup-overlay" id="Popup-Overlay">
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
    </div>

</div>
@endsection 