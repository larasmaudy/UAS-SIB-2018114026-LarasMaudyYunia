@extends('layouts.app')

@section('title', 'Jadwal')

@section('content')
<div class='card'>
    <div class='cardbody'>
        <h3> Jadwal :{{ $schedules['jadwal'] }} </h3>
        <h3> ID Mata Kuliah :{{ $schedules['mk_id'] }} </h3>
    </div>
</div>
@endsection
