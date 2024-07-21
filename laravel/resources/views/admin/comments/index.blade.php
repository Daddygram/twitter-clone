@extends('layouts.layout')

@section('title', 'Comments | Admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-12 mb-3">
                @include('admin.shared.left-sidebar')
            </div>
            <div class="col-xl-9 col-12 mb-3">
                @include('shared.success-msg')
                <h1>Comments</h1>

                <table class="table table-striped mt-3">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>User Id</th>
                            <th>Idea Id</th>
                            <th>Comment</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td><a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                                </td>
                                <td><a href="{{ route('idea.show', $comment->idea->id) }}">{{ $comment->idea->id }}</a></td>
                                <td style="max-width: 200px; overflow: hidden;">{{ $comment->content }}</td>
                                <td>{{ $comment->created_at->toDateString() }}</td>
                                <td>
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
