<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
           <b>API - BUILD PDF</b> 
            <span id="spinner_loading" style="display: none" class="fas fa-spinner fa-spin"></span>
           <br>
           {{-- <small>ESCUELAS DE PARTICIPACIÓN CIUDADANA - 2021</small> --}}
           <br>
            {{-- @if (env('APP_ENV')!='production')
                (development) <small>{{ config('app.tag_version') ? config('app.tag_version') : ""  }}</small>
            @endif --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('api_form.index') }}">Main</a>
                </li>             
            </ul>

            <!-- Right Side Of Navbar -->
            {{-- <ul class="navbar-nav ml-auto">
                @if (Auth::user())

                @endif

            </ul> --}}

        </div>
    </div>
</nav>