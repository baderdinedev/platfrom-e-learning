@extends('admin.admin_master')
@section('admin')
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
       @include('admin.header')
  
       @include('admin.asaide')

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
     
    <div class="container d-flex justify-content-center align-items-center">
             
        <div class="card">

         <div class="upper">

           <img src="https://i.imgur.com/Qtrsrk5.jpg" class="img-fluid">
           
         </div>

         <div class="user text-center">

           <div class="profile">

             <img src="https://i.imgur.com/JgYD2nQ.jpg" class="rounded-circle" width="80">
             
           </div>

         </div>

          
        
         <div class="mt-5 text-center">

           <h4 class="mb-0">{{Auth::guard('admin')->user()->name}}</h4>
           <span class="text-muted d-block mb-2">{{Auth::guard('admin')->user()->email}}</span>

           <button  class="btn btn-primary btn-sm follow"><a href="{{route('update.profile')}}" style="color:white;">Edit Profile</a></button>

         </div>
          
        </div>

      </div>
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->










   </div><!--/ wrapper -->

   @endsection