@if (isset($basic_datatables))
    <script type="text/javascript" src="{{ asset('lib/datatables/datatables.min.js')}}" ></script>
    <script type="text/javascript" src="{{ asset('lib/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('lib/datatables/JSZip-2.5.0/jszip-2.5.0.datatables.min.js')}}"></script>
@else 
    <!--JQUERY DATATABLES-->
        <script type="text/javascript" src="{{ asset('lib/datatables/datatables.min.js')}}" ></script>
        <script type="text/javascript" src="{{ asset('lib/datatables/Select-1.3.0/js/dataTables.select.min.js')}}" ></script>
        <!--/ JQUERY DATATABLES-->

        <!--DATATABLES EXTENSIONS-->
        <script type="text/javascript" src="{{ asset('lib/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('lib/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
        <script type="text/javascript" src="{{ asset('lib/datatables/JSZip-2.5.0/jszip-2.5.0.datatables.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('lib/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('lib/datatables/Buttons-1.5.6/js/buttons.colVis.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('lib/datatables/Buttons-1.5.6/js/buttons.print.min.js')}}"></script>
    <!--/ datatable extensions-->
@endif