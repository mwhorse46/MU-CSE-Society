@extends('admin.master')

@section('page-title')
{{ $title }}
@endsection

@section('dashboard-name')
{{ $title }}
@endsection

@section('content')
<div class="content" style="position:absolute; top:55px">
    <h3>All News</h3>

    <p>Date: <input type="text" id="date"></p>

    <div class="sub-content">
        <table class="tbl-message" id="Tbl-Message">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>News</th>
                    <th>Image</th>
                    <th> <a href="{{ route('addnews') }}"> Add </a> </th>
                </tr>
            </thead>

            <tbody>
                @foreach($newses as $news)
                <tr>
                    <td>{{ $news->date }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->news }}</td>
                    <td>{{ $news->image }}</td>
                    <td>Edit Delete</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 