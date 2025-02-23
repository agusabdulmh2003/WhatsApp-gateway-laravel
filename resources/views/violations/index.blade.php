@extends('layout')

@section('content')
<h2>Data Pelanggaran</h2>
<a href="{{ route('violations.create') }}">Tambah Pelanggaran</a>
<table>
    <tr>
        <th>Nama Santri</th>
        <th>Pelanggaran</th>
        <th>Sanksi</th>
        <th>Tanggal</th>
    </tr>
    @foreach($violations as $v)
    <tr>
        <td>{{ $v->student->name }}</td>
        <td>{{ $v->violation_type }}</td>
        <td>{{ $v->sanction }}</td>
        <td>{{ $v->violation_date }}</td>
    </tr>
    @endforeach
</table>
@endsection
