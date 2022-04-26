@extends('layout.master')

@section('judul')
Kategori Detail {{$kategori->nama}}    
@endsection

@section('content')

<h3>Nama Kategori : {{$kategori->nama}}</h3>
<h3>Deskripsi : {{$kategori->deskripsi}}</h3>

@endsection