   <!-- counter_area -->
   <section class="counter_area">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="counter">
                <div class="counter_item">
                    <span><i class="fas fa-user"></i></span>
                      <h2 class="timer count-number" data-to="{{$userc}}" data-speed="1500"></h2>
                </div>
             
               <p class="count-text ">Student</p>
            </div>
        </div>
    </div>
</section>
<!--/ counter_area -->
<!-- table area -->
<section class="table_area">
    <div class="panel">
        <div class="panel_header">
            <div class="panel_title"><span>Teacher information</span></div>
        </div>
        <div class="panel_body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                        </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div> <!-- /table -->
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
        <div class="col-lg-4">
            <div class="panel">
                <div class="panel_header">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-chart-pie"></i></span>
                        <span>pie chat</span>
                    </div>
                </div>
                <div class="panel_body">
                    <div id="piechart"></div>
                </div>
            </div> 
        </div>
    </div>
</section>  