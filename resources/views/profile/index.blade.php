@extends('layout.master')

@section('judul')
Edit Profile   
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
<form action="/profile/{{$profile->id}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" value="{{$profile->tanggal_lahir}}" class="form-control">
    </div>
    @error('tanggal_lahir')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="umur" value="{{$profile->umur}}" class="form-control">
      </div>
      @error('umur')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{$profile->alamat}}</textarea>
    </div>
    @error('alamat')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection