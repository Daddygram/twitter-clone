@extends('layouts.layout')

@section('title', 'Ideas | Admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-12 mb-3">
                @include('admin.shared.left-sidebar')
            </div>
            <div class="col-xl-9 col-12 mb-3">
                <h1>Ideas</h1>

                <table class="table table-striped mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>User Id</th>
                            <th>Tweet</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ideas as $idea)
                            <tr>
                                <td>{{ $idea->id }}</td>
                                <td><a href="{{ route('users.show', $idea->user->id) }}">{{ $idea->user->name }}</a></td>
                                <td>{{ $idea->tweet }}</td>
                                <td>{{ $idea->created_at->toDateString() }}</td>
                                <td>
                                    <a href="{{ route('idea.show', $idea->id) }}">View</a>
                                    <a href="{{ route('idea.edit', $idea->id) }}" class="ms-3">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $ideas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
