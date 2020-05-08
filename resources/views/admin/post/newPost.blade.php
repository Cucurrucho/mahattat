@extends('layouts.admin')
@section('content')
    <div class="section is-half column">
        <form method="POST" enctype="multipart/form-data" action="{{action('Admin\PostController@create')}}">
            @csrf
            <div class="field">
                <label class="label">عنوان</label>
                <div class="control">
                    <input class="input" type="text" name="title" value="عنوان">
                </div>
            </div>
            <div class="field">
                <label class="label">مختصر</label>
                <div class="control">
                    <textarea class="textarea" name="summary" value="مختصر"></textarea>
                </div>
            </div>
            <image-input></image-input>
            <div class="field">
                <label class="label">مقالة</label>
                <editor content="اكتب مقالة هنا" name="body"></editor>
            </div>
            <div class="control">
                <button class="button is-primary" type="submit">حفظ</button>
            </div>
        </form>
    </div>
@endsection