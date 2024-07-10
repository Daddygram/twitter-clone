@extends('layouts.layout')

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
            @include('shared.submit-idea')
            @error('tweet')
                @include('shared.error-msg', ['message'=>$message])
            @enderror
            <hr>
            @foreach ($ideas as $idea)
            <div class="mt-3">
                @include('shared.idea-card')
            </div>
            @endforeach
            <div class="mt-3">
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection