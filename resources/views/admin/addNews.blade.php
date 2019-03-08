@extends('admin.master')

@section('page-title')
{{ $title }}
@endsection

@section('dashboard-name')
{{ $title }}
@endsection

@section('content')
<div class="content" style="position:absolute; top:55px">
    <h3>Add New News</h3>
    <div class="sub-content">
        <form action="" method="POST">
            {{ csrf_field() }}
            <table style="padding:0 30px; width: 100%">
                <tbody>
                    <tr>
                        <td class="td-left"> Date* </td>
                        <td> <input type="text" id="date" required placeholder="News Date" style="font-size:16px;"> </td>
                    </tr>

                    <tr>
                        <td class="td-left"> Title* </td>
                        <td><input type="text" name="title" required placeholder="News Title" style="font-size:16px;"></td>
                    </tr>

                    <tr>
                        <td class="td-left"> Image </td>
                        <td> <input type="file" id="image" name="image" /> </td>
                    </tr>

                    <tr>
                        <td class="td-left"> News* </td>
                        <td><textarea class="txtNews" name="news" required placeholder="Write your News.." maxlength="5000" style="font-size: 16px;"></textarea></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td style="text-align:right">
                            <input class="btnNewsAdd" type="submit" name="submit" value="Add News">
                            <a href="{{ route('news') }}" class="btnCnclLnk"><input class="btnNewsCncl" type="button" value="Cancel"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection 