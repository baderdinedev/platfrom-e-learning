<script>
    var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})

var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = 'New message to ' + recipient
  modalBodyInput.value = recipient
})
</script>

<style>
    box-shadow: var(--tw-ring-offset-shadow,0 0 transparent),var(--tw-ring-shadow,0 0 transparent),var(--tw-shadow);
}
.shadow-xl {
    --tw-shadow: 0 20px 25px -5px rgba(0,0,0,0.1),0 10px 10px -5px rgba(0,0,0,0.04);
}
.text-base {
    font-size: 1rem;
    line-height: 1.5rem;
}
.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
.px-3 {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}
.btn-a {
    --tw-border-opacity: 1;
    border: 1px solid rgba(241,188,63,var(--tw-border-opacity));
    background-image: linear-gradient(180deg,var(--tw-gradient-stops));
    --tw-gradient-from: #f7d78c;
    --tw-gradient-stops: var(--tw-gradient-from),var(--tw-gradient-to,rgba(247,215,140,0));
    --tw-gradient-to: #f4c965;
    --tw-text-opacity: 1;
    color: rgba(96,75,25,var(--tw-text-opacity));
}
.items-center {
    align-items: center;
}
.flex-col {
    flex-direction: column;
}
.flex {
    display: flex;
}

.mb-16 {
    margin-bottom: 4rem;
}
.mr-0 {
    margin-right: 0;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="m-0"><i class="far fa-keyboard mt-2"></i>Typing<span class="fs-5">Speed</span></h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="/about" class="nav-item nav-link">About</a>
            <a href="/service" class="nav-item nav-link">Service</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="/team" class="dropdown-item">Our Team</a>
                    <a href="/testimonial" class="dropdown-item">Testimonial</a>
                    <a href="/notfound" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="/contact" class="nav-item nav-link">Contact</a>
        </div>
        <butaton type="button" class="btn text-secondary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
        @if (Route::has('login'))
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">
            Login
        </button>
        <!-- Modal -->
            
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">
            Sign up
        </button>   
        @endif
     </div>
</nav>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="text-align: center;"  id="staticBackdropLabel">LOGIN</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div style="display:flex;align-items:center;justify-content:space-between;">
            <div class="flex flex-col items-center mr-0 mb-16 md:mb-0 lg:mb-0 md:mr-14 lg:mr-14">
                <img width="250px" height="194px" src="{{asset('ui/img/student-login.svg')}}" alt="">
                <a class="text-base px-3 py-2 shadow-xl btn btn-a" href="/login" role="button">Log In as a Student »</a>
            </div>
            <div class="flex flex-col items-center mr-0 mb-16 md:mb-0 lg:mb-0 md:mr-14 lg:mr-14">
                <img width="250px" height="194px" src="{{asset('ui/img/teacher-login.svg')}}" alt="">
                <a class="text-base px-3 py-2 shadow-xl btn btn-a" href="/teacher/login" role="button">Log In as a Teacher »</a>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">SIGN UP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div style="display:flex;align-items:center;justify-content:space-between;">
                <div class="flex flex-col items-center mr-0 mb-16 md:mb-0 lg:mb-0 md:mr-14 lg:mr-14">
                    <img width="250px" height="194px" src="{{asset('ui/img/student-login.svg')}}" alt="">
                    <a class="text-base px-3 py-2 shadow-xl btn btn-a" href="/register" role="button">Sign Up as a Student »</a>
                </div>
                <div class="flex flex-col items-center mr-0 mb-16 md:mb-0 lg:mb-0 md:mr-14 lg:mr-14">
                    <img width="250px" height="194px" src="{{asset('ui/img/teacher-login.svg')}}" alt="">
                    <a class="text-base px-3 py-2 shadow-xl btn btn-a" href="/teacher/register" role="button">Sign Up as a Teacher »</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  