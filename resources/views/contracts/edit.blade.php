@extends('layouts.app')

@section('title', 'Kontrak MK')

@section('content')

<form action="/contracts/{{ $contracts['id'] }}" method="POST">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleInputNama">ID Mahasiswa</label>
    <input type="text" class="form-control" id="exampleInputwaktu" name="mhs_id" value="{{ old('mhs_id') ? old('mhs_id') : $contracts['mhs_id'] }}">
    @error('mhs_id')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputNotlp">SKS</label>
    <input type="text" class="form-control" name="smstr_id" id="exampleInputnamamhs" value="{{ old('smstr_id') ? old('smstr_id') : $contracts['smstr_id'] }}">
    @error('smstr_id')
    <div class="alert alert-denger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection