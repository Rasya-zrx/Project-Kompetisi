<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Comp</title>
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"> -->
    <!-- Pignose Calender -->
    <link href="/template/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/template/asset/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/template/asset/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="/template/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('partials.header')
        @include('partials.sidebar')
        @include('partials.content-body')
        @include('partials.footer')

    </div>
   
    <script src="/template/plugins/common/common.min.js"></script>
    <script src="/template/js/custom.min.js"></script>
    <script src="/template/js/settings.js"></script>
    <script src="/template/js/gleek.js"></script>
    <script src="/template/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="/template/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="/template/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="/template/plugins/d3v3/index.js"></script>
    <script src="/template/plugins/topojson/topojson.min.js"></script>
    <script src="/template/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="/template/plugins/raphael/raphael.min.js')}}"></script>
    <script src="/template/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="/template/plugins/moment/moment.min.js"></script>
    <script src="/template/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="/template/plugins/chartist/js/chartist.min.js"></script>
    <script src="/template/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="/template/js/dashboard/dashboard-1.js"></script>

</body>

</html>