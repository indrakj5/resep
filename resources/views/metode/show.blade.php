@extends('layout.master')

@section('judul')
Metode Detail {{$metode->nama}}    
@endsection

@section('content')

<h3>Nama Kategori : {{$metode->nama}}</h3>
<h3>Deskripsi : {{$metode->deskripsi}}</h3>

@endsection