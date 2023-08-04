@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')

    <style>
        .video-container {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%;
    overflow: hidden;
}

.video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.video::-webkit-media-controls {
    display: none !important;
}

.video::-webkit-media-controls-enclosure {
    display: none !important;
}

.video::-webkit-media-controls-panel {
    display: none !important;
}
.lesson-info {
    margin-bottom: 20px;
}

.lesson-name {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 10px;
}

.lesson-description {
    font-size: 18px;
    line-height: 1.5;
}

    </style>
    <div class="container">
    <form method="POST" action="{{ route('formations.update', $formation->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $formation->title) }}" required>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" required>{{ old('description', $formation->description) }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="attachment">Attachment:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('attachment') is-invalid @enderror" id="attachment" name="attachment">
            <label class="custom-file-label" for="attachment">{{ old('attachment', $formation->attachment) }}</label>
            @error('attachment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="meeting_url">Meeting URL:</label>
        <input type="text" class="form-control @error('meeting_url') is-invalid @enderror" name="meeting_url" value="{{ old('meeting_url', $formation->meeting_url) }}">
        @error('meeting_url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

    </div>
   </div><!--/ wrapper -->

   @endsection
