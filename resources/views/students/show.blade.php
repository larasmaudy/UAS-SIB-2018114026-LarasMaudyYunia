@extends('layouts.app')

@section('title', 'mahasiswa')

@section('content')
<div class='card'>
    <div class='cardbody'>
        <h3> Nama Mahasiswa :{{ $students['nama_mhs'] }} </h3>
        <h3> Alamat :{{ $students['alamat'] }} </h3>
        <h3> No Telepon :{{ $students['notlp'] }} </h3>
        <h3> Email :{{ $students['email'] }} </h3>
    </div>
</div>
@endsection
