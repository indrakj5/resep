@extends('layout.master')

@section('judul')
Daftar Kategori   
@endsection

@push('script')
<script src="{{asset('admin/assets/libs/datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>
@endpush

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@section('content')
    <table class="table">
        @auth<a href="/kategori/create" class="btn btn-success btn-sm mb-3">Tambah Data</a>@endauth

        <table class="table table-bordered table-stripe" id="example1">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>
        @forelse ($kategori as $key => $item)
           <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->deskripsi}}</td>
                <td>
                <form action="/kategori/{{$item->id}}" method="post">
                    <a href="/kategori/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                        @auth
                        <a href="/kategori/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        @endauth
                </form>   
                </td>    
            </tr>    
                @empty
                <tr>
                    <td>Data Kategori Masih Kosong</td>
                </tr>    
                @endforelse
        </tbody>
    </table>
@endsection  