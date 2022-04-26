@extends('layout.master')

@section('judul')
Form Edit Resep    
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
    <form action="/resep/{{$resep->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" value="{{$resep->judul}}" name="judul" class="form-control">
        </div>
        @error('judul')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control">{{$resep->content}}</textarea>
        </div>
        @error('konten')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" id="">
                <option value="">---Pilih Kategori</option>
                @foreach ($kategori as $item)
                    @if ($item->id === $resep->kategori_id)
                        <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endif
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
                    @if ($item->id === $resep->metode_id)
                        <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endif
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