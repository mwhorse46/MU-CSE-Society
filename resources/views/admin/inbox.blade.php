@extends('admin.master')

@section('page-title')
    {{ $title }}
@endsection

@section('dashboard-name')
    {{ $title }}
@endsection

@section('content')
<div class="content">
    <div class="sub-content" style="position:absolute; top:55px">
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
                        <td style="word-wrap:break-word">{{ $message->name }}</td>
                        <td style="word-wrap:break-word">{{ $message->email }}</td>
                        <td style="word-wrap:break-word">{{ $message->created_at }}</td>
                        <td style="word-wrap:break-word">{{ $message->message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection