            <!-- sidebar area -->
            <aside class="sidebar-wrapper ">
                <nav class="sidebar-nav">
                   <ul class="metismenu" id="menu1">
                      <li class="single-nav-wrapper">
                          <a href="{{route('admin.dashboard')}}" class="menu-item">
                              <span class="left-icon"><i class="fas fa-home"></i></span>
                              <span class="menu-text">home</span>
                          </a>
                        </li>
                        <li class="single-nav-wrapper">
                            <a class="has-arrow menu-item" href="#" aria-expanded="false">
                              <span class="left-icon"><i class="fas fa-sort-alpha-down-alt"></i></span>
                              <span class="menu-text">Management</span>
                            </a>
                              <ul class="dashboard-menu">
                                  <li><a href="{{ route('manage_student') }}">Student</a></li>
                                  <li><a href="{{route('manage_teacher')}}">Teacher</a></li>
                             </ul>
                        </li>
                        <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-sort-alpha-down-alt"></i></span>
                            <span class="menu-text">Lessons</span>
                          </a>
                            <ul class="dashboard-menu">
                                <li><a href="{{route('lessons_show')}}">Lessons</a></li>
                                <li><a href="{{route('level_show')}}">Levels</a></li>
                           </ul>
                      </li>
                        <li class="single-nav-wrapper">
                          <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"><i class="fas fa-sort-alpha-down-alt"></i></span>
                            <span class="menu-text">Ressources</span>
                          </a>
                            <ul class="dashboard-menu">
                                <li><a href="">Blog</a></li>
                                <li><a href="">Chat</a></li>
                                <li><a href="">Assistant</a></li>
                           </ul>
                      </li>
                      <li class="single-nav-wrapper">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                          <span class="left-icon"><i class="fas fa-sort-alpha-down-alt"></i></span>
                          <span class="menu-text">Statistics</span>
                        </a>
                          <ul class="dashboard-menu">
                              <li><a href="">Student Registred</a></li>
                              <li><a href="">Teacher Registred</a></li>
                              <li><a href="">Student Result</a></li>
                              <li><a href="">Student course completed</a></li>
                         </ul>
                    </li>
                      </ul>
                </nav>
              </aside><!-- /sidebar Area-->