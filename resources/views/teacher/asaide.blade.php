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
          <li class="single-nav-wrapper">
            <a class="has-arrow menu-item" href="#" aria-expanded="false">
              <span class="left-icon"><i class="fas fa-chart-line"></i></span>
              <span class="menu-text">Lessons Management</span>
            </a>
              <ul class="dashboard-menu">
                <li><a href="{{route('lesson_list')}}">Lessons</a></li>
                <li><a href="{{route('lesson_create')}}">Add Lessons</a></li>
             </ul>
        </li>
        <li class="single-nav-wrapper">
            <a class="has-arrow menu-item" href="#" aria-expanded="false">
              <span class="left-icon"><i class="fas fa-chart-line"></i></span>
              <span class="menu-text">News Management</span>
            </a>
              <ul class="dashboard-menu">
                <li><a href="{{route('news.index')}}">News List</a></li>
                <li><a href="{{route('add_news')}}">Add News</a></li>
             </ul>
        </li>
        <li class="single-nav-wrapper">
            <a class="has-arrow menu-item" href="#" aria-expanded="false">
              <span class="left-icon"><i class="fas fa-chart-line"></i></span>
              <span class="menu-text">Formation & Classroom Management</span>
            </a>
              <ul class="dashboard-menu">
                <li><a href="{{route('managment-class')}}">Management ClassRoom</a></li>
                <li><a href="{{route('managment-formation')}}">Management Formation </a></li>
                <li><a href="{{route('formation-lessons.index')}}"> Formation  & Lesson </a></li>
                <li><a href="{{route('formations-lessons-list')}}"> Formation  & Lesson List </a></li>
             </ul>
        </li>
        <li class="single-nav-wrapper">
          <a class="has-arrow menu-item" href="#" aria-expanded="false">
            <span class="left-icon"><i class="fas fa-chart-line"></i></span>
            <span class="menu-text">Stat</span>
          </a>
            <ul class="dashboard-menu">
              
              <li><a href="">Student & insecriptiob</a></li>
              <li><a href="">Student & Lessons</a></li>
           </ul>
      </li>

      
          </ul>
    </nav>
  </aside><!-- /sidebar Area-->
  

