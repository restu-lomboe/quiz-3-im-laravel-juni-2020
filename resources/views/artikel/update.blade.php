@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Artikel</h1>
    </div>

    <form class="" action=" {{ route('artikel.update', $artikels->id) }} " method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" name="judul" class="form-control" value="{{ $artikels->judul }}" placeholder="Masukan Judul Artikel ..." required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">isi</label>
            <div class="col-sm-10">
                <input type="text" name="isi" class="form-control" value="{{ $artikels->isi }}" placeholder="Masukan isi Artikel ..." required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Slug</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $artikels->slug }}" placeholder="Masukan isi Artikel ..." readonly>
                <small>note* : tidak bisa di edit karna ambil data dari judul</small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tag</label>
            <div class="col-sm-10">
                <input type="text" name="tag" class="form-control" value="@foreach($tag1 as $key => $item){{ $tag1[$key] }},@endforeach" placeholder="Masukan Tag Artikel ..." required>
                <small>contoh penulisan tag : laravel, web, php</small>
            </div>
        </div>
        <div class="form-group row">
            <input type="hidden" name="created_at" value=" {{ $artikels->created_at }} ">
            <input type="hidden" name="updated_at" value=" {{ \Carbon\Carbon::now() }} ">
        </div>
        <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
</div>

@endsection
