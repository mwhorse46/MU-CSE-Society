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
        <a href="/admin/gallery"><u>Back</u></a> &nbsp; :: &nbsp; <u>Album</u>&nbsp;->&nbsp;<u>{{ $albumName }}</u>
    </div>

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

    <div class="sub-content">
        <div class="row-flex" style="justify-content: left;">
            <a onclick="openPhotoAddForm()" class="column-add wow bounce">
                <div>
                    <p style="width:100%">
                        <font size="32px">&oplus;</font>
                        <br>
                        Add Image
                    </p>
                </div>
            </a>
            @foreach($photos as $photo)
            <div class="column-album-wrapper wow bounceInUp">
                <div class="column-album">
                    <a href="{{ asset('images/'.$photo->image) }}" data-lightbox="album" title="{{ $photo->caption }}">
                        <img src="{{ asset('images/'.$photo->image) }}" alt="{{ $photo->caption }}">
                    </a>
                    <div class="img-caption">{{ $photo->caption }}</div>
                </div>

                <div style="display: inline-flex; padding:5px 0;">
                    <div class="icon-edit-colored" onclick="openPhotoEditForm({{$photo->id}}, '{{$photo->caption}}')">&nbsp;</div>
                    <a href="{{ asset('/admin/gallery/deletePhoto?id='.$photo->id) }}" onclick="return confirm('Are you sure?')" class="icon-delete-filled"> &nbsp; </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="popup-overlay" id="Popup-Overlay">
        <div class="form-popup form-photos" id="PhotosForm">
            <form name="photosForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Picture</h3>
                <table width=100%>
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" id="ID">
                            <input type="hidden" name="albumId" value="{{ $albumId }}">
                        </tr>
                        <tr id="FormImage">
                            <td class="td-left" style="width:25%"> Photo: </td>
                            <td><input type="file" name="image" id="Image" required></td>
                        </tr>
                        <tr>
                            <td class="td-left" style="width:25%"> Photo Caption: </td>
                            <td><input type="text" placeholder="Photo Caption (MAX 30 Character)" name="caption" id="Caption" maxlength="30" required></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" class="btnCreate icon-save" id="BtnAdd" value="Save">
                <button type="button" class="btnDelete icon-cancel" onclick="closePhotosForm()">Cancel</button>
            </form>
        </div>
    </div>

    <div class="popup-overlay" id="Popup-OverlayC">
        <div class="form-popup form-photos" id="PhotosFormC">
            <form name="photosFormC" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Picture</h3>
                <table width=100%>
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" id="IDC">
                            <input type="hidden" name="albumId" value="{{ $albumId }}">
                        </tr>
                        <tr>
                            <td class="td-left" style="width:25%"> Photo Caption: </td>
                            <td><input type="text" placeholder="Photo Caption (MAX 30 Character)" name="caption" id="CaptionC" maxlength="30" required></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" class="btnCreate icon-save" value="Update">
                <button type="button" class="btnDelete icon-cancel" onclick="closePhotosFormC()">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection