@extends('layouts.app')
@include('lib_includes.datatables.css')

@section('content')

<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Form</th>
        <th>Key</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($forms as $form)
            <tr>
                <th scope="row">{{ $form->id }}</th>
                <td>{{ $form->nombre }}</td>
                <td>{{ $form->kobo_key }}</td>
                <td>
                    <a target="_blank" class="btn btn-primary btn-sm" href="{{route('api_form.show', $form->id)}}">
                        <i class="bi bi-box-arrow-in-right"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('script')
    @include('lib_includes.datatables.js')
@endsection