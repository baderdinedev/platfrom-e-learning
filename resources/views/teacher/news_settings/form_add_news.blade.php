@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')

    
       <div class="container">
        <h2>Create a News</h2>
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="published" class="form-check-label">Published</label>
            <input type="checkbox" class="form-check-input" id="published" name="published" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Add News</button>
        </form>
    </div>



   </div><!--/ wrapper -->

   @endsection

