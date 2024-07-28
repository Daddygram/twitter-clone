<div>
    <form action={{ route('idea.comment.create', $idea->id) }} method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
        </div>
    </form>
    <hr>
    @foreach ($idea->comments as $comment)
        <div class="d-flex align-items-start mb-3">
            <img style="width: 35px;" class="me-2 rounded-circle" src="{{ $comment->user->getImageURL() }}" alt="{{ $comment->user->name }} Avatar">
            <div style="width: calc(100% - 35px - 0.5rem);">
                <div class="d-flex justify-content-between">
                    <h6 class="text-truncate">{{ $comment->user->name }}</h6>
                    <small class="fs-6 fw-light text-muted text-truncate">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light text-wrap">{{ $comment->content }}</p>
            </div>
        </div>
    @endforeach
</div>
