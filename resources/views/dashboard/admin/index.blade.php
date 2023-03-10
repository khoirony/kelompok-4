@extends('dashboard.layouts.main')

@section('container')

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-md-4">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Pegawai <span>| Jumlah</span></h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri ri-user-2-line"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $jmlpegawai }}</h6>
              <span class="text-success small pt-1 fw-bold">Pegawai</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Aspirasi <span>| Jumlah</span></h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri ri-user-3-line"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $jmlmasyarakat }}</h6>
              <span class="text-success small pt-1 fw-bold">Aspirasi</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Pengaduan <span>| Diterima</span></h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri ri-mail-send-line"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $aduanmasuk }}</h6>
              <span class="text-success small pt-1 fw-bold">Pengaduan</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Pengaduan <span>| Diproses</span></h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri ri-mail-settings-line text-warning"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $aduandiproses }}</h6>
              <span class="text-success small pt-1 fw-bold">Pengaduan</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Pengaduan <span>| Ditolak</span></h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri ri-mail-close-line text-danger"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $aduanditolak }}</h6>
              <span class="text-success small pt-1 fw-bold">Pengaduan</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Pengaduan <span>| Selesai</span></h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri ri-mail-check-line text-success"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $aduanselesai }}</h6>
              <span class="text-success small pt-1 fw-bold">Pengaduan</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection