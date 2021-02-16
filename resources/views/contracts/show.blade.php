@extends('layouts.app')

@section('title', 'Kontrak MK')

@section('content')
<div class='card'>
    <div class='cardbody'>
        <h3> ID Mahasiswa :{{ $contracts['mhs_id'] }} </h3>
        <h3> ID Semester :{{ $contracts['smstr_id'] }} </h3>
    </div>
</div>
@endsection
