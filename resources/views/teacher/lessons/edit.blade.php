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
    <div class="container">
        <h1>Edit Lesson</h1>
        <form method="POST" action="{{ route('lesson.update', ['id' => $lesson->id]) }}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $lesson->title }}" required>
          </div>
          <div class="form-group">
            <label for="video">Video File</label>
            <input type="file" class="form-control-file" id="video" name="video">
          </div>          
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $lesson->description }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->
   </div><!--/ wrapper -->

   @endsection