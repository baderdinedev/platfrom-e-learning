<header class="header_area">
    <!-- logo -->
    <div class="sidebar_logo">
        <a href="index.html">
<img src="{{asset('panel/assets/images/logo.png')}}" alt="" class="img-fluid logo1">
<img src="{{asset('panel/assets/images/logo_small.png')}}" alt="" class="img-fluid logo2">
        </a>
    </div>
    <div class="sidebar_btn">
        <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
    </div>
    <ul class="header_menu">
        <li><a href="#" class="search_btn" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></a>
            <div class="modal fade search_box" id="myModal">
                  <button type="button" class="close m-2 text-white float-right" data-dismiss="modal">&times;</button>
                  <form action="#" class="modal-dialog modal-lg">
                    
                    <div class="modal-content bg-transparent">
                          <!-- Modal body -->
                          <div class="modal-body">
                            <input class="form-control bg-transparent text-white form-control-lg"  type="text" placeholder="Search...">
                            <button class="btn btn-lg submit-btn" type="submit">Search</button>
                          </div>
                    </div>
                     
                  </form>
            </div>
        </li>
 
        <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                <div class="user_item dropdown-menu dropdown-menu-right">
                <ul>
                    <li><a href="{{route('admin.profile')}}"><span><i class="fas fa-user"></i></span> User Profile</a></li>
                    <li>

                        <a href="{{route('admin.logout')}}"><span><i class="fas fa-unlock-alt"></i></span> Logout</a></li>
                </ul>
            </div>
        </li>
        <li>

            <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
</header>