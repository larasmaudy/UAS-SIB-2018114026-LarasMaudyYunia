@extends('layouts.app')

@section('title','Kontrak MK')

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> 
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Tambah Data Kontrak</button>
<div class="card shadow mb-4">
    <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text">DATA KONTRAK </h5>
        </div>
        <div class="card-body">
        <div class="table-responsive"> 
  <table class="table table-boarded" id="dataTable" width="100%" cellspacing="0"> 
  <thead>
    <tr>
      <th scope="col">ID Mahasiswa</th>
      <th scope="col">ID Semester </th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($contract as $contracts)
    <tr>
    <td>{!!$contracts -> mhs_id !!}</td>
    <td>{!!$contracts -> smstr_id !!}</td>
 
    <td><a href="/contracts/{{$contracts->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/contracts/{{$contracts->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-secondary">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/contracts" method="POST">

          @csrf

      <div class="modal-body">
      <div class="form-group">
        <label for="exampleInputNama">ID Mahasiswa</label>
        <input type="text" class="form-control" id="exampleInputwaktu" name="mhs_id" aria-describedby="emailHelp">
        @error('mhs_id')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputNotlp">ID Semester</label>
        <input type="text" class="form-control" name="smstr_id" id="exampleInputnamamhs" value="{{old('smstr_id')}}">
        @error('smstr_id')
        <div class="alert alert-denger">{{ $message }}</div>
        @enderror
      </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Input</button>
      </div>
    </form>
    </div>
  </div>
</div>
  

@endsection
