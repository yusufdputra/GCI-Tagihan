@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>{{$title}}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>

    <div class="section-body">
      <input type="hidden" id="id_tagihan" value="{{$id_tagihan}}">
      @if(\Session::has('alert'))
      <div class="alert alert-danger">
        <div>{{Session::get('alert')}}</div>
      </div>
      @endif

      @if(\Session::has('success'))
      <div class="alert alert-success">
        <div>{{Session::get('success')}}</div>
      </div>
      @endif

      <div class="row">
        <div class="col-12 col-md-7 col-lg-7">
          <div class="card">
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Mahasiswa</th>
                      <th>Jumlah Bayar (Rp.)</th>
                      <th>Tanggal Bayar</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($pembayaran AS $key=>$value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->mahasiswa[0]['nama']}}</td>
                      <td>{{$value->tagihan[0]['jumlah_bayar']}}</td>
                      <td>{{$value->updated_at}}</td>
                      <td>
                        @if ($value->status != 0)
                        <span class="badge badge-success">Lunas</span>
                        @else
                        <span class="badge badge-danger">Belum Lunas</span>

                        @endif
                      </td>

                    </tr>
                    @endforeach
                  </tbody>

                </table>


              </div>

            </div>
          </div>
        </div>

        <div class="col-12 col-md-5 col-lg-5">
          <div class="card">
            <div class="card-header">
              <h4>Grafik Perbandingan</h4>
            </div>
            <div class="card-body">
              <canvas id="ChartPembayaran"></canvas>
            </div>
          </div>
        </div>

      </div>
  </section>
</div>

<script type="text/javascript">
  function renderChart(sudah, belum,id_chart) {
    var ctx = document.getElementById(id_chart).getContext("2d")
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Belum Bayar', 'Sudah Bayar'],
        datasets: [{
            label: "Belum Bayar",
            backgroundColor: "pink",
            borderColor: "red",
            borderWidth: 1,
            data: [belum]
          },
          {
            label: "Sudah Bayar",
            backgroundColor: "lightblue",
            borderColor: "blue",
            borderWidth: 1,
            data: [sudah]
          }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            display: false,
            drawOnChartArea: false
          }]
        }
      }
    });
  }

  $(document).ready(function() {
    // render chart chartSudahBayar
    var id_chart = "ChartPembayaran"
  
    var id_tagihan = document.getElementById('id_tagihan').value

    $.ajax({
      url: '{{url("getSudahBayar")}}/'+id_tagihan,
      type: 'GET',
      dataType: 'json',
      success: 'success',
      success: function(data) {
        renderChart(data['sudah'].length,data['belum'].length, id_chart)
      },
      error: function(data) {
        alert('Gagal memanggil data')
      }
    })

  })
</script>

@endsection