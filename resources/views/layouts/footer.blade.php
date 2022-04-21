                </div> <!--container-->
            </main>
        </div>

        <!-- Footer Bottom-->
            <div class="d-flex flex-column navbar navbar-fixed-bottom">
                <footer class="page-footer  font-small special-color-dark pt-4">
                    <!-- Footer Elements -->
                    <div class="container">
                        <!-- Social buttons -->
                            <ul class="list-unstyled list-inline text-center footer-social-list">                                
                            </ul>
                        <!-- Social buttons -->
                    </div>
                    <!-- Footer Elements -->
                
                    <!-- Copyright -->
                    <div class="footer-copyright text-center py-3">© {{ date('Y') }} Copyright:
                        <a target="_blank" href="https://cispalc.org/"> CISP COLOMBIA</a>
                        <br>
                        <small>
                            {{ env('APP_VERSION') }}
                        </small>
                        
                    </div>
                    <!-- Copyright -->
                
                </footer>
            </div>
        <!-- Footer Bottom--> 

        <!--Resources-->

            <script src="{{ asset('lib/jq.min.js')}}"></script>
            <!--jquery UI-->
            <script src="{{ asset('lib/jquery-ui/jquery-ui.min.js')}}"></script>

            <!--Parsely Js -->
            <script src="{{ asset('lib/parsley/parsley.min.js')}}"></script>
            <script src="{{ asset('lib/parsley/es.js')}}"></script>
            
            <!--bootsotrap js--->
                <script src="{{ asset('lib/bootstrap-4.6/popper.min.js')}}"></script>
                <script src="{{ asset('lib/bootstrap-4.6/bootstrap.min.js')}}"></script>
            <!--bootsotrap js--->

            <script src="{{ asset('plugins/js/moment.min.js')}}"></script>
            
            <!--bootstrap datepicker-->
                <script src="{{ asset('lib/datepicker/bootstrap-datepicker.js')}}"></script>
                <script src="{{ asset('lib/datepicker/bootstrap-datepicker.es.js')}}"></script>
            <!--/bootstrap datepicker-->

            <script src="{{ asset('lib/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>


            <!--bootstrap select-->
                <script type="text/javascript" src="{{ asset('lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
            <!--boootstrap select-->

            <!--bootbox-->
                <script type="text/javascript" src="{{ asset('lib/bootbox/bootbox.min.js')}}"></script>
            <!--bootbox-->                        
            <!--init-->
                <script src="{{asset('js/init.js?v='.microtime(true).'') }}"></script>
            
            <script src="{{ asset('lib/vue/vue.min.js') }}"></script>

            <!--module script-->
                @yield('script')
        <!--/recources-->
    </body>
</html>
