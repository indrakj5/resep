@extends('layout.master')

@section('judul')
Daftar Resep   
@endsection

@section('content')
@auth
<a href="/resep/create" class="btn btn-success btn-sm mb-3">Tambah Data</a>
@endauth

<div class="row">
    @forelse ($resep as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('images/'. $item->thumbnail)}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{$item->judul}}</h5>
                <p class="card-text">{{Str::limit($item->content, 30)}}</p>
                <form action="/resep/{{$item->id}}" method="post">
                    @csrf
                    @method('delete')
                    
                    <a href="/resep/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                    @auth
                    <a href="/resep/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    @endauth
                </form>    
                </div>
            </div>
        </div>
    @empty
        <h4>Data Resep Masih Kosong</h4>
    @endforelse
    
</div>
@endsection  