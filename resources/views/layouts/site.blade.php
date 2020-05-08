@extends('layouts.plain')

@section('body')
    <nav dir="ltr" class="navbar is-link is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item has-text-weight-bold has-text-white is-size-4"
                   href="{{action('PageController@changeLocale', app()->getLocale() == 'ar' ? 'en' : 'ar')}}">
                    @if(app()->getLocale() == 'ar')
                        EN
                    @else
                        AR
                    @endif
                </a>
                <a class="navbar-item has-text-white" href="https://www.facebook.com/Mahattat.Center/" target="_blank">
                    <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a class="navbar-item has-text-white" href="https://www.instagram.com/mahattat.center/" target="_blank">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <form method="get" action="{{action('PageController@index')}}" class="field navbar-item has-addons">
                    <div class="control has-icons-left">
                        <input class="input has-text-black" type="text" name="searchWord">
                        <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-dark">@lang('site.search')</button>
                    </div>
                </form>
            </div>
            <div class="navbar-end">
                            <a class="button circle is-primary is-hidden-tablet">
                                مركز محطات لتوجيه المجموعات
                            </a>
                <div class="navbar-item is-hidden-mobile">
                    <img src="images\logo.png" class="logo">
                </div>
            </div>
        </div>
    </nav>
    <div class="main-site columns is-gapless">
        <drawer news-action="{{action('PageController@index')}}" mentor-action="{{action('PageController@tbd')}}" participants-action="{{action('PageController@tbd')}}"></drawer>
        <aside class="column is-one-fifth-tablet  is-hidden-mobile  menu side-menu">
            <div class="side-item-envelope">
                <a class="side-item side-item-text" href="{{action('PageController@index')}}">
                    <span>@lang('site.newsAndArticles')</span>
                </a>
            </div>
            <div class="side-item-envelope">
                <a class="side-item side-item-text" href="{{action('PageController@tbd')}}">
                    ة<span>@lang('site.mentors')</span>
                </a>
            </div>
            <div class="side-item-envelope">
                <a class="side-item side-item-text" href="{{action('PageController@tbd')}}">
                    <span>@lang('site.participants')</span>
                </a>
            </div>
        </aside>
        <div class="column is-fullwidth site-content">
            <div class="tabs is-fullwidth">
                <ul>
                    <li class="tab is-hidden-mobile ">
                        <a href="{{action('PageController@index')}}">
                            <span>@lang('site.home')</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="{{action("PageController@aboutUs")}}">
                            <span>@lang('site.aboutUs')</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="{{action("PageController@groups")}}">
                            <span>@lang('site.groups')</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="{{action("PageController@concepts")}}">
                            <span>@lang('site.concepts')</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{action('PageController@contact')}}">
                            <span>@lang('site.contact')</span>
                        </a>
                    </li>
                </ul>
            </div>
            @yield('content')
        </div>
    </div>
@endsection
@section('scripts')
@endsection
