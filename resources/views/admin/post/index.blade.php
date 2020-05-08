@extends('layouts.admin')
@section('content')
    <div class="column is-three-quarters">
        @component('datatable.datatableWithNew')
        @endcomponent
    </div>
@endsection