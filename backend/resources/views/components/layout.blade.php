<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>


    <!-- all link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap1.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/themefy_icon/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/niceselect/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/owl_carousel/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/gijgo/gijgo.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/tagsinput/tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/datepicker/date-picker.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/vectormap-home/vectormap-2.0.2.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/scroll/scrollable.css') }}" />
    <link
        rel="stylesheet"
        href="{{ url( 'assets/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link
        rel="stylesheet"
        href="{{ url('assets/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link
        rel="stylesheet"
        href="{{ url('assets/vendors/datatable/css/buttons.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/text_editor/summernote-bs4.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/morris/morris.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/vendors/material_icon/material-icons.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/metisMenu.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/colors/default.css') }}" id="colorSkinCSS" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



</head>



<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    {{ $slot }}


    <!-- Script Javascript -->
    <script src="{{ url('assets/js/jquery1-3.4.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper1.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.html') }}"></script>
    <script src="{{ url('assets/js/metisMenu.js') }}"></script>
    <script src="{{ url('assets/vendors/count_up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/vendors/chartlist/Chart.min.js') }}"></script>
    <script src="{{ url('assets/vendors/count_up/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('assets/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('assets/vendors/datepicker/datepicker.js') }}"></script>
    <script src="{{ url('assets/vendors/datepicker/datepicker.en.js') }}"></script>
    <script src="{{ url('assets/vendors/datepicker/datepicker.custom.js') }}"></script>
    <script src="{{ url('assets/js/chart.min.js') }}"></script>
    <script src="{{ url('assets/vendors/chartjs/roundedBar.min.js') }}"></script>
    <script src="{{ url('assets/vendors/progressbar/jquery.barfiller.js') }}"></script>
    <script src="{{ url('assets/vendors/tagsinput/tagsinput.js') }}"></script>
    <script src="{{ url('assets/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ url('assets/vendors/am_chart/amcharts.js') }}"></script>
    <script src="{{ url('assets/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendors/scroll/scrollable-custom.js') }}"></script>
    <script src="{{ url('assets/vendors/vectormap-home/vectormap-2.0.2.min.js') }}"></script>
    <script src="{{ url('assets/vendors/vectormap-home/vectormap-world-mill-en.js') }}"></script>
    <script src="{{ url('assets/vendors/apex_chart/apex-chart2.js') }}"></script>
    <script src="{{ url('assets/vendors/apex_chart/apex_dashboard.js') }}"></script>
    <script src="{{ url('assets/vendors/echart/echarts.min.js') }}"></script>
    <script src="{{ url('assets/vendors/chart_am/core.js') }}"></script>
    <script src="{{ url('assets/vendors/chart_am/charts.js') }}"></script>
    <script src="{{ url('assets/vendors/chart_am/animated.js') }}"></script>
    <script src="{{ url('assets/vendors/chart_am/kelly.js') }}"></script>
    <script src="{{ url('assets/vendors/chart_am/chart-custom.js') }}"></script>
    <script src="{{ url('assets/js/dashboard_init.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>
</body>

</html>