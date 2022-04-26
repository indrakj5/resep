@extends('layout.master')

@section('judul')
Form Tambah Resep    
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
    <form action="/resep" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        @error('konten')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" id="">
                <option value="">---Pilih Kategori</option>
                @foreach ($kategori as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
            </select>
        </div>
        @error('kategori_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Metode</label>
            <select name="metode_id" class="form-control" id="">
                <option value="">---Pilih Metode</option>
                @foreach ($metode as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
            </select>
        </div>
        @error('metode_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Thumbnail </label>
            <input type="file" name="thumbnail" class="form-control">
        </div>
        @error('konten')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection