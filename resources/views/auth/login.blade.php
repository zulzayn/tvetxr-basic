<x-guest-layout>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">
            <img src="assets/landingpage/assets/img/logo_header.png" class="w-25" alt="">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#loginnow">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="#projects">Description</a></li>
                <li class="nav-item"><a class="nav-link" href="#signup">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">

    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class=" justify-content-center">
                <br><br>
                <div class="row">
                    <div class="col-12">
                        <h1 class="mx-auto my-0 text-uppercase">TVET <br> IMMERSIVE <br> EXPERIENCE</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-info" href="#login">Get Started</a>
                    </div>
                </div>
               
            
              
            </div>
        </div>
 
   
</header>
<!-- Login-->
<section class="about-section text-center" id="loginnow">
                <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0">
                    <h2 class="text-white mb-4">Login</h2>
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700">
                                Email
                            </label>
                            <input class="block mt-1 w-full form-input rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autofocus >
                        </div>

                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Password
                            </label>
                            <input class="block mt-1 w-full form-input rounded-md shadow-sm" type="password" name="password" required autocomplete="current-password">
                        </div>

                        <div class="block mt-4">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                        </div>
                        <br>
                        <table style="border:none;width:100%">
                            <tr>
                                <td style="border:none;">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                        Register
                                    </a>
                                </td>
                                <td class="text-right" style="border:none;">
                                    <button type = 'submit' class='ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'>
                                        Login
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    </div>
                </div>

</section>
<!-- Projects-->
<section class="projects-section bg-light" id="projects">
    <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/landingpage/assets/img/bg-masthead.jpg" alt="..." /></div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4>Immersive World</h4>
                    <p class="text-black-50 mb-0">Immersive technologies create distinct experiences by merging the physical world with a digital or simulated reality. Augmented reality (AR) and virtual reality (VR) are two principal types of immersive technologies. These technologies share many of the same qualities.</p>
                </div>
            </div>
        </div>
        <!-- Project One Row-->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" style="height:100%" src="assets/landingpage/assets/img/bg-masthead.jpg" alt="..." /></div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project" style="background-color:black !important">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Virtual Reality</h4>
                            <p class="mb-0 text-white-50">Virtual Reality (VR) is a computer-generated environment with scenes and objects that appear to be real, making the user feel they are immersed in their surroundings. This environment is perceived through a device known as a Virtual Reality headset or helmet.</p>
                            <hr class="d-none d-lg-block mb-0 ms-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project Two Row-->
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" style="height:100%" src="assets/landingpage/assets/img/bg-masthead.jpg" alt="..." /></div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project"  style="background-color:black !important">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">Augmented Reality</h4>
                            <p class="mb-0 text-white-50">Augmented reality (AR) is an enhanced version of the real physical world that is achieved through the use of digital visual elements, sound, or other sensory stimuli delivered via technology. It is a growing trend among companies involved in mobile computing and business applications in particular.</p>
                            <hr class="d-none d-lg-block mb-0 me-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- Project One Row-->
          <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" style="height:100%" src="assets/landingpage/assets/img/bg-masthead.jpg" alt="..." /></div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project" style="background-color:black !important">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">360 Video</h4>
                            <p class="mb-0 text-white-50">360-degree videos, also known as immersive videos or spherical videos, are video recordings where a view in every direction is recorded at the same time, shot using an omnidirectional camera or a collection of cameras. During playback on normal flat display the viewer has control of the viewing direction like a panorama. It can also be played on a display or projectors arranged in a sphere or some part of a sphere.</p>
                            <hr class="d-none d-lg-block mb-0 ms-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Signup-->
<section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-5">Sign Up Now!</h2>
            
                <form class="" id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class=" flex flex-col items-center pt-6 sm:pt-0">
                    
                        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                           
                            @if ($errors->any())
                                <div class="mb-4">
                                    <div class="font-medium text-red-600">Whoops! Something went wrong.</div>
                    
                                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                    
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">
                                        Name
                                    </label>
                                    <input class="block mt-1 w-full form-input rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                                </div>
                    
                                <div class="mt-4">
                                    <label class="block font-medium text-sm text-gray-700">
                                        Email
                                    </label>
                                    <input class="block mt-1 w-full form-input rounded-md shadow-sm"  type="email" name="email" :value="old('email')" required >
                                </div>
                    
                                <div class="mt-4">
                                    <label class="block font-medium text-sm text-gray-700">
                                        Password
                                    </label>
                                    <input class="block mt-1 w-full form-input rounded-md shadow-sm"  type="password" name="password" required autocomplete="new-password">
                                </div>
                    
                                <div class="mt-4">
                                    <label class="block font-medium text-sm text-gray-700">
                                        Confirm Password
                                    </label>
                                    <input class="block mt-1 w-full form-input rounded-md shadow-sm"   type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                    
                                
                    
                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        Already registered?
                                    </a>
                    
                                    <button type='submit' class='ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150'>
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact-->
<section class="contact-section" style="background-color: #07112a !important;">
    <div class="container px-4 px-lg-5">
        <div class="social d-flex justify-content-center">
            <a class="mx-2" href="#"><i class="fab fa-twitter"></i></a>
            <a class="mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="mx-2" href="#"><i class="fab fa-github"></i></a>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="footer small text-center text-white-50" style="background-color: #07112a !important;"><div class="container px-4 px-lg-5">Copyright &copy; MaGICX 2021</div></footer>


    

</x-guest-layout>
