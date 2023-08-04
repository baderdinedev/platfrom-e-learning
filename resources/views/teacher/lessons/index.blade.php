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

 width: 380px;
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
     
    <section class="table_area">
        <div class="panel">
            <div class="panel_header">
                <div class="panel_title"><span>Level information</span></div>
            </div>
            <div class="panel_body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                              <th>ID</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>mediaUrl Path</th>
                              <th>View</th>
                              <th>Edit</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            @foreach ($lessons as $lesson)
                                    <td>{{ $lesson->id }}</td>
                                    <td>{{ $lesson->title }}</td>
                                    <td>{{ $lesson->description }}</td>
                                    <td>{{ $lesson->mediaUrl }}</td>
                                        <td>
                                            <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-primary btn-lg">
                                                <i id="myIcon" class="fas fa-eye"></i>
                                              </a>
                                        <td>
                                            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-secondary">
                                                <i class="fas fa-edit"></i>
                                              </a>
                                        </td>
                                    <td>
                                        <form action="{{ route('lessons.destroy', ['id' => $lesson->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this level?')">
                                                <i class="fas fa-trash"></i>
                                              </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach       
                          </tr>
                      </tbody>
                    </table> 
                </div>
            </div>
              {{-- {{ $users->links() }} --}}
        </div> <!-- /table -->
    </section>
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->
   </div><!--/ wrapper -->

   @endsection