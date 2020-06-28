@extends('layouts.app')

@section('title', 'Statistics')

@section('styles')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.css') }}"/>
@stop

@section('content')
    <form action="{{ route('statsPost')}} " method="post">
        <label for="start_date">From: </label><input id="start_date" type="text" name="start_date"
                                                     value="{{ request()->post('start_date') }}"/>
        <label for="end_date">To: </label><input id="end_date" type="text" name="end_date"
                                                 value="{{ request()->post('end_date') }}"/>
        {{csrf_field()}}
        <input type="submit" value="Show me!"/>
    </form>
    @if(request()->method() === "POST")
        <h3>Most broadcasted song is:</h3>
        <p>{{ $most_broadcasted_song }}</p>
        <h3>Most broadcasted performer is:</h3>
        <p>{{ $most_broadcasted_performer }}</p>
        <h3>Longest song is:</h3>
        <p>{{ $longest_song }}</p>
        <h3>Shortest song is:</h3>
        <p>{{ $shortest_song }}</p>
        <h3>Most broadcasted style is:</h3>
        <p>{{ $most_broadcasted_style }}</p>
        <h3>Style with the most songs is:</h3>
        <p>{{ $style_with_most_songs }}</p>
    @endif
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/JQuery.js') }}"></script>
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script type="text/javascript">
        jQuery('#start_date, #end_date').datetimepicker({
            timepicker: false,
            format: 'd.m.Y'
        });
    </script>
@stop
