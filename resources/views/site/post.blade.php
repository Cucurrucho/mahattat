@extends('layouts.site')
@section('content')
    <h1 class="title">{{$post->title}}</h1>
    {!! $post->body !!}
@endsection
