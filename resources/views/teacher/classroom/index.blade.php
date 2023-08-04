

    @extends('teacher.teacher_master')
@section('teacher')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");
body{
 background-color:#545454;
 font-family: "Poppins", sans-serif;
 font-weight: 300;
}

.container{
 height: 100vh;
}

.card{

 width: 480px;
 border: none;
 border-radius: 15px;
 padding: 8px;
 background-color: #fff;
 position: relative;
 height: 370px;
}

.upper{

 height: 100px;

}

.upper img{

 width: 100%;
 border-top-left-radius: 10px;
 border-top-right-radius: 10px;

}

.user{
 position: relative;
}

.profile img{
 height: 80px;
 width: 80px;
 margin-top:2px;
}

.profile{
 position: absolute;
 top:-50px;
 left: 38%;
 height: 90px;
 width: 90px;
 border:3px solid #fff;
 border-radius: 50%;
}

.follow{
 border-radius: 15px;
 padding-left: 20px;
 padding-right: 20px;
 height: 35px;
}

.stats span{
 font-size: 29px;
}

</style>
<!-- wrapper -->
   <div class="wrapper">
       <!-- header area -->
       @include('teacher.header')
  
       @include('teacher.asaide')

       @if (Session::has('error'))
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{Session::get('error')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>        
       @endif  



<div class="content_wrapper">

<!--middle content wrapper-->
<div class="middle_content_wrapper">
        <div class="">List of Classrooms</div>
            <a href="{{ route('classroom.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Create Classroom
            </a>

            @if ($classes->count())
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Formation</th>
                            <th>Teacher</th>
                            <th>Max Students</th>
                            <th>Current Students</th>
                            <th>code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>{{ $class->id }}</td>
                                <td>{{ $class->formation->title }}</td>
                                <td>{{ $class->teacher->name }}</td>
                                <td>{{ $class->limit_place }}</td>
                                <td>{{ $registeredUsers->get($class->id, 0) }}</td>
                                <td>{{ $class->access_code }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No classrooms found.</p>
            @endif
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->
   </div><!--/ wrapper -->

   @endsection    