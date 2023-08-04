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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $formation->title }}</div>

                <div class="card-body">
                    <p><strong>Description:</strong> {{ $formation->description }}</p>
                    <p><strong>Attachment:</strong> <a href="{{ asset($formation->attachment) }}" target="_blank">{{ $formation->attachment }}</a></p>
                    <p><strong>Meeting URL:</strong> {{ $formation->meeting_url }}</p>
                    <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
      
      
       



   </div><!--/ wrapper -->

   @endsection