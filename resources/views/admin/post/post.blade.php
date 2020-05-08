@extends('layouts.admin')
@section('content')
        <div class="section is-half column">
            <form method="POST" enctype="multipart/form-data" action="{{action('Admin\PostController@update', $post)}}">
                @csrf
                @method('PATCH')
                <div class="field">
                    <label class="label">عنوان</label>
                    <div class="control">
                        <input class="input" type="text" name="title" value="{{$post->title}}">
                    </div>
                </div>
                <div class="field">
                    <label class="label">مختصر</label>
                    <div class="control">
                        <textarea class="textarea" name="summary">{{{$post->summary}}}</textarea>
                    </div>
                </div>
                <image-input url="{{asset($post->thumbnail)}}"></image-input>
                <div class="field">
                    <label class="label">مقالة</label>
                    <editor content="{{$post->body}}" name="body"></editor>
                </div>
                <div class="control">
                    <button class="button is-primary" type="submit">حفظ</button>
                </div>
            </form>
        </div>
@endsection