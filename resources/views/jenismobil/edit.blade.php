@extends('layouts.main')
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('/img/2car.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Detail</h2>
    <ol>
      <li>Jenis</li>
    </ol>

  </div>
</div>
@section('container')
<div class="row justify-content-center mt-5">
  <div class="col-6">
    <div class="card mt-5">
      <div class="card-header"><h5>Edit Mobil</h5></div>
      <div class="card-body">
        <form action="/editmob/{{ $mob->id_jenis }}" method="POST">
          @csrf
          <div class="button" style="float:left;">
            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
            <a href="/barang"><button type="button" class="btn btn-primary btn-sm tambah mt-3">Kembali</button></a>
          </div>
        </form>
      </div>
    </div>