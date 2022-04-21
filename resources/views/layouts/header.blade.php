<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @if (env('APP_ENV')!='production')
        (dev)
        @endif ESCUELAS DE PARTICIPACIÓN CIUDADANA - 2021</title>

    <!--Font awesome 5-->
    <link href="{{ asset('lib/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet">

    <!-- Bootstrap-->
    <link href="{{ asset('lib/bootstrap-4.6/bootstrap.min.css') }}" rel="stylesheet"  crossorigin="anonymous">
    <!--bootstrap select-->
        <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-select/bootstrap-select.min.css')}}" />
    <!--boootstrap select-->
    <!--Datepicker-->
        <link rel="stylesheet" type="text/css" href="{{ asset('lib/datepicker/foundation-datepicker.min.css')}}">
    <!--datepicker-->

    <link rel="stylesheet" type="text/css" href="{{ asset('lib/datetimepicker/bootstrap-datetimepicker.min.css')}}">

    <!--site css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/site.css?v='.microtime(true).'') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-icons-1.4.1/bootstrap-icons.css')}}">

    <!--datatables checkbox-->
    <link type="text/css" href="{{ asset('plugins/js/datatables-checkbox/css/dataTables.checkboxes.css')}}" rel="stylesheet" />
    
    @yield('custom_css')

    {{--public path---}}
    <script>
        var public_path = '{{ asset('') }}';
    </script>
    
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        <main class="py-4">
            <div class="container">