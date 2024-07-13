<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('dashboard')) ? 'bg-primary text-white rounded' : '' }} nav-link" href="{{ route('dashboard') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('feed')) ? 'bg-primary text-white rounded' : '' }} nav-link" href="{{ route('feed') }}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('terms')) ? 'bg-primary text-white rounded' : '' }} nav-link" href="{{ route('terms') }}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="{{ (Route::is('profile')) ? 'bg-primary text-white rounded' : '' }} btn btn-sm" href="{{ route('profile') }}">View Profile </a>
    </div>
</div>