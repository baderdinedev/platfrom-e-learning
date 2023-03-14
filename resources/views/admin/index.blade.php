     @extends('admin.admin_master')
     @section('admin')
     
     <!-- wrapper -->
        <div class="wrapper">
            <span>Welcome : {{Auth::guard('admin')->user()->name}}</span>
            <span>Email : {{Auth::guard('admin')->user()->email}}</span>
            <!-- header area -->
            
            @include('admin.header')

            @include('admin.asaide')

         


               @include('admin.content')








        </div><!--/ wrapper -->

        @endsection