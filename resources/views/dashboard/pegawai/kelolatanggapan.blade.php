@extends('dashboard.layouts.main')

@section('container')

<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            @if(Auth::user()->role == 1)
                <li class="breadcrumb-item">Admin</li>
            @else
                <li class="breadcrumb-item">Masyarakat</li>
            @endif
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
@if(session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<section class="section dashboard">
    <div class="card">
        <div class="card-body">

            <!-- Floating Labels Form -->
            <form class="row g-3" action="/kelolatanggapan" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $id }}">
                <div class="col-12 mt-5">
                    <div class="form-floating">
                        <input class="form-control bg-light" type="text" value="{{ $aduan->user->nama }}" readonly>
                        <label>Aduan Dari</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control bg-light" style="height: 100px;" readonly>{{ $aduan->isi_aspirasi }}</textarea>
                        <label for="floatingTextarea">Isi Aduan</label>
                    </div>
                </div>

                <div class="col-12">
                    <img src="https://s.kaskus.id/images/2012/12/19/4622021_20121219012816.jpg" alt="GambarAspirasi" height="300" style="width: 100%;object-fit: cover; background-attachment: fixed;">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
</section>

@endsection
