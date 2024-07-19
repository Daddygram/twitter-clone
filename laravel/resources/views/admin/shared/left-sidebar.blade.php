<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('admin.dashboard')) ? 'bg-primary text-white rounded' : '' }} nav-link" href="{{ route('admin.dashboard') }}">
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('admin.users.index')) ? 'bg-primary text-white rounded' : '' }} nav-link" href="{{ route('admin.users.index') }}">
                    <span>Users</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('admin.ideas.index')) ? 'bg-primary text-white rounded' : '' }} nav-link" href="{{ route('admin.ideas.index') }}">
                    <span>Ideas</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('admin.comments.index')) ? 'bg-primary text-white rounded' : '' }} nav-link" href="{{ route('admin.comments.index') }}">
                    <span>Comments</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="{{ (Route::is('profile')) ? 'bg-primary text-white rounded' : '' }} btn btn-sm" href="{{ route('profile') }}">View Profile </a>
    </div>
</div>