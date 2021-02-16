@extends('layouts.app')

@section('title', 'Absensi')

@section('content')

<form action="/presences/{{ $presences['id'] }}" method="POST">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleInputNama">Waktu</label>
    <input type="text" class="form-control" id="exampleInputwaktu" name="waktu" aria-describedby="emailHelp" value="{{ old('waktu') ? old('waktu') : $presences['waktu'] }}">
    @error('waktu')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputNotlp">ID Mahasiswa</label>
    <input type="text" class="form-control" name="mhs_id" id="exampleInputnamamhs" value="{{ old('mhs_id') ? old('mhs_id') : $presences['mhs_id'] }}">
    @error('mhs_id')
    <div class="alert alert-denger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">ID Mata Kuliah</label>
    <input type="text" class="form-control" name="mk_id" id="exampleInputmk" value="{{ old('mk_id') ? old('mk_id') : $presences['mk_id'] }}">
    @error('mk_id')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">Kehadiran</label>
    <input type="text" class="form-control" name="kehadiran" id="exampleInputmk" value="{{ old('kehadiran') ? old('kehadiran') : $presences['kehadiran'] }}">
    @error('kehadiran')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection