@extends('layout.master')

@section('judul')
Form Tambah Metode    
@endsection

@push('script')
<script src="https://cdn.tiny.cloud/1/thq48i23jv0wepfv9hodoayv9s2lh37wmn6oyoxvnti0311m/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>
@endpush

@section('content')
<form action="/metode" method="post">
    @csrf
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control">
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    @error('deskripsi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection