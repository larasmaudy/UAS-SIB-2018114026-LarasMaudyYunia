@extends('layouts.app')

@section('title', 'MK')

@section('content')

<form action="/courses/{{ $courses['id'] }}" method="POST">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleInputNama">Nama Matakuliah</label>
    <input type="text" class="form-control" id="exampleInputwaktu" name="nama_mk" aria-describedby="emailHelp" value="{{ old('nama_mk') ? old('nama_mk') : $courses['nama_mk'] }}">
    @error('nama_mk')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputNotlp">SKS</label>
    <input type="text" class="form-control" name="sks" id="exampleInputnamamhs" value="{{ old('sks') ? old('sks') : $courses['sks'] }}">
    @error('sks')
    <div class="alert alert-denger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection