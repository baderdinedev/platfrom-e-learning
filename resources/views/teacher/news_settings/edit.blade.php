@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')
       
     
       <div class="container">
        @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
        <h1>Edit News</h1>

        <form action="{{ route('news.update', $news->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content">{{ $news->content }}</textarea>
            </div>

            <div class="mb-3">
                <label for="published" class="form-check-label">Published</label>
                <input type="checkbox" class="form-check-input" id="published" name="published" value="1" {{ $news->published ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
          
       </div>
      






   </div><!--/ wrapper -->

   @endsection