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
        <table class="tbl-message" id="Tbl-Message">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Received At</th>
                    <th>Message</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($messages as $message)
                <tr>
                    <td style="word-wrap:break-word">{{ $message->name }}</td>
                    <td style="word-wrap:break-word">{{ $message->email }}</td>
                    <td style="word-wrap:break-word">{{ $message->created_at }}</td>
                    <td style="word-wrap:break-word">{{ $message->message }}</td>
                    <td>
                        <a href="{{ asset('admin/deleteMessage?id='.$message->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete1">
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