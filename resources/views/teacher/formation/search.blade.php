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
        <h1>Search Results</h1>
        <div class="row">
            @if(count($formations) > 0)
                @foreach($formations as $formation)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $formation->title }}</h5>
                                <p class="card-text">{{ $formation->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('formations.show', $formation->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <small class="text-muted">{{ $formation->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No results found</p>
            @endif
        </div>
    </div>

   </div><!--/ wrapper -->

   @endsection

