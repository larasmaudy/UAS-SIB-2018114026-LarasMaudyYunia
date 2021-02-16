@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')

<form action="/students/{{ $students['id'] }}" method="POST">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleInputNama">NIM/ID</label>
    <input type="text" class="form-control" id="exampleInputnim" name="nim" value="{{ old('nim') ? old('nim') : $students['nim'] }}" >
    @error('nim')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputNama">Nama Mahasiswa</label>
    <input type="text" class="form-control" id="exampleInputnama_mhs" name="nama_mhs" value="{{ old('nama_mhs') ? old('nama_mhs') : $students['nama_mhs'] }}" >
    @error('nama_mhs')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputNotlp">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputalamat" value="{{ old('alamat') ? old('alamat') : $students['alamat'] }}">
    @error('alamat')
    <div class="alert alert-denger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">No Telp</label>
    <input type="text" class="form-control" name="notlp" id="exampleInputnotlp" value="{{ old('notlp') ? old('notlp') : $students['notlp'] }}">
    @error('notlp')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">Email</label>
    <input type="text" class="form-control" name="email" id="exampleInputemail" aria-describedby="emailHelp" value="{{ old('email') ? old('email') : $students['email'] }}">
    @error('email')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">back</button>
  </div>
</form>


@endsection