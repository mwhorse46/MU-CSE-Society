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

    <div class="gallery-header">
        <a href="/admin/gallery"><u>Back</u></a> &nbsp; :: &nbsp; <u>Album</u>&nbsp;->&nbsp;<u>{{ $albumName }}</u>
    </div>

    <div class="sub-content">
        <div class="row-flex">
            <div class="column-add wow animate-box">
                <a >
                    <font size="32px">&oplus;</font>
                    <br>
                    Add Image
                </a>
            </div>
            @foreach($photos as $photo)
            <div class="column-album wow animate-box">
                <a href="{{ asset('images/'.$photo->image) }}" data-lightbox="album" title="{{ $photo->caption }}">
                    <img src="{{ asset('images/'.$photo->image) }}" alt="{{ $photo->caption }}">
                </a>
                <div class="img-caption">{{ $photo->caption }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection