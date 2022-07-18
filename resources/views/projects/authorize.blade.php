@extends('layouts.master')

@section('title', 'LDMS Cloud')

@section('content')
    <div class="container">
        <p>Authorize projects for a user.</p>
        <a href="/index">Return</a><br>
        <br>
        <form id="authorize", action="/users" method="POST" class="row">
            @csrf
            <div class="col-sm-8">

                <div class="form-group">
                    <label for="authorized_user"> Choose a user to be authorized. <span class="label label-danger">Requred</span></label> <br>
                    <select id="authorized_user" name="updated_user_id">
                        <option value=0>(unselected)</option>
                        @foreach( $users as $user )
                            <option value={{ $user->id }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Choose projects to be authorized. <span class="label label-danger">Requred</span></label>
                    <div>
                        @foreach( $projects as $project )
                            <input type="checkbox" name="project_ids[]" id="project_{{ (string) $project->id }}" value={{ $project->id }}>
                            <label for=id="project_{{ (string) $project->id }}">#{{ $project->id }} | {{ $project->title }}</label> <br>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-default"> Submit </button>
            </div><!-- col-sm-8 -->
        </form>
    </div>
@endsection
