@extends('layouts.admin')
@section('content')
    <div class="section columns is-centered">
        <div class="column is-half">
            <form method="POST" action="{{action('Admin\ContentController@update')}}">
                @csrf
                @method('PATCH')
                <tabs>
                    <tab label="من نحنُ ؟">
                        @foreach ($aboutUs as $name => $content)
                            <div class="field">
                                <label class="label">@lang("admin.$name")</label>
                                <editor content="{{$content}}" name="{{$name}}"></editor>
                            </div>
                        @endforeach
                        <div class="control">
                            <button class="button is-primary" type="submit">حفظ</button>
                        </div>
                    </tab>
                    <tab label="خدماتنا \ مجموعتنا">
                        @foreach ($concepts as $name => $content)
                            <div class="field">
                                <div class="label">@lang("admin.$name")</div>
                                <editor content="{{$content}}" name="{{$name}}"></editor>
                            </div>
                        @endforeach
                        <div class="control">
                            <button class="button is-primary" type="submit">حفظ</button>
                        </div>
                    </tab>
                    <tab label="مصطلحات وتعريفات ">
                        @foreach ($groups as $name => $content)
                            <div class="field">
                                <div class="label">@lang("admin.$name")</div>
                                <editor content="{{$content}}" name="{{$name}}"></editor>
                            </div>
                        @endforeach
                        <div class="control">
                            <button class="button is-primary" type="submit">حفظ</button>
                        </div>
                    </tab>
                    <tab label="للتواصل معنا ">@foreach ($contact as $name => $content)
                            <div class="field">
                                <div class="label">@lang("admin.$name")</div>
                                <editor content="{{$content}}" name="{{$name}}"></editor>
                            </div>
                        @endforeach
                        <div class="control">
                            <button class="button is-primary" type="submit">حفظ</button>
                        </div>
                    </tab>
                </tabs>
            </form>

        </div>
    </div>
@endsection