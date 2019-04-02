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
    <a href="{{ route('addevent') }}" class="btnAddItem icon-plus"> Add Event </a>
    <h3>All Events</h3>

    <div class="sub-content">
        <div class="row-event">
            @php ($delay = 0.0)
            @foreach($new as $new)
            <div class="wow slideInUp column-event" data-wow-delay="{{ $delay.'s' }}">
                <?php
                $color = mt_rand(0, 4);
                echo "<h3 class=\"event-title icon-new bg" . $color . "\">
                    <center> " . $new->title . " </center>
                </h3>";
                ?>
                <h5 class="table-data-head event-date">
                    <div class="weekday">
                        {{ \DateTime::createFromFormat('Y-m-d', $new->date)->format('l') }}
                    </div>
                    <div class="date-month">
                        {{ \DateTime::createFromFormat('Y-m-d', $new->date)->format('d M,') }}
                    </div>
                    <div class="year">
                        {{ \DateTime::createFromFormat('Y-m-d', $new->date)->format('Y') }}
                    </div>
                </h5>
                <h5 class="table-data-head">
                    @if ($new->stime !== null)
                    {{ \DateTime::createFromFormat('H:i:s', $new->stime)->format('h:i A') }} -
                    @endif

                    @if ($new->etime !== null)
                    {{ \DateTime::createFromFormat('H:i:s', $new->etime)->format('h:i A') }}
                    @endif
                </h5>

                @if ($new->place !== null)
                <h5 class="table-data-head">
                    At: {{ $new->place }}
                </h5>
                @endif

                @if($new->image !== null)
                <img src="{{ asset( 'images/'.$new->image ) }}" alt="{{ $new->image }}" width="100%" height="auto">
                @endif

                <p style="text-align: justify; padding: 4px 10px;"> {{ $new->description }} </p>

                @if ($new->registration !== null)
                <h5 class="table-data-head">
                    Registration Link: {{ $new->registration }}
                </h5>
                @endif
                @if ($new->photos !== null)
                <h5 class="table-data-head">
                    Photo Album: {{ $new->photos }}
                </h5>
                @endif

                <a href="{{ asset('admin/editEvent?id='.$new->id) }}" class="btnCreate icon-edit"> Edit </a>
                <a href="{{ asset('admin/deleteEvent?id='.$new->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete icon-delete"> Delete </a>
            </div>
            @php ($delay = $delay + 0.15)
            @endforeach

            @foreach($old as $old)
            <div class="wow slideInUp column-event" data-wow-delay="{{ $delay.'s' }}">
                <?php
                $color = mt_rand(0, 4);
                echo "<h3 class=\"event-title bg" . $color . "\">
                    <center>" . $old->title . "</center>
                </h3>";
                ?>
                <h5 class="table-data-head event-date">
                    <div class="weekday">
                        {{ \DateTime::createFromFormat('Y-m-d', $old->date)->format('l') }}
                    </div>
                    <div class="date-month">
                        {{ \DateTime::createFromFormat('Y-m-d', $old->date)->format('d M,') }}
                    </div>
                    <div class="year">
                        {{ \DateTime::createFromFormat('Y-m-d', $old->date)->format('Y') }}
                    </div>
                </h5>
                <h5 class="table-data-head">
                    @if ($old->stime !== null)
                    {{ \DateTime::createFromFormat('H:i:s', $old->stime)->format('h:i A') }} -
                    @endif

                    @if ($old->etime !== null)
                    {{ \DateTime::createFromFormat('H:i:s', $old->etime)->format('h:i A') }}
                    @endif
                </h5>
                @if ($old->place !== null)
                <h5 class="table-data-head">
                    At: {{ $old->place }}
                </h5>
                @endif

                @if($old->image !== null)
                <img src="{{ asset( 'images/'.$old->image ) }}" alt="{{ $old->image }}" width="100%" height="auto">
                @endif

                <p style="text-align: justify; padding: 4px 10px;"> {{ $old->description }} </p>

                @if ($old->registration !== null)
                <h5 class="table-data-head">
                    Registration Link: {{ $old->registration }}
                </h5>
                @endif
                @if ($old->photos !== null)
                <h5 class="table-data-head">
                    Photo Album: {{ $old->photos }}
                </h5>
                @endif

                <a href="{{ asset('admin/editEvent?id='.$old->id) }}" class="btnCreate icon-edit"> Edit </a>
                <a href="{{ asset('admin/deleteEvent?id='.$old->id) }}" onclick="return confirm('Are you sure?')" class="btnDelete icon-delete"> Delete </a>
            </div>
            @php ($delay = $delay + 0.15)
            @endforeach
        </div>
    </div>
</div>
@endsection 