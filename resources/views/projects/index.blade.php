@extends('layouts.app')

@section('content')
    <h1 class="text-center"> PROJECTS</h1>

    <div class="table table-responsive">
        <table class="table table-condensed table-bordered">
            <thead>
                <th> # </th>
                <th> Project Name </th>
                <th> Creator </th>
                <th> Actions </th>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->projectCreator->name }}</td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{ route('projects.show', $project->id) }}">Show</a>
                            <a type="button" class="btn btn-primary" href="{{ route('projects.edit', $project->id) }}">Edit</a>
                            <a type="button" class="btn btn-primary" href="{{ route('projects.show', $project->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
