@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Kelola Tagihan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah</button>


      </h2>

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
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <div class="form-group">
                  <!-- <div class="input-group mb-3">
                    <select required class="form-control" id="pilih_semester" name="id_semester">
                      <option selected disabled>Semua</option>
                      @foreach ($semester AS $key=>$value)
                      <option value="{{$value->id}}">{{$value->nama}} - {{$value->tahun_ajar}}</option>
                      @endforeach
                    </select>
                    <div class="input-group-append">
                      <button onclick="filter()" class="btn btn-primary" type="button">Button</button>
                    </div>
                  </div> -->
                </div>

                <table class="table table-bordered table-md">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Semester</th>
                      <th>Nama Tagihan</th>
                      <th>Jumlah Bayar (Rp.)</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($pembayaran AS $key=>$value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->tagihan[0]->semester[0]['nama']}}</td>
                      <td>{{$value->tagihan[0]['nama_tagihan']}}</td>
                      <td>{{$value->tagihan[0]['jumlah_bayar']}}</td>
                      <td>
                        @if ($value->status != 0)
                        <a href="#" class="btn btn-success">Lunas</a>
                        @else
                        <a href="#" class="btn btn-danger">Belum Lunas</a>
                        <a href="{{url('pembayaran/update',[$value->id])}}" target="_BLANK" class="btn btn-primary">Bayar</a>
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

      </div>
  </section>
</div>

<!-- <script type="text/javascript">
  function filter() {
    var semester = document.getElementById('pilih_semester').value;
    $.ajax({

      url: '{{url("pembayaran")}}/' + semester,
      type: 'GET',
      dataType: 'json',
      success: 'success',

      success: function(data) {
        console.log(data);
      },
      error: function(data) {
        alert('Gagal memanggil data')
      }
    })
  }
</script> -->

@endsection