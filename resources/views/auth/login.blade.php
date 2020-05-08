@extends('layouts.plain')

@section('body')
    <div class="columns is-centered is-vcentered">
        <div class="section column is-half ">
            <div class="card login-card">
                <div class="card-header site-background">
                    <div class="card-header-title is-centered has-text-white">الدخول</div>
                </div>
                <div class="card-content">
                    <form method="post" action="{{ action('Auth\LoginController@login') }}">
                        @csrf
                        <div class="field">
                            <label class="label">البريد الإلكتروني</label>
                            <div class="control">
                                <input class="input" type="email" name="email">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">كلمه السر</label>
                            <div class="control">
                                <input class="input" type="password" name="password">
                            </div>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="remember">
                                تذكرنى
                            </label>
                        </div>
                        <div class="buttons">
                            <button type="submit" class="button is-primary">
                                الدخول
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection