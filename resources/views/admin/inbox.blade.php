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
                @php( $delay = 0.1 )
                @foreach($messages as $message)
                <tr>
                    <td class="wow slideInRight" data-wow-delay="{{ $delay.'s' }}">
                        <h3 class="table-data-head message-sender"> {{ $message->name }} </h3>
                        <h3 class="table-data-head message-delete">
                            <a href="{{ asset('/admin/deleteMessage?id='.$message->id) }}" onclick="return confirm('Are you sure?')">
                                <img src="{{ asset('img/delete1.png') }}" alt="delete">
                            </a>
                        </h3>
                        <h5 class="table-data-head"> {{ $message->email }} </h5>
                        <h5 class="table-data-head"> {{ $message->created_at }} </h5>
                        <hr>
                        {{ $message->message }}
                    </td>
                </tr>
                @php( $delay += 0.1 )
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 