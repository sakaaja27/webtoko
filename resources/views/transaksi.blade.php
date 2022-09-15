@extends('layouts.main')

<div class="breadcrumbs d-flex align-items-center" style="background-image: url('/img/2car.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Detail</h2>
    <ol>
      <li>Transaksi</li>
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
          <h4 class="card-title"><i class="bi bi-cart3"></i>Transaksi</h4>
          <div class="card-tools">
            <div class="wrap w-100">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add
              </button>
              <a href="/transaksi/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col">
                <input type="search" name="search" id="search" class="form-control" placeholder="ketik keyword disini" value="{{ request('search') }} ">
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
                  <th>Nama Cust</th>
                  <th>namamobil</th>
                  <th>Payment</th>
                  <th>Cabang</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>hargatotal</th>
                  <th>aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($transaksi as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->Customer->nama}}</td>
                  <td>{{$item->Jenismobil->namamobil}}</td>               
                  <td>{{$item->Pembayaran->payment}}</td>
                  <td>{{$item->Cabang->kota}}</td>
                  <td>{{$item->jumlah}}</td>
                  <td>Rp. {{ number_format($item->Jenismobil->harga)}}</td>
                  <td>Rp. {{ number_format($item->hargatotal)}}</td>
                
                  <td>
                    <a href="#modaledit{{ $item->id }}" data-bs-toggle="modal" class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                    <a href="#"><button class="btn btn-danger btn-sm hapus" type="button" title="Delete" data-id="{{ $item->id }}" data-nama="{{$item->Customer->nama}}"><i class="bi bi-trash"></i></button></a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="10">Tidak ada data</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{ $transaksi->links() }}
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
        <h5 class="modal-title" id="exampleModalLabel">Add Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('transaksi.store')}}" method="POST">
          @csrf
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <div class="row gx-3 mb-3 text">

           <div class="col-md-4">
            <label>Pilih Customer :</label>
            <select class="form-control" name="id_cust">
              <option value="">Pilih :</option>
              @foreach($customer as $namacust)
              <option value="{{$namacust->id}}">{{$namacust->nama}}</option>
              @endforeach
            </select>
          </div>


          <!-- jenis -->
          <div class="col-md-4">
            <label>Pilih Jenis Mobil :</label>
            <select class="form-control" name="id_jenis">
              <option value="">Pilih :</option>
              @foreach($jenismobil as $mobil)
              <option value="{{$mobil->id}}">{{$mobil->namamobil}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
            <label>Pilih Jenis Mobil :</label>
            <select class="form-control" id="harga" name="id_jenis">
              <option value="">Pilih :</option>
              @foreach($jenismobil as $mobil)
              <option value="{{$mobil->id}}">{{$mobil->harga}}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-4">
          </label>Pilih Pembayaran :</label>
          <select class="form-control" name="id_bayar">
            <option value="">Pilih :</option>
            @foreach($pembayaran as $bayar)
            <option value="{{$bayar->id}}">{{$bayar->payment}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row gx-3 mb-3 text">
        <div class="col-md-4">
          <label>Pilih Cabang :</label>
          <select class="form-control" name="id_cab">
            <option value="">Pilih :</option>
            @foreach($cabang as $cab)
            <option value="{{$cab->id}}">{{$cab->kota}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-4">
          <label>Jumlah</label>
          <input type="number" class="form-control" id="jum" name="jumlah">
        </div>  
        <div class="col-md-4">
          <label>Harga Total</label>
          <input type="number" class="form-control" id="total" name="hargatotal">
        </div>
      </div>



    </div>
    <div class="modal-footer">
      <div class="button" style="float:left;">
        <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
          
      </div>
    </div>
  </div>
</form>
</div>
</div>

<!-- Modal Edit -->
@foreach ($transaksi as $i)
<div class="modal fade" id="modaledit{{ $i->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/transaksi/{{ $i->id }}/update" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="row gx-3 mb-3 text">
            <div class="col-md-4">
              <label>Nama Cust :</label>
              <select class="form-control" name="id_cust">
               @foreach ($customer as $a)
                <option value="{{$a->id}}" {{ $a->id == $i->id_cust ? 'selected' : '' }}>{{ $a->nama}}</option>
                @endforeach
              </select>
            </div>
            <!-- jenis -->

             <div class="col-md-4">
              <label>Nama Mobil :</label>
              <select class="form-control" name="id_jenis">
                @foreach ($jenismobil as $mobil)
                  <option value="{{$mobil->id}}" {{ $mobil->id == $i->id_jenis ? 'selected' : '' }}>{{ $mobil->namamobil}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-4">
              <select class="form-control" id="harga" name="id_jenis">
                @foreach ($jenismobil as $mobil)
                <option   value="{{$mobil->id}}" {{ $mobil->id == $i->id_jenis ? 'selected' : '' }}>Rp. {{number_format($mobil->harga)}}</option>
                @endforeach
              </select>
            </div>
            <!-- payment -->

            <div class="col-md-4">
              <label>Payment :</label>
              <select class="form-control" name="id_bayar">
                @foreach ($pembayaran as $bayar)
                 <option value="{{$bayar->id}}" {{ $bayar->id == $i->id_bayar ? 'selected' : '' }}>{{$bayar->payment}}</option>
                @endforeach 
              </select>
            </div>
          </div>

          <div class="row gx-3 mb-3 text">
            <div class="col-md-4">
              <label>Cabang Pembelian :</label>
              <select class="form-control" name="id_cab">
                @foreach ($cabang as $cab)
                  <option value="{{$cab->id}}" {{ $cab->id == $i->id_cab ? 'selected' : '' }}>{{$cab->kota}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-4">
              <label>Jumlah</label>
             
              <input type="text" class="form-control" id="jum" onkeyup="sum();" name="jumlah" value="{{$i->jumlah}}" >
              
            </div>  
            <div class="col-md-4">
              <label>Harga Total</label>
             
              <input type="text" class="form-control" id="total" onkeyup="sum();" name="hargatotal" value="Rp. {{ number_format($i->hargatotal) }}">
              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="button" style="float:left;">
            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endforeach

<script type="text/javascript">
  function sum(){
    var txtFirstNumberValue = document.getElementById('jum').value;
    var txtFirstNumberValue = document.getElementById('harga').value;
    var result = parseInt(txtFirstNumberValue) + parseInt(txtFirstNumberValue);
    if (!isNaN(result)) {
      document.getElementById('total').value=result;
    }
  }
</script>

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
        window.location = "/deltran/" + deleteid + " ",
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

