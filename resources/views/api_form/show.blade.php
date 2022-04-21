@extends('layouts.app')
@include('lib_includes.datatables.css')

@section('content')

<h1>
    {{ $form->nombre }}
</h1>

@endsection

@section('script')
    @include('lib_includes.datatables.js')
@endsection