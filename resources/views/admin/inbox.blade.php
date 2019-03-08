@extends('admin.master')

@section('page-title')
    {{ $title }}
@endsection

@section('dashboard-name')
    {{ $title }}
@endsection

@section('content')
    <div class="content" style="position:absolute; top:55px">
        <h3>All Messages</h3>
        <table class="tbl-message" id="Tbl-Message">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Received At</th>
                    <th>Message</th>
                </tr>
            </thead>

            <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td>{{ $message->message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection