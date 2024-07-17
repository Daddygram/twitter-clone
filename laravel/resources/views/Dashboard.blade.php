@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <?php 
        if(DB::connection()->getPdo()){
            echo "Successfully connected to DB and DB name is " . DB::connection()->getDatabaseName();
        }
    ?>
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-msg')
            @include('idea.shared.submit-idea')
            @error('tweet')
                @include('shared.error-msg', ['message'=>$message])
            @enderror
            <hr>
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('idea.shared.idea-card')
                </div>
                @empty
                <p class="text-center mt-4">No resulte.</p>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection