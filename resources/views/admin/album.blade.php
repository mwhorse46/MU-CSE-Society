@extends('admin.master')

@section('page-title')
{{ $title }}
@endsection

@section('dashboard-name')
{{ $title }}
@endsection

@section('content')
<div class="content" style="position:absolute; top:55px">
    <div class="gallery-header">
        <a href="/admin"><u>Back</u></a> &nbsp; :: &nbsp; <u>Album</u>&nbsp;->&nbsp;<u>{{ $albumName }}</u>
    </div>

    <div class="sub-content">
        <div class="row-flex" style="justify-content: left;">
            @foreach($photos as $photo)
            <div class="column-album-wrapper wow bounceInUp">
                <div class="column-album">
                    <a href="{{ asset('images/'.$photo->image) }}" data-lightbox="album" title="{{ $photo->caption }}">
                        <img src="{{ asset('images/'.$photo->image) }}" alt="{{ $photo->caption }}">
                    </a>
                    <div class="img-caption" style="border: none">{{ $photo->caption }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection