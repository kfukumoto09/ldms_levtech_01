@extends('layouts.master')

@section('title', 'LDMS Cloud')

@section('content')
    <div class="container">
        <p>Create a new project.</p>
        <a href="/index">Return</a><br>
        <br>
        <form id="create", action="/projects" method="POST" class="row">
            @csrf
            <div class="col-sm-8">

                <div class="form-group">
                    <label for="title"> Title <span class="label label-danger">Requred</span></label>
                    <input type="text" id="title" name="project[title]" class="form-control" value="{{ old('project.title') }}">
                    <p class="title__error" style="color:red">{{ $errors->first('project.title') }}</p>
                </div>
                
                <div class="form-group">
                    <label for="purpose"> Purpose </label>
                    <textarea name="project[purpose]" id="purpose" rows="4" class="form-control" >{{ old('post.body') }}</textarea>
                    <p class="purpose__error" style="color:red">{{ $errors->first('project.purpose') }}</p>
                </div>
                
                <button type="submit" class="btn btn-default"> Submit </button>
            </div><!-- col-sm-8 -->
        </form>
    </div>
@endsection
