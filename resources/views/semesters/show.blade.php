@extends('layouts.app')

@section('title', 'Semester')

@section('content')
<div class='card'>
    <div class='cardbody'>
        <h3> Jadwal :{{ $semesters['jadwal'] }} </h3>
        <h3> ID Mata Kuliah :{{ $semesters['mk_id'] }} </h3>
    </div>
</div>
@endsection
