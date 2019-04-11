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

    <a onclick="openAlbumAddForm()" class="btnAddItem icon-plus"> Create New Album </a>

    <div class="popup-overlay" id="Popup-Overlay">
        <div class="form-popup form-album" id="AlbumForm">
            <form name="albumForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Photo Album</h3>
                <table width=100%>
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" id="ID">
                        </tr>
                        <tr>
                            <td class="td-left" style="width:25%"> Album Name: </td>
                            <td><input type="text" placeholder="Album Name (MAX 30 Character)" name="albumName" id="albumName" maxlength="30" required></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" class="btnCreate icon-save" id="BtnAdd" value="Create">
                <button type="button" class="btnDelete icon-cancel" onclick="closeAlbumForm()">Cancel</button>
            </form>
        </div>
    </div>

    <h3>All Albums</h3>
    <div class="sub-content">
        <div class="row-flex">
            @foreach($albums as $album)
            <div class="column-album-wrapper">
                <div style="width:100%">
                    <a href="{{ asset('/admin/gallery/album?id='.$album->id) }}" class="album-link">
                        <div class="column-album">
                            <img src="{{ asset('images/'.$album->coverImage) }}" alt="">
                            <h3 style="margin:0; padding:10px; border-bottom:lightgray 1px solid"> {{$album->albumName}} </h3>
                        </div>
                    </a>
                </div>

                <div style="display: inline-flex; padding:5px 0;">
                    <div class="icon-edit-colored" onclick="openAlbumEditForm({{$album->id}}, '{{$album->albumName}}')">&nbsp;</div>
                    <a href="{{ asset('admin/deleteAlbum?id='.$album->id) }}" onclick="return confirm('Are you sure?')" class="icon-delete-filled"> &nbsp; </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection