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

    <h3>All Messages</h3>

    <div class="sub-content">
        <table class="tbl-message">
            <tbody>
                @foreach($messages as $message)
                <tr>
                    <td>
                        <h3 class="table-data-head"> {{ $message->name }} </h3>
                        <h5 class="table-data-head"> {{ $message->email }} </h5>
                        <h5 class="table-data-head"> {{ $message->created_at }} </h5>
                        <hr>
                        {{ $message->message }}
                    </td>
                    <td class="message-delete">
                        <a href="{{ asset('admin/deleteMessage?id='.$message->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete-noBackground">
                            <img src="{{ asset('img/delete1.png') }}" alt="">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 