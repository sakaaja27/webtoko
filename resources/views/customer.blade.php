@extends('layouts.main')

<div class="breadcrumbs d-flex align-items-center" style="background-image: url('/img/2car.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Detail</h2>
    <ol>
      <li>Customer</li> 
    </ol>

  </div>
</div>
@section('container')
<div class="container-fluid">
  <!-- table kategori -->
  <div class="row p-3">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Semua Customer</h4>
          <div class="card-tools">
            <div class="wrap w-100">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ketik keyword disini">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          @if ($message = Session::get('error'))
          <div class="alert alert-warning">
            <p>{{ $message }}</p>
          </div>
          @endif
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{ $message }}</p>
          </div>
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Nama </th>
                  <th>Telpon</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($data as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->telp}}</td>
                  <td>{{$item->alamat}}</td>
                  <td>{{$item->email}}</td>
                  <td>
                    
                   <a href="#"><button class="btn btn-danger btn-sm hapus" type="button" title="Delete" data-id="{{ $item->id }}" data-nama="{{$item->nama}}"><i class="bi bi-trash"></i></button></a>
                    <a href="#"><button class="btn btn-primary btn-sm del" type="button" title="Delete" data-id="{{ $item->id }}" data-nama="{{$item->nama}}"><i class="bi bi-x-square-fill"></i></button></a>
                  </td>
                </tr> 
                @empty
                <tr>
                  <td colspan="10">Tidak ada data</td>
                </tr>
                @endforelse
              </tbody>
        </table>
        <!-- untuk menampilkan link page, tambahkan skrip di bawah ini -->

      </div>
    </div>
  </div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customers</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('customer.store')}}" method="POST">
          @csrf
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <div class="row gx-3 mb-3 text">
            <div class="col-md-4">
              <label class="form-label">Nama Customer</label>
              <input type="text" placeholder="nama customer" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-4">
              <label class="form-label">Telpon</label>
              <input type="text" name="telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-4">
              <label class="form-label">Alamat</label>
              <input type="text" placeholder="alamat cust" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-4">
              <label class="form-label">Email</label>
              <input type="text" placeholder="email cust" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <div class="button" style="float:left;">
          <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
          <a href="/pegawai"><button type="button" class="btn btn-primary btn-sm tambah mt-3">Kembali</button></a>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">edit Customers</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('customer.store')}}" method="POST">
          @csrf
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <div class="row gx-3 mb-3 text">
            <div class="col-md-4">
              <label class="form-label">Nama Customer</label>
              <input type="text" placeholder="nama customer" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-4">
              <label class="form-label">Telpon</label>
              <input type="text" name="telp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-4">
              <label class="form-label">Alamat</label>
              <input type="text" placeholder="alamat cust" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-4">
              <label class="form-label">Email</label>
              <input type="text" placeholder="email cust" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </div>
          
      </div>
      <div class="modal-footer">
        <div class="button" style="float:left;">
          <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
          <a href="/pegawai"><button type="button" class="btn btn-primary btn-sm tambah mt-3">Kembali</button></a>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
<script type="text/javascript">
  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
  })
</script>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<script>
  $('.hapus').click(function() {
    var deleteid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');
    swal({
      title: "Yakin kawan?",
      text: "Kamu akan menghapus data ini dengan nama " + nama + " ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/delcust/" + deleteid + " ",
        swal("Selamat datamu udah dihapus", {
          icon: "success",
        });
      } else {
        swal("datamu masi aman gajadi dihapus!");
      }
    });
  })
</script>

<!-- permanent delete -->
<script>
  $('.del').click(function() {
    var deleteid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');
    swal({
      title: "Pastikan data di Transaksi sudah dihapus!!!",
      text: "Kamu akan menghapus permmanent data ini dengan nama " + nama + " ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/destroy/" + deleteid + " ",
        swal("Selamat datamu udah dihapus", {
          icon: "success",
        });
      } else {
        swal("datamu masi aman gajadi dihapus!");
      }
    });
  })
</script>
@endsection