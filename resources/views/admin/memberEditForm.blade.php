@extends('admin.master')

@section('page-title')
{{ $title }}
@endsection

@section('dashboard-name')
{{ $title }}
@endsection

@section('content')
<div class="content" style="position:absolute; top:55px">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul style="text-align: left">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h3>{{ $title }}</h3>
    <div class="sub-content">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table style="padding:0 30px; width: 100%">
                <tbody>
                    @if(!Request::has('id'))
                    <tr>
                        <td class="td-left"> Name </td>
                        <td><input type="text" name="name" required placeholder="Name"></td>
                    </tr>
                    <tr>
                        <td class="td-left"> Image </td>
                        <td> <input type="file" id="image" name="image" required /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Role </td>
                        <td>
                            <select name="role">
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Mail </td>
                        <td> <input type="email" name="mail" required placeholder="example@example.com" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Contact No</td>
                        <td> <input type="number" name="contact" required placeholder="Contact No" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Address </td>
                        <td> <input type="text" name="address" required placeholder="Member's Address" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Period </td>
                        <td> <input type="text" name="period" required placeholder="Working Period" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Works </td>
                        <td> <input type="text" name="work" placeholder="Notable Works" /> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:right">
                            <input class="btnCreate icon-save" type="submit" name="submit" value="{{ $button }}">
                            <a href="{{ route('committee') }}" class="btnDelete icon-cancel">Cancel</a>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <input type="hidden" name="id" value="{{ $member->id }}">
                    </tr>
                    <tr>
                        <input type="hidden" name="imageOld" value="{{ $member->image }}">
                    </tr>
                    <tr>
                        <td class="td-left"> Name </td>
                        <td><input type="text" name="name" required placeholder="Name" value="{{ $member->name }}"></td>
                    </tr>
                    <tr>
                        <td class="td-left"> Image </td>
                        <td> <input type="file" id="image" name="image" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Role </td>
                        <td>
                            <select name="role">
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id === $member->role_id ? "selected" : "" }}>
                                    {{ $role->role }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Mail </td>
                        <td> <input type="email" name="mail" required placeholder="example@example.com" value="{{ $member->mail }}" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Contact No</td>
                        <td> <input type="number" name="contact" required placeholder="Contact No" value="{{ $member->contact }}" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Address </td>
                        <td> <input type="text" name="address" required placeholder="Member's Address" value="{{ $member->address }}" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Period </td>
                        <td> <input type="text" name="period" required placeholder="Working Period" value="{{ $member->session }}" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Works </td>
                        <td> <input type="text" name="work" placeholder="Notable Works" value="{{ $member->work }}" /> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:right">
                            <input class="btnCreate icon-save" type="submit" name="submit" value="{{ $button }}">
                            <a href="{{ route('committee') }}" class="btnDelete icon-cancel">Cancel</a>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection 