    @extends('teacher.teacher_master')
@section('teacher')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");
body{
 background-color:#545454;
 font-family: "Poppins", sans-serif;
 font-weight: 300;
}

.container{
 height: 100vh;
}

.card{

 width: 800px;
 border: none;
 border-radius: 15px;
 padding: 8px;
 background-color: #fff;
 position: relative;
 height: 600px;
}

.upper{

 height: 100px;

}

.upper img{

 width: 100%;
 border-top-left-radius: 10px;
 border-top-right-radius: 10px;

}

.user{
 position: relative;
}

.profile img{
 height: 80px;
 width: 80px;
 margin-top:2px;
}

.profile{
 position: absolute;
 top:-50px;
 left: 38%;
 height: 90px;
 width: 90px;
 border:3px solid #fff;
 border-radius: 50%;
}

.follow{
 border-radius: 15px;
 padding-left: 20px;
 padding-right: 20px;
 height: 35px;
}

.stats span{
 font-size: 29px;
}

</style>
<!-- wrapper -->
   <div class="wrapper">
       <!-- header area -->
       @include('teacher.header')
  
       @include('teacher.asaide')

       @if (Session::has('error'))
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{Session::get('error')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>        
       @endif  



<div class="content_wrapper">

<!--middle content wrapper-->
<div class="middle_content_wrapper">
<div class="card">
        <div class="card-header">Formation List</div>
        <form method="GET" action="{{ route('formations.search') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Go!</button>
            </span>
        </div>
    </form>

        <div class="card-body">
            <a href="{{route('formation.create')}}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Create Formation
            </a>
            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Attachment</th>
                                    <th>Meeting URL</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->title }}</td>
                                        <td>{{ $lesson->description }}</td>
                                        <td>
                                            @if ($lesson->attachment)
                                            <a href="{{ route('lesson.download', $lesson->id) }}" target="_blank">Download</a>
                                            @else
                                                No attachment
                                            @endif
                                        </td>
                                        <td>{{ $lesson->meeting_url }}</td>
                                        <td>
                                            <a href="{{ route('formations.show', $lesson->id) }}" class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('formations.edit', $lesson->id) }}" class="btn btn-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                        <form action="{{ route('formations.hide', $lesson->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Hide</button>
                                        </form>
                                    </td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
            </table>
            <i class="fas fa-plus"></i> Archived Formation
            <br>
            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Attachment</th>
                                    <th>Meeting URL</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hidden as $hiddenlist)
                                    <tr>
                                        <td>{{ $hiddenlist->title }}</td>
                                        <td>{{ $hiddenlist->description }}</td>
                                        <td>
                                            @if ($hiddenlist->attachment)
                                                <a href="{{ asset('storage/'.$hiddenlist->attachment) }}" target="_blank">Download</a>
                                            @else
                                                No attachment
                                            @endif
                                        </td>
                                        <td>{{ $hiddenlist->meeting_url }}</td>
                                        <td>
                                            <a href="{{ route('formations.show', $hiddenlist->id) }}" class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('formations.edit', $hiddenlist->id) }}" class="btn btn-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                        <form action="{{ route('formations.unhide', $hiddenlist->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger">Unhide</button>
                                        </form>
                                    </td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
                </table>
        </div>
    </div>
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->
   </div><!--/ wrapper -->

   @endsection    