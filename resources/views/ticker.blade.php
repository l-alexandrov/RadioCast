@extends('layouts.app')

@section('title', 'Ticker')

@section('content')
    <div class="container bg-white shadow p-3 mt-4">
        <div class="col-6 offset-3">
            <h1>&#x1f50a; Now listening to:</h1>
            <div class="pl-4">
                <h4 class="font-weight-bold">Song: <span id="name"
                                                         class="font-weight-normal text-secondary">{{ $song->name }}</span>
                </h4>
                <h4 class="font-weight-bold">Singer: <span id="performer"
                                                           class="font-weight-normal text-secondary">{{ $song->artist->name }}</span>
                </h4>
                <h4 class="font-weight-bold">Album: <span id="album"
                                                          class="font-weight-normal text-secondary">{{ $song->album }}</span>
                </h4>
                <h4 class="font-weight-bold">Genre: <span id="genre"
                                                          class="font-weight-normal text-secondary">{{ $song->genre->name }}</span>
                </h4>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
@stop
