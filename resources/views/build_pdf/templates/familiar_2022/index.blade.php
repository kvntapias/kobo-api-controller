<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('css/build_pdf/familiar_2022.css')}}" type="text/css">
        <style>
            @page { margin: 40px 40px 40px; }
        </style>
        <title>{{ isset($title_page) ? $title_page : "document" }}</title>
    </head>
    <body>
        
        @if (config('app.pdfs_with_header_image'))
            <header>
                <style>
                    body {  
                        padding-top: 0px; 
                        margin-top: 105px; 
                        margin-bottom: 20px;
                    }
                </style>
                <div id="header">
                    <div class="col-md-12 d-inline-block">
                        <img class="img-fluid image_header" src="{{asset('img/'.config('app.pdfs_header_image_name')) }}" alt="">
                    </div>
                </div>
            </header> 
        @endif

        <main>
            @include('build_pdf.templates.familiar_2022.pages.page_1')
            @include('build_pdf.templates.familiar_2022.pages.page_2')
            @include('build_pdf.templates.familiar_2022.pages.grupo_fam')
        </main>
    </body>
</html>