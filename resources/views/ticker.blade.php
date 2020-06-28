@extends('layouts.app')

@section('title', 'ticker')

@section('content')
    <h1>Now listening:</h1>
    <dl>
        <dt>Song:</dt>
        <dd id="name">{{ $song->name }}</dd>
        <dt>Singer:</dt>
        <dd id="performer">{{ $song->artist->name }}</dd>
        <dt>Album:</dt>
        <dd id="album">{{ $song->album }}</dd>
        <dt>Genre:</dt>
        <dd id="genre">{{ $song->genre->name }}</dd>
    </dl>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
@stop
