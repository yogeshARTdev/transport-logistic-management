@extends('auth.app')
@section('content')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            <span class="d-none d-lg-block">T&LM</span>
                        </a>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form class="row g-3 needs-validation" action="{{ route('post-register') }}" method="POST"
                                novalidate>
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="yourName" required>
                                    <div class="invalid-feedback">Please, enter your name!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Your Email</label>
                                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                </div>

                                <div class="col-12">
                                    <label for="role" class="form-label">Role</label>
                                    <select id="role" class="form-select" name="role_id" required>
                                        <option value="">Choose...</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please choose role!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword"
                                        required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log
                                            in</a>
                                    </p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection