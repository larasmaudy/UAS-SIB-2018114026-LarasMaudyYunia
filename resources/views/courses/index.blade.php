@extends('layouts.app')

@section('title','MK')

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus fa-sm text-white-50"></i>
Tambah Data MataKuliah</button>

<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text">DATA MATAKULIAH</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive"> 
    <table class="table table-boarded" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
      <th scope="col">Kode/ID</th>
      <th scope="col">Nama Mata Kuliah</th>
      <th scope="col">SKS </th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($course as $course)
    <tr>
    <td>{!!$course->kode !!}</td>
    <td>{!!$course->nama_mk !!}</td>
    <td>{!!$course->sks !!}</td>
 
    <td><a href="/courses/{{$course->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/courses/{{$course->id}}" method="POST">
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
      <form action="/courses" method="POST">

          @csrf

      <div class="modal-body">
      <div class="form-group">
        <label for="exampleInputNama">ID</label>
        <input type="text" class="form-control" id="exampleInputkode" name="kode" >
        @error('kode')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputNama">Nama Matakuliah</label>
        <input type="text" class="form-control" id="exampleInputwaktu" name="nama_mk" aria-describedby="emailHelp">
        @error('nama_mk')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="exampleInputNotlp">SKS</label>
        <input type="text" class="form-control" name="sks" id="exampleInputnamamhs" value="{{old('sks')}}">
        @error('sks')
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
