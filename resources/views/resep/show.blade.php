@extends('layout.master')

@section('judul')
Detail Resep {{$resep->judul}}  
@endsection

@section('content')

<img src="{{asset('images/'.$resep->thumbnail)}}" alt="">
<h1>{{$resep->judul}}</h1>
<p>{{$resep->content}}</p>
<p>{{$resep->kategori_id}}</p>
<p>{{$resep->metode_id}}</p>

<h1>Komentar</h1>

@foreach ($resep->komentar as $items) 
<a>- From {{$items->user->name}}: "{{$items->komentar}}" (Nilai: {{$items->like}})</a><br>
@endforeach

<form action="/komentar" method="post" enctype="multipart/form-data" class="my-3">
    @csrf
    <div class="form-group">
        <label>Isi komentar</label>
        <input type="hidden" name="resep_id" value ="{{$resep->id}}" class="form-control">
        <textarea name="komentar" cols="30" rows="10" class="form-control"></textarea>
    </div>
    @error('komentar')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Like</label>
        <input type="number" name="like" class="form-control">
    </div>
    @error('konten')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/resep" class="btn btn-secondary">Kembali</a>
</div>
@endsection  