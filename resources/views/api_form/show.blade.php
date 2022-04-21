@extends('layouts.app')
@include('lib_includes.datatables.css')

@section('content')

<h1>
    {{ $form->nombre }}
</h1>

<h5>Submissions</h5>
<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Date</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>

@endsection

@section('script')
    @include('lib_includes.datatables.js')
    <script src="{{ asset('scripts/api_form/index.js?v='.microtime(true).'')}}"></script>
@endsection