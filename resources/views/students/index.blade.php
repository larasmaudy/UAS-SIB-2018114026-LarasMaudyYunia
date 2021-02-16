@extends('layouts.app')

@section('title','Mahasiswa')

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> 
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Tambah Data Mahasiswa</button>
<div class="card shadow mb-4">
    <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text">DATA MAHASISWA </h5>
        </div>
        <div class="card-body">
        <div class="table-responsive"> 
  <table class="table table-boarded" id="dataTable" width="100%" cellspacing="0"> 
  <thead>
    <tr>
      <th scope="col">NIM/ID</th>
      <th scope="col">Nama Mahasiswa </th>
      <th scope="col">Alamat</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Email</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($student as $student)
    <tr>
    <td>{!!$student->nim !!}</td>
    <td>{!!$student->nama_mhs !!}</td>
    <td>{!!$student->alamat !!}</td>
    <td>{!!$student->notlp !!}</td>
    <td>{!!$student->email !!}</td>
 
    <td><a href="/students/{{$student->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/students/{{$student->id}}" method="POST">
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
      <form action="/students" method="POST">

          @csrf

      <div class="modal-body">
      <div class="form-group">
    <label for="exampleInputNama">NIM/ID</label>
    <input type="text" class="form-control" id="exampleInputnim" name="nim" >
    @error('nim')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputNama">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="exampleInputnama_mhs" name="nama_mhs" aria-describedby="emailHelp">
        @error('nama_mhs')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputAlamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="exampleInputalamat" value="{{old('alamat')}}">
        @error('alamat')
        <div class="alert alert-denger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputNotlp">No Telp</label>
        <input type="text" class="form-control" name="notlp" id="exampleInputnotlp">
        @error('notlp')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">Email</label>
        <input type="text" class="form-control" name="email" id="exampleInputemail" aria-describedby="emailHelp">
        @error('email')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
    </div>
    </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Input</button>
      </div>
    </form>
    </div>
  </div>
</div>
  

@endsection

