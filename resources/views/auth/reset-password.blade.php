@extends('layout')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h1>Reset Password</h1>
                        <form method="POST" action="{{ route('reset-password') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password_confirmation">Confirm New Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <input type="hidden" name="token" value="{{ $token }}">

                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </form>
                        
                    </div>
                </div>

                <p class="small text-center">
                    <a href="{{ route('login') }}">Login</a>
                    &bull;
                    <a href="{{ route('register') }}">Register New Account</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection