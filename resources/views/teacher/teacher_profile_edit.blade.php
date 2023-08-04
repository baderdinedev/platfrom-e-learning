@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')

<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300&display=swap" rel="stylesheet">
<style>
   #radioButtons{
  margin: 5px 0 10px 0;
}
input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #016a70;
  color: white;
  padding: 14px 20px;
  margin-top: 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #018c94;
}

div {
  margin: auto;
  width: 30%;
  border-radius: 5px;
  padding: 50px;
  font-family: 'Work Sans', sans-serif;
}
</style>
<div>   
   <form action="{{route('teacher_store.profile')}}" method="POST">
      @csrf
    <label for="fname">Name</label>
    <input type="text" id="fname" name="name" placeholder="{{Auth::guard('teacher')->user()->name}}">

    <label for="lname">email</label>
    <input type="email" id="fname" name="email" placeholder="{{Auth::guard('teacher')->user()->email}}">
  <label for="lname">password</label>
      <input type="password" id="fname" name="password" placeholder="Your New Password...">

    <input type="submit" value="UPDATE">
  </form>
</div>
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
@endif

   </div><!--/ wrapper -->

   @endsection