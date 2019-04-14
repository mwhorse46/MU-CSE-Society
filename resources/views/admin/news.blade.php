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

    <a href="{{ route('addnews') }}" class="btnAddItem icon-plus"> Add News </a>
    <h3>All News</h3>

    <div class="sub-content">
        <table class="tbl-content">
            <tbody>
                @foreach($pinned as $pinned)
                <tr class="wow slideInUp ">
                    <td>
                        <button class="btnPin icon-pin">Pinned News</button>
                        <h3 class="table-data-head">{{ $pinned->title }}</h3>
                        <h5 class="table-data-head">{{ \DateTime::createFromFormat('Y-m-d', $pinned->date)->format('l, d F, Y') }}</h5>

                        @if($pinned->image !== null)
                        <img src="{{ asset( 'images/'.$pinned->image ) }}" alt="{{ $pinned->image }}" width="100%" height="auto">
                        @endif

                        {{ $pinned->news }}

                        <br>
                        <a href="{{ asset('/admin/editNews?id='.$pinned->id) }}" class="btnCreate icon-edit"> Edit </a>
                        <a href="{{ asset('/admin/deleteNews?id='.$pinned->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete icon-delete"> Delete </a>
                    </td>
                </tr>
                @endforeach

                @foreach($newses as $news)
                <tr class="wow slideInUp ">
                    <td>
                        <h3 class="table-data-head">{{ $news->title }}</h3>
                        <h5 class="table-data-head">{{ \DateTime::createFromFormat('Y-m-d', $news->date)->format('l, d F, Y') }}</h5>

                        @if($news->image !== null)
                        <img src="{{ asset( 'images/'.$news->image ) }}" alt="{{ $news->image }}" width="100%" height="auto">
                        @endif

                        {{ $news->news }}

                        <br>
                        <a href="{{ asset('/admin/editNews?id='.$news->id) }}" class="btnCreate icon-edit"> Edit </a>
                        <a href="{{ asset('/admin/deleteNews?id='.$news->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete icon-delete"> Delete </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 