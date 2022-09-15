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
  <!-- Info boxes -->
  <div class="row mt-4">
   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold  text-uppercase mb-1">
            All Customers</div>
            <div>{{ $customer }}</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            </div>
          </div>
          <div class="col-auto">
            <i class="bi bi-people text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

   <div class="col-xl-3 col-md-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold  text-uppercase mb-1">
            All Transaksi</div>
            <div>{{ $transaksi }}</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            </div>
          </div>
          <div class="col-auto">
            <i class="bi bi-basket"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Grafik transaksi bulanan</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-wrench"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="#" class="dropdown-item">Action</a>
              <a href="#" class="dropdown-item">Another action</a>
              <a href="#" class="dropdown-item">Something else here</a>
              <a class="dropdown-divider"></a>
              <a href="#" class="dropdown-item">Separated link</a>
            </div>
          </div>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->

      <!-- ./card-body -->
      <div class="card-body">
        <div id="grafik"></div>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Grafik transaksi Harian</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-wrench"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="#" class="dropdown-item">Action</a>
              <a href="#" class="dropdown-item">Another action</a>
              <a href="#" class="dropdown-item">Something else here</a>
              <a class="dropdown-divider"></a>
              <a href="#" class="dropdown-item">Separated link</a>
            </div>
          </div>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->

      <!-- ./card-body -->
      <div class="card-body">
        <div id="harian"></div>
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<div class="row">
  <!-- /.col -->
</div>
<!-- /.row -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
  var Pendapatan = <?php echo json_encode($hargatotal) ?>;
  var bulan = <?php echo json_encode($bulan) ?>;
  Highcharts.chart('grafik', {
    title : {
      text: 'Grafik Pendapatan Bulanan'
    },
    xAxis : {
      categories : bulan
    },
    yAxis : {
      title: {
        text : 'Nominal Pendapatan Bulanan'
      }
    },
    plotOptions: {
      series: {
        allowPointSelect: true
      }
    },
    series: [
    {
      name: 'Nominal Pendapatan',
      data: Pendapatan
    }
    ]
  })
</script>
<script type="text/javascript">
  var Pendapatan = <?php echo json_encode($hargatotal1) ?>;
  var harian = <?php echo json_encode($harian) ?>;
  Highcharts.chart('harian', {
    title : {
      text: 'Grafik Pendapatan Harian'
    },
    xAxis : {
      categories : harian
    },
    yAxis : {
      title: {
        text : 'Nominal Pendapatan Harian'
      }
    },
    plotOptions: {
      series: {
        allowPointSelect: true
      }
    },
    series: [
    {
      name: 'Nominal Pendapatan',
      data: Pendapatan
    }
    ]
  })
</script>
<!-- Main row -->
</div>
@endsection