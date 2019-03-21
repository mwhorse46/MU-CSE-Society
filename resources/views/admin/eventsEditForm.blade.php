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
                        <td class="td-left"> Title* </td>
                        <td><input type="text" name="title" required placeholder="Event Title"></td>
                    </tr>
                    <tr>
                        <td class="td-left"> Date* </td>
                        <td> <input type="text" id="date" name="date" required placeholder="Event Date (Format: dd/mm/yyyy)"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Start Time </td>
                        <td> <input type="time" id="start_time" name="start_time"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> End Time </td>
                        <td> <input type="time" id="end_time" name="end_time"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Place </td>
                        <td> <input type="text" id="place" name="place" placeholder="Event Place"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Image </td>
                        <td> <input type="file" id="image" name="image" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Description* </td>
                        <td>
                            <textarea class="txtAreaLarge" name="description" required placeholder="Event's Description.." maxlength="500"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Registration </td>
                        <td>
                            <input type="text" name="registration" placeholder="Registration Link.." maxlength="200" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Photo Album </td>
                        <td>
                            <input type="text" name="photos" placeholder="Photo Album Link.." maxlength="200" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:left"> <input type="checkbox" name="ended" value="1"> This Event Ended </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:right">
                            <input class="btnCreate icon-save" type="submit" name="submit" value="{{ $button }}">
                            <a href="{{ route('events') }}" class="btnDelete icon-cancel">Cancel</a>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <input type="hidden" name="id" value="{{ $event->id }}">
                    </tr>
                    <tr>
                        <input type="hidden" name="imageOld" value="{{ $event->image }}">
                    </tr>
                    <tr>
                        <td class="td-left"> Title* </td>
                        <td><input type="text" name="title" required placeholder="Event Title" value="{{ $event->title }}"></td>
                    </tr>
                    <tr>
                        <td class="td-left"> Date* </td>
                        <td> <input type="text" id="date" name="date" required placeholder="Event Date (Format: dd/mm/yyyy)" value="{{ \DateTime::createFromFormat('Y-m-d', $event->date)->format('d/m/Y') }}"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Start Time </td>
                        <td> <input type="time" id="start_time" name="start_time" value="{{ $event->stime }}"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> End Time </td>
                        <td> <input type="time" id="end_time" name="end_time" value="{{ $event->etime }}"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Place </td>
                        <td> <input type="text" id="place" name="place" placeholder="Event Place" value="{{ $event->place }}"> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Image </td>
                        <td> <input type="file" id="image" name="image" /> </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Description* </td>
                        <td>
                            <textarea class="txtAreaLarge" name="description" required placeholder="Event's Description.." maxlength="500"> {{ $event->description }} </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Registration </td>
                        <td>
                            <input type="text" name="registration" placeholder="Registration Link.." maxlength="200" value="{{ $event->registration }}" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-left"> Photo Album </td>
                        <td>
                            <input type="text" name="photos" placeholder="Photo Album Link.." maxlength="200" value="{{ $event->photos }}" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:left"> <input type="checkbox" name="ended" {{ $event->ended ? "checked" : "" }}> This Event Ended </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:right">
                            <input class="btnCreate icon-save" type="submit" name="submit" value="{{ $button }}">
                            <a href="{{ route('events') }}" class="btnDelete icon-cancel">Cancel</a>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection 