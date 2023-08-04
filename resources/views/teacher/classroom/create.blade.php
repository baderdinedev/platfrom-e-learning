
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
                <div class="card-header">{{ __('Create Classroom') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('classroom.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Class Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="formation_id" class="col-md-4 col-form-label text-md-right">{{ __('Formation') }}</label>

                            <div class="col-md-6">
                                <select id="formation_id" class="form-control @error('formation_id') is-invalid @enderror" name="formation_id" required>
                                    <option value="" disabled selected>{{ __('Select Formation') }}</option>
                                    @foreach($formations as $formation)
                                    @if(!$formation->is_hidden)
                                        <option value="{{ $formation->id }}" {{ old('formation_id') == $formation->id ? 'selected' : '' }}>{{ $formation->title }}</option>
                                    @endif
                                @endforeach
                                </select>

                                @error('formation_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="limit_place" class="col-md-4 col-form-label text-md-right">{{ __('Limit of Inscription Places') }}</label>

                            <div>
                               <input type="number" id="limit_place"  name="limit_place">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Classroom') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




   </div><!--/ wrapper -->

   @endsection







