<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Newbie Users</h5>
    </div>
    <div class="card-body">
        @foreach ($newUsers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="{{ route('users.show', $user->id) }}"><img style="width:50px"
                            class="avatar-img rounded-circle" src="{{ $user->getImageURL() }}"
                            alt="{{ $user->name }} avatar"></a>
                </div>
                <div class="overflow-hidden">
                    <a href="{{ route('users.show', $user->id) }}" class="h6 mb-0"
                        href="#!">{{ $user->name }}</a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> {{ $user->followers()->count() }} followers</a>
                </div>
                <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                        class="fa-solid fa-plus"> </i></a>
            </div>
        @endforeach
    </div>
</div>
