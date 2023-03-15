@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')

    
       <div class="card">
        <div class="card-header">
          <h1 class="card-title" style="color: {{ $level->name === 'Beginner' ? 'green' : ($level->name === 'Intermediate' ? 'yellow' : '') }}">Level {{ $level->id }}</h1>
        </div>
        <div class="card-body">
          <p>Level Name: {{ $level->name }}</p>
          <p>Level Description: {{ $level->description }}</p>
        </div>
      </div>
      
      
       



   </div><!--/ wrapper -->

   @endsection