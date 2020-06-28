@extends('layouts.app')

@section('title', 'Statistics')

@section('styles')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.css') }}"/>
@stop

@section('content')
    <div class="container bg-white shadow p-3 mt-3">
        <h1 class="col-12">&#x1f4ca; Statistics</h1>
        <form action="{{ route('statsPost')}} " method="post">
            <div class="row align-items-center">
                <div class="offset-2 col-3">
                    <div class="form-group">
                        <label for="start_date">From: </label>
                        <input id="start_date" class="form-control" type="text" name="start_date"
                               value="{{ request()->post('start_date') }}"/>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="end_date">To: </label>
                        <input id="end_date" class="form-control" type="text" name="end_date"
                               value="{{ request()->post('end_date') }}"/>
                    </div>
                </div>
                {{csrf_field()}}
                <div class="col-2 text-center">
                    <input type="submit" class="btn btn-success" value="Show me!"/>
                </div>
            </div>
        </form>
        @if(request()->method() === "POST")
            <div class="row">
                <div class="col-6">
                    <div class="card m-1">
                        <h4 class="card-header">Most broadcasted song:</h4>
                        <div class="card-body">
                            <h5 class="card-text ">{{ $most_broadcasted_song }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card m-1">
                        <h4 class="card-header">Most broadcasted performer:</h4>
                        <div class="card-body">
                            <h5 class="card-text ">{{ $most_broadcasted_performer }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card m-1">
                        <h4 class="card-header">Longest song:</h4>
                        <div class="card-body">
                            <h5 class="card-text ">{{ $longest_song }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card m-1">
                        <h4 class="card-header">Shortest song:</h4>
                        <div class="card-body">
                            <h5 class="card-text ">{{ $shortest_song }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card m-1">
                        <h4 class="card-header">Most broadcasted style:</h4>
                        <div class="card-body">
                            <h5 class="card-text ">{{ $most_broadcasted_style }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card m-1">
                        <h4 class="card-header">Style with the most songs:</h4>
                        <div class="card-body">
                            <h5 class="card-text ">{{ $style_with_most_songs }}</h5>
                        </div>
                    </div>
                </div>
            </div>
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
