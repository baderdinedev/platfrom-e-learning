@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')

    
       <div class="container">
       <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">{{ __('Add Lesson') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('storelessons') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required/>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" required>{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mediaUrl">Media:</label>
                            <input type="file" class="form-control" name="mediaUrl" required accept="video/*"/>
                            @if ($errors->has('mediaUrl'))
                                <span class="text-danger">{{ $errors->first('mediaUrl') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="level_id">Level:</label>
                            <select class="form-control" name="level_id" required>
                                <option value="">Choose a level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('level_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('level_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Add Lesson</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>


   </div><!--/ wrapper -->

   @endsection