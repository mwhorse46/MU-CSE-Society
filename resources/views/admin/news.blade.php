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
    <a href="{{ route('addnews') }}" class="btnAddItem icon-plus"> Add News </a>
    <h3>All News</h3>

    <div class="sub-content">
        <table class="tbl-content">
            <tbody>
                @foreach($newses as $news)
                <tr>
                    <td>
                        <h3 class="table-data-head">{{ $news->title }}</h3>
                        <h5 class="table-data-head">{{ $news->date }}</h5>

                        @if($news->image !== null)
                        <img src="{{ asset( 'images/'.$news->image ) }}" alt="{{ $news->image }}" width="100%" height="auto">
                        @endif
                        
                        {{ $news->news }}
                        
                        <br>
                        <a href="{{ asset('admin/editNews?id='.$news->id) }}" class="btnCreate icon-edit"> Edit </a>
                        <a href="{{ asset('admin/deleteNews?id='.$news->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete icon-delete"> Delete </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 