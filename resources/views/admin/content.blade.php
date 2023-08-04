
<div class="content_wrapper">
    @if (Session::has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{Session::get('error')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>        
    @endif
    <!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <!-- counter_area -->
        <section class="counter_area">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fas fa-user"></i></span>
                              <h2 class="timer count-number" data-to=" {{$userc}}" data-speed="1500"></h2>
                        </div>
                     
                       <p class="count-text ">Student</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fas fa-user"></i></span>
                             <h2 class="timer count-number" data-to="{{$teacherc}}" data-speed="1500"></h2>
                        </div>
                        <p class="count-text ">Teacher</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fas fa-user"></i></span>
                             <h2 class="timer count-number" data-to="{{$lessonc}}" data-speed="1500"></h2>
                        </div>
                        <p class="count-text ">Lessons</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter">
                        <div class="counter_item">
                            <span><i class="fas fa-user"></i></span>
                             <h2 class="timer count-number" data-to="" data-speed="1500"></h2>
                        </div>
                        <p class="count-text ">Cours</p>
                    </div>
                </div>
            </div>
        </section>
        <!--/ counter_area -->
        <!-- table area -->

            <!-- chart area -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel chart_area">
                        <div class="panel_header">
                            <div class="panel_title">
                                <span class="panel_icon"><i class="far fa-chart-bar"></i></span>
                                <span>bar chat</span>
                            </div>
                        </div>
                        <div class="panel_body">
                            <div id="bar-chart">
                                <div id="bar-legend"></div>
                                <canvas id="bar-canvas" ></canvas>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>
        </section>                   
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper -->

