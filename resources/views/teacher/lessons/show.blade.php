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
       <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">    
            <div class="lesson-info">
                <h1 class="lesson-name">{{ $lesson->title }}</h1>
                <p class="lesson-description">{{ $lesson->description }}</p>
            </div>        
          <div class="video-container">
            <video class="video" controls>
               <source src="{{ Storage::url('videos/' . $lesson->mediaUrl) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            
        </div>        
        </div>
      </div>
      
      
       



   </div><!--/ wrapper -->

   @endsection