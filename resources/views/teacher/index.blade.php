@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">
       <!-- header area -->
       @include('teacher.header')
       <!-- sidebar area -->

       @include('teacher.asaide')


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
      @include('teacher.content')                 
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->










   </div><!--/ wrapper -->

   @endsection