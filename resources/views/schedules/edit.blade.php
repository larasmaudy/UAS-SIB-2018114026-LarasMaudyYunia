@extends('layouts.app')

@section('title', 'Jadwal')

@section('content')

<form action="/schedules/{{ $schedules['id'] }}" method="POST">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleInputNama">Jadwal</label>
    <input type="text" class="form-control" id="exampleInputwaktu" name="jadwal" value="{{ old('jadwal') ? old('jadwal') : $schedules['jadwal'] }}">
    @error('jadwal')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">ID Mata Kuliah</label>
    <input type="text" class="form-control" name="mk_id" id="exampleInputmk" value="{{ old('mk_id') ? old('mk_id') : $schedules['mk_id'] }}">
    @error('mk_id')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection