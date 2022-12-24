@extends('layouts.main')

@section('container')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                            <p class="text-center small">Enter your personal details to create account</p>
                        </div>

                        <form action="/register" method="post" class="row g-3 needs-validation" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="nama" class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    id="nama" placeholder="Full Nama" value="{{ old('nama') }}">

                                @error('name')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                                @error('email')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                                    placeholder="Password">
                                @error('password')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="passwordConfirmation" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation"
                                    placeholder="Password Confirmation...">
                                @error('password_confirmation')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="nik" class="form-label">Nik</label>
                                <input type="nik" class="form-control @error('nik') is-invalid @enderror" name="nik" id="password"
                                    placeholder="Nik...">
                                @error('nik')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="tentang" class="form-label">Tentang</label>
                                <textarea  class="form-control @error('tentang') is-invalid @enderror" name="tentang" id="tentang" cols="30" rows="10" placeholder="Tentang..."></textarea>
                                {{-- <input type="text" class="form-control @error('tentang') is-invalid @enderror" name="tentang" id="tentang"
                                    placeholder="Password"> --}}
                                @error('tentang')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="password"
                                    placeholder="Alamat...">
                                @error('alamat')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="no_telp" class="form-label">No Telepon</label>
                                <input type="no_telp" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="password"
                                    placeholder="No Telp...">
                                @error('no_telp')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Create Account</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">Already have an account? <a href="/">Log in</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
