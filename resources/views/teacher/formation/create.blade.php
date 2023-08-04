
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
                    <div class="card-header">{{ __('Create Formation') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('formation.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="attachment" class="col-md-4 col-form-label text-md-right">{{ __('Attachment') }}</label>

                                <div class="col-md-6">
                                    <input id="attachment" type="file" class="form-control-file @error('attachment') is-invalid @enderror" name="attachment">

                                    @error('attachment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meeting_url" class="col-md-4 col-form-label text-md-right">{{ __('Meeting URL') }}</label>

                                <div class="col-md-6">
                                    <input id="meeting_url" type="text" class="form-control @error('meeting_url') is-invalid @enderror" name="meeting_url" value="{{ old('meeting_url') }}">

                                    @error('meeting_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level_id" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                                <div class="col-md-6">
                                    <select id="level_id" class="form-control @error('niveau') is-invalid @enderror" name="niveau" required>
                                        <option value="">Select Level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('niveau')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Formation') }}
                                </button>
                            </div>
                        </div>
            </from>



   </div><!--/ wrapper -->

   @endsection





