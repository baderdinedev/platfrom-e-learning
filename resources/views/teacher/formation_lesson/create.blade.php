@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')

       <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Formation') }}</div>

                    <div class="card-body">


                    <form action="{{ route('formations-lessons.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="formation_id">Formation:</label>
        <select name="formation_id" id="formation_id" class="form-control">
            @foreach ($formations as $formation)
                @if (!$formation->is_hidden)
                    <option value="{{ $formation->id }}">{{ $formation->title }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <label for="lesson_id">Select Lesson:</label>
    @if ($lessons->count() == 0)
    <a href="{{ route('lesson_create') }}" class="btn btn-primary mt-2">Add Lesson</a>
    @endif

    @if ($lessons->count() > 0)
        <select class="form-control mt-2" name="lesson_id" required>
            <option value="">Select Lesson</option>
            @foreach ($lessons as $lesson)
                @if (!$formation->lessons->contains($lesson->id))
                    <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                @endif
            @endforeach
        </select>
    @endif
    </div>


    <button type="submit" class="btn btn-primary">Create</button>
</form>

   </div><!--/ wrapper -->

   @endsection





