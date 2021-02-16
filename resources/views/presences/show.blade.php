@extends('layouts.app')

@section('title', 'absenn')

@section('content')
<div class='card'>
    <div class='cardbody'>
        <h3> Waktu :{{ $presences['waktu'] }} </h3>
        <h3> ID Mahasiswa :{{ $presences['mhs_id'] }} </h3>
        <h3> ID Mata Kuliah :{{ $presences['mk_id'] }} </h3>
        <h3> Kehadiran :{{ $presences['kehadiran'] }} </h3>
    </div>
</div>
@endsection
