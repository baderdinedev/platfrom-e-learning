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

 width: 380px;
 border: none;
 border-radius: 15px;
 padding: 8px;
 background-color: #fff;
 position: relative;
 height: 370px;
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

.search-form {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top:20px;
}

.search-input {
  border: none;
  border-bottom: 2px solid #ccc;
  padding: 5px;
  font-size: 16px;
  margin-right: 5px;
}

.search-button {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 5px 10px;
  font-size: 16px;
  cursor: pointer;
  display:block;
}

.search-button:hover {
  background-color: #3e8e41;
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

<form action="{{ route('students.index') }}" method="GET" class="search-form" onsubmit="return validateSearch()">
    <div class="form-group">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" placeholder="Search...">
    </div>
    <div class="form-group">
        <label for="created_at">Date of Creation:</label>
        <input type="date" name="created_at" id="created_at">
    </div>
    <button type="submit" class="search-button">Search</button>
</form>

<script>
    function validateSearch() {
        let searchInput = document.getElementById("search");
        let dateInput = document.getElementById("created_at");

        if (searchInput.value.trim() == "" && dateInput.value.trim() == "") {
            alert("Please enter a search term or a date.");
            return false;
        }

        return true;
    }
</script>



<!--middle content wrapper-->
<div class="middle_content_wrapper">
     
    <section class="table_area">
        <div class="panel">
            <div class="panel_header">
                <div class="panel_title"><span>Student information</span></div>
            </div>
            <div class="panel_body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Birth date</th>
                              <th>Level</th>
                              <!-- <th>Delete</th> -->
                              <!-- <th>Certificat</th> -->
                              <!-- <th>Deactive Account</th>
                              <th>Active Account</th> -->
                              <th>Account State</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            @foreach($userc as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td @if ($user->prenam === null) style="color: red;" @endif>
                                     {{ $user->prenam ?? 'VIDE' }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td @if ($user->phone === null) style="color: red;" @endif>
                                        {{ $user->phone ?? 'VIDE' }}
                                    </td>
                                    <td @if ($user->birthday_date === null) style="color: red;" @endif>
                                    @if ($user->birthday_date === null)
                                        VIDE
                                    @else
                                        <input type="date" name="birthday_date" value="{{ $user->birthday_date }}">
                                    @endif
                                    </td>

                                    <td>
                                        {{$levelName = $user->level->name}}
                                    </td>                             
                                    <td>
                                    @if ($user->is_active)
                                        <span style="color: green;">Active</span>
                                    @else
                                        <span style="color: red;">Deactivated</span>
                                    @endif
                                    </td> 
                                </tr>
                            @endforeach       
                          </tr>
                      </tbody>
                    </table> 
                </div>
            </div>
              {{-- {{ $users->links() }} --}}
        </div> <!-- /table -->
    </section>
</div><!--/middle content wrapper-->
</div><!--/ content wrapper -->
   </div><!--/ wrapper -->

   @endsection