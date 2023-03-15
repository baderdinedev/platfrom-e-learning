@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')

       {{-- {{ route('levels.update', ['id' => $level->id]) }} --}}
     
       <div class="container">
        @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
        <form  action="{{ route('levels.update', ['id' => $level->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <h2>Edit Level</h2>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" value="{{ $level->name }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea id="description" name="description" class="form-control">{{ $level->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
          
       </div>
      






   </div><!--/ wrapper -->

   @endsection