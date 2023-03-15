<aside class="sidebar-wrapper ">
    <nav class="sidebar-nav">
       <ul class="metismenu" id="menu1">
          <li class="single-nav-wrapper">
              <a href="{{route('teacher.dashboard')}}" class="menu-item">
                  <span class="left-icon"><i class="fas fa-home"></i></span>
                  <span class="menu-text">home</span>
              </a>
            </li>
            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                  <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                  <span class="menu-text">Level Management</span>
                </a>
                  <ul class="dashboard-menu">
                    <li><a href="{{route('level_list')}}">List Level</a></li>
                    <li><a href="{{route('create_leavel')}}">Add Level</a></li>
                 </ul>
            </li>
            <li class="single-nav-wrapper">
              <a class="has-arrow menu-item" href="#" aria-expanded="false">
                <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                <span class="menu-text">Student Management</span>
              </a>
                <ul class="dashboard-menu">
                  <li><a href="{{route('student_manage')}}">Student</a></li>
               </ul>
          </li>
          </ul>
    </nav>
  </aside><!-- /sidebar Area-->
  

