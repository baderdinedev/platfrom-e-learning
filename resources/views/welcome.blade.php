<!DOCTYPE html>
<html lang="en">

<head>
   @include('ui.head')
</head>

<body>
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
          
            @include('ui.main-navbar')

           @include('ui.hero')
        </div>
        <!-- Navbar & Hero End -->
        

        <!-- Full Screen Search Start -->
        @include('ui.search')
        <!-- Full Screen Search End -->

        
        <!-- About Start -->
        @include('ui.about')
        <!-- About End -->


        <!-- Newsletter Start -->
        @include('ui.newslatter')
        <!-- Newsletter End -->


        <!-- Service Start -->
        @include('ui.services')
        <!-- Service End -->




        <!-- Testimonial Start -->
         @include('ui.testimonial')
        <!-- Testimonial End -->


        <!-- Team Start -->
        @include('ui.team')
        <!-- Team End -->
        

        <!-- Footer Start -->
         @include('ui.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

  @include('ui.footer-scripts')
</body>

</html>