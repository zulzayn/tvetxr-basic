<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        {{-- PWA Manifest --}}
        <link rel="manifest" href="{{URL::to('_manifest.json')}}">

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Favicon icon -->
        <link rel="shortcut icon" href="{{ URL::asset('TVETXR.ico') }}" type="image/x-icon">
        <title>TVET EXTENDED REALITY</title>
        <title>E-LEARNING</title>

         <!-- Styles -->
         <link rel="stylesheet" href="{{ asset('css/app.css') }}">
         
        <!-- Bootstrap Core CSS -->
        <link href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ url('css/default.css') }}" id="theme" rel="stylesheet">
        <link href="{{ url('css/style.css') }}" rel="stylesheet">

        @livewireStyles
    
        @stack('styles')

    </head>
        <body class="fix-header fix-sidebar card-no-border">
            <!-- ============================================================== -->
            <!-- Main wrapper - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <div id="main-wrapper">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <header class="topbar">
                    <nav class="navbar top-navbar navbar-expand-md ">
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <span>
                                <img src="{{ URL::asset('img/TVETXRlogo.png') }}"  alt="HOMEPAGE" style="width:200px;height:75px;display: inline;" />
                            </span>
                            </a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse">

                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu" style="color:#67757c"></i></a> </li>
                                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu" style="color:#67757c"></i></a> </li>
                            </ul>

                            <ul class="navbar-nav my-lg-0">

                                <li class="nav-item dropdown">

                                    <!-- Authentication -->
                                    <form id="logout" method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    </form>

                                        <a class="nav-link dropdown-toggle waves-effect waves-dark" onclick="event.preventDefault(); $('#logout').submit();"> 
                                            <i class="mdi mdi-logout"></i>
                                        </a>

                                </li>
                                
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
           
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar">
                    <div class="scroll-sidebar">
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <li class="user-profile"> 
                                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                        <table>
                                            <tr>
                                                <td><img src="{{auth()->user()->profile_photo_url ? auth()->user()->profile_photo_url : 'img/TVETXRlogo.png'}}" alt="user" style="display: inline;"/></td>
                                                <td><span class="hide-menu">{{auth()->user()->name}} <br> <small class="font-weight-bold">{{strtoupper(auth()->user()->role)}}</small></span></td>
                                            </tr>
                                        </table>
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="#" onclick="event.preventDefault(); $('#logout').submit();">Logout</a></li>
                                    </ul>
                                </li>
                                <li class="nav-devider"></li>
                                <li> <a class="waves-effect waves-dark" href="{{URL::to('home')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home </span></a>
                                    
                                </li>

                                {{-------- START SECTION - ADMINISTRATION --------}}
                                @if (auth()->user()->role == 'admin')

                                    <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Courses </span></a>
                                        <ul aria-expanded="false" class="collapse">
                                        
                                            <li><a href="{{URL::to('course')}}">Create New Courses</a></li>

                                  
                                            <li><a href="{{URL::to('coursefile')}}">Add Resources to Course</a></li>

                                        </ul>
                                    </li>
                                   
                                @endif
                                {{-------- END SECTION - ADMINISTRATION --------}}

                            </ul>
                        </nav>
                    </div>
                </aside>
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->
                <div class="page-wrapper">
                    <div class="container-fluid">

                        <div class="min-h-screen bg-gray-100">
                            <!-- Page Content -->
                            <main>
                                @if (isset($slot))
                                    {{ $slot }}
                                @endif
                            </main>
                        </div>
                
                        @stack('modals')
                    </div>
             
                   
                    <footer class="footer"> © <script>document.write(new Date().getFullYear());</script> Magicx Sdn Bhd </footer>
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->

   
    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    <!--JQuery -->
    <script src="{{ url('assets/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ url('assets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu/sidebarmenu.js') }}"></script>
     <!-- Sweet alert -->
     <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

     <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker
                .register('/_service-worker.js')
                .then(function () {
                console.log('Service worker registered!');
                })
                .catch(function(err) {
                console.log(err);
                });
            }
    </script>

     @livewireScripts

     @stack('scripts')

</body>


</html>


