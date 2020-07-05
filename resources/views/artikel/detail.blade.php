@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail</h1>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-1"> {{ $artikels->judul }} </h5>
                    <small>slug : {{ $artikels->slug }}</small>
                    <p class="card-text mt-2">{{ $artikels->isi }} </p>
                    @foreach ($tag1 as $key => $item)
                        <small href="#" class="btn btn-success btn-sm">{{ $tag1[$key] }}</small>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
