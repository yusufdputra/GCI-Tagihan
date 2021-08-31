@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Kelola Semester</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">
        <button type="button" class="btn btn-success">Tambah</button>
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
                <table class="table table-bordered table-md">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Semester</th>
                      <th>Tahun Ajar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($semester AS $key=>$value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->nama}}</td>
                      <td>{{$value->tahun_ajar}}</td>
                      <td><a href="#" class="btn btn-primary">Edit</a></td>
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


@endsection