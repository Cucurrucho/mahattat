@extends('layouts.plain')

@section('body')
    <nav dir="ltr" class="navbar is-link is-fixed-top columns" role="navigation" aria-label="main navigation">
        <div class="column is-half is-offset-one-quarter columns">
            <a class="navbar-item column has-text-white" href="{{action('Admin\ContentController@show')}}">الصفحات</a>
            <a class="navbar-item column has-text-white" href="{{action('Admin\PostController@index')}}">أخبار ومقالات</a>
        </div>
    </nav>
    <div class="dashboard columns is-centered">
        @yield('content')
    </div>
@endsection