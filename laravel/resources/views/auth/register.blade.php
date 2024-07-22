@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action={{ route('register') }} method="post">
                @csrf
                <h3 class="text-center text-white">Register</h3>
                <div class="form-group mt-3">
                    <label for="name" class="text-white">Name:</label><br>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                        @include('shared.error-msg')
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-white">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        @include('shared.error-msg')
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-white">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        @include('shared.error-msg')
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="confirm-password" class="text-white">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                    @error('password_confirmation')
                        @include('shared.error-msg')
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-white"></label><br>
                    <input type="submit" name="submit" class="btn btn-outline-success btn-md" value="submit">
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-white">Login here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
