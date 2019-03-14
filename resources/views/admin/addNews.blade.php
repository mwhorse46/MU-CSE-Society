@extends('admin.master')

@section('page-title')
{{ $title }}
@endsection

@section('dashboard-name')
{{ $title }}
@endsection

@section('content')
<div class="content" style="position:absolute; top:55px">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul style="text-align: left">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h3>{{ $title }}</h3>
    <div class="sub-content">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table style="padding:0 30px; width: 100%">
                <tbody>
                    @if(!Request::has('id'))
                    <tr>
                        <td class="td-left"> Date* </td>
                        <td> <input type="text" id="date" name="date" required placeholder="News Date (Format: dd/mm/yyyy)"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Title* </td>
                        <td><input type="text" name="title" required placeholder="News Title"></td>
                    </tr>
                    <tr>
                        <td class="td-left"> Image </td>
                        <td> <input type="file" id="image" name="image" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> News* </td>
                        <td>
                            <textarea class="txtAreaNews" name="news" required placeholder="Write your News.." maxlength="5000"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:right">
                            <input class="btnCreate icon-save" type="submit" name="submit" value="{{ $button }}">
                            <a href="{{ route('news') }}" class="btnDelete icon-cancel">Cancel</a>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <input type="hidden" name="id" value="{{ $news->id }}">
                    </tr>
                    <tr>
                        <input type="hidden" name="imageOld" value="{{ $news->image }}">
                    </tr>
                    <tr>
                        <td class="td-left"> Date* </td>
                        <td> <input type="text" id="date" name="date" required placeholder="News Date (Format: dd/mm/yyyy)" value="{{ \DateTime::createFromFormat('Y-m-d', $news->date)->format('d/m/Y') }}"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Title* </td>
                        <td><input type="text" name="title" required placeholder="News Title" value="{{ $news->title }}"></td>
                    </tr>
                    <tr>
                        <td class="td-left"> Image </td>
                        <td> <input type="file" id="image" name="image" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> News* </td>
                        <td>
                            <textarea class="txtAreaNews" name="news" required placeholder="Write your News.." maxlength="5000">{{ $news->news }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:right">
                            <input class="btnCreate icon-save" type="submit" name="submit" value="{{ $button }}">
                            <a href="{{ route('news') }}" class="btnDelete icon-cancel">Cancel</a>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection 