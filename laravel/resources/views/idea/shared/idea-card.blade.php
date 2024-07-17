<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 aspect-square avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageURL() }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex">
                <a class="mx-2" href={{ route('idea.show', $idea->id) }}>View</a>
                @can('update', $idea)
                    <a href={{ route('idea.edit', $idea->id) }}>edit</a>
                    <form action="{{ route('idea.destroy', $idea->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm ms-1">X</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('idea.update', $idea->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="tweet" class="form-control" id="tweet" rows="3"> {{ $idea->tweet }} </textarea>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->tweet }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('idea.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('idea.shared.comments-box')
    </div>
</div>
