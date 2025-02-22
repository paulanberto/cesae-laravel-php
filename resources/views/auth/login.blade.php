@extends('layouts.fo_layout')
@section('content')
    <h5>Login</h5>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <a href="{{ route('password.request') }}">Esqueceu-se da password?</a>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    @endsection
