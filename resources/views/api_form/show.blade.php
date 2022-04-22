@extends('layouts.app')
@include('lib_includes.datatables.css')

@section('content')

<h1>
    {{ $form->nombre }}
</h1>

<div class="container">
  <h5>Submissions</h5>
  <button class="btn btn-sm btn-success float-right mb-2"  title="Refrescar" onclick="listar_submisions({{$form->id}})">
    <i class="bi bi-arrow-counterclockwise"></i>
  </button>
</div>
@include('api_form.submissions.tabla')

@endsection

@section('script')
    @include('lib_includes.datatables.js')
    <script src="{{ asset('scripts/api_form/index.js?v='.microtime(true).'')}}"></script>

    <script>
      $(document).ready(function () {
        listar_submisions(@json($form->id))
      });
    </script>
@endsection