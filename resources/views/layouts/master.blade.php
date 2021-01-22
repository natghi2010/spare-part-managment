
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>CORK Admin Template - Forms Layouts</title>
        <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}"/>
        <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('assets/js/loader.js')}}"></script>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />

    </head>
<body class="sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    @include('components.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

    @include('components.sidebar')
        <!--  END SIDEBAR  -->


        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">

                        <!-- CONTENT AREA -->



                        <div class="row layout-top-spacing">
                            @yield('content')
                        </div>



                        <!-- CONTENT AREA -->


                    @include('components.navSection')




                </div>

            </div>

        </div>
        <!--  END CONTENT AREA  -->
        @include('components.footer')

    </div>
    <!-- END MAIN CONTAINER -->


 @include('components.scripts')

</body>

</html>
