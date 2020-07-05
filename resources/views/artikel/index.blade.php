@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Artikel</h1>
    </div>
    {{-- @if (session('success'))
        <div class="alert alert-success mt-2 mb-2">
            {{ session('success') }}
        </div>
    @endif --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <label class="m-0 font-weight-bold text-primary">DataTables Artikel</label>
            <a href=" {{ route('artikel.create') }} " class="btn btn-success btn-sm float-right" title="tambah artikel"><i class="fas fa-plus-square"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikel as $art)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $art->judul }} </td>
                                <td>
                                    <a href=" {{ route('artikel.detail', $art->id) }} " class="btn btn-info btn-mn" title="Detail Artikel"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('artikel.edit', $art->id) }}" class="btn btn-warning btn-mn" title="Edit Artikel"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('artikel.delete', $art->id) }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-mn border-0" title="Hapus Artikel"><i class="fas fa-trash-restore-alt"></i></button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('sbadmin2/js/demo/datatables-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
    @if( Session::has('success'))
    <script>
        Swal.fire({
            type: 'success',
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            confirmButtonText: 'Cool'
        })
    </script>

    @endif
@endpush
