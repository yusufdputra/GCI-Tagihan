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

      @role('bendahara')
      <h2 class="section-title">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah</button>
      </h2>
      @endrole

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
                <table class="table table-bordered table-md">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Semester</th>
                      <th>Nama Tagihan</th>
                      <th>Jumlah Bayar (Rp.)</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($tagihan AS $key=>$value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->semester[0]['nama']}}</td>
                      <td>{{$value->nama_tagihan}}</td>
                      <td>{{$value->jumlah_bayar}}</td>
                      <td>
                        @role('bendahara')
                        <a href="#" class="btn btn-primary">Edit</a>
                        @endrole
                        <a href="{{url('tagihan/detail',[$value->id])}}" class="btn btn-success">Lihat</a>
                      </td>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ route('tagihan.store') }}" class="needs-validation" novalidate="">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Tagihan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Semeseter</label>
            <select required class="form-control" name="id_semester">
              @foreach ($semester AS $key=>$value)
              <option value="{{$value->id}}">{{$value->nama}} - {{$value->tahun_ajar}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Jenis Tagihan</label>
            <select required class="form-control" name="nama_tagihan">
              <option value="SPP">SPP</option>
              <option value="Uang Kontribusi">Uang Kontribusi</option>
              <option value="Uang Sosial">Uang Sosial</option>
            </select>
          </div>

          <div class="form-group">
            <label>Jumlah Bayar</label>
            <input required type="number" class="form-control" placeholder="Rp. ---" name="jumlah_bayar">

          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection