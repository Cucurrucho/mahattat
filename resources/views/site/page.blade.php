@extends('layouts.site')
@section('content')
    <div class="container"
         @if(app()->getLocale() == 'en')
            dir="ltr"
          @endif
    >
        {!! $content !!}
    </div>
@endsection
