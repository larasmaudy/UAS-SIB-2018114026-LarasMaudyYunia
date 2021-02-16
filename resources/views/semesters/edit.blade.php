@extends('layouts.app')

@section('title', 'Semester')

@section('content')

<form action="/semesters/{{ $semesters['id'] }}" method="POST">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleInputNama">Semester</label>
    <input type="text" class="form-control" id="exampleInputwaktu" name="semester" value="{{ old('semester') ? old('semester') : $semesters['semester'] }}" >
    @error('semester')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection