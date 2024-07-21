@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-12 mb-3 order-1 order-md-1">
                @include('shared.left-sidebar')
            </div>
            <div class="col-xl-3 col-12 mb-3 order-2 order-xl-3">
                @include('shared.search-bar')
                <div class="d-none d-xl-block">
                    @include('shared.follow-box')
                </div>
            </div>
            <div class="col-xl-6 col-12 mb-3 order-3 order-md-2">
                @include('shared.success-msg')
                @include('idea.shared.submit-idea')
                @error('tweet')
                    @include('shared.error-msg', ['message' => $message])
                @enderror
                <hr>
                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        @include('idea.shared.idea-card')
                    </div>
                @empty
                    <p class="text-center mt-4">No results.</p>
                @endforelse
                <div class="mt-3">
                    {{ $ideas->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
