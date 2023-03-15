@extends('teacher.teacher_master')
@section('teacher')

<!-- wrapper -->
   <div class="wrapper">

       <!-- header area -->
       
       @include('teacher.header')

       @include('teacher.asaide')

    



       <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter un niveau</div>

                    <div class="panel-body">
                        <!-- Afficher les erreurs de validation -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                         @endif                        

                        <!-- Formulaire pour ajouter un nouveau niveau -->
                        <form method="POST" action="{{ route('store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nom du niveau</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description du niveau</label>
                                <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>



   </div><!--/ wrapper -->

   @endsection