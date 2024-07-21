<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between ">
                <div class="d-flex flex-column flex-md-row align-items-center">
                    <img style="width:150px" class="me-3 aspect-square avatar-sm rounded-circle"
                        src="{{ $user->getImageURL() }}" alt="{{ $user->name }} Avatar">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                            @include('shared.error-msg', ['message' => $message])
                        @enderror
                        <span class="fs-6 text-muted"> {{ $user->email }} </span>
                    </div>
                </div>
                @auth
                    @if (Auth::id() === $user->id)
                        <a href={{ route('users.show', $user->id) }}>View</a>
                    @endif
                @endauth
            </div>
            <div class="mt-4">
                @auth
                    @if (Auth::id() === $user->id)
                        <label for="image">Change Pic</label>
                        <input name="image" type="file" class="form-control">
                        @error('image')
                            @include('shared.error-msg', ['message' => $message])
                        @enderror
                    @endif
                @endauth
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3"> {{ $user->bio }} </textarea>
                    @error('bio')
                        @include('shared.error-msg', ['message' => $message])
                    @enderror
                </div>
                <button class="btn btn-dark btn-sm mb-3">Save</button>
                @include('users.shared.user-stats')
            </div>
        </form>
    </div>
</div>
