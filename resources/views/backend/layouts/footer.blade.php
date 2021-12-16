
<!-- Javascript -->
<script src="{{asset('backend/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('backend/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('backend/assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{asset('backend/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob-->

{{--summernote--}}
<script src="{{asset('backend/assets/vendor/summernote/summernote.js')}}"></script>

<script src="{{asset('backend/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/tables/jquery-datatable.js')}}"></script>

<script src="{{asset('backend/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{asset('backend/assets/vendor/switch-button-bootstrap/src/bootstrap-switch-button.js')}}"></script>

<script src="{{asset('backend/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/index8.js')}}"></script>

<script src="{{asset('backend/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>


{{-- calendar --}}
<script src="{{asset('backend/assets/bundles/fullcalendarscripts.bundle.js')}}"></script><!--/ calender javascripts -->
<script src="{{asset('backend/assets/vendor/fullcalendar/fullcalendar.js')}}"></script><!--/ calender javascripts -->
<script src="{{asset('backend/assets/js/pages/calendar.js')}}"></script>

<!-- Javascript -->
<script src="{{asset('backend/assets/js/pages/ui/dialogs.js')}}"></script>

{{-- <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script> --}}

@yield('scripts')


<script>
    setTimeout(function() {
        $('#alert').slideUp();
    }, 4000);
</script>
