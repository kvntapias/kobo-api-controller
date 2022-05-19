<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('css/build_pdf/eeac_2022.css')}}" type="text/css">
        <script src="{{ asset('lib/jq.min.js')}}"></script>
        <style>
            @page { margin: 40px 40px 40px; }
        </style>
    </head>
    <body>
        <main>
            @include('build_pdf.templates.eeac_2022.pages.page_1')
            @include('build_pdf.templates.eeac_2022.pages.page_2')
           {{--  @include('build_pdf.templates.eeac_2022.pages.page_3') --}}
        </main>
    </body>
</html>