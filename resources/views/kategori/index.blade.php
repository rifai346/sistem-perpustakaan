@extends('layout')
@section('title','Kategori')
@section('judul','Kategori')
@section('isi')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Table Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title mb-0">Data Kategori</h3>
                                <div class="ml-auto">
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#createkategoriModal">
                                        <i class="fa fa-plus"></i> Add Produk
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Kategori</th>
                                            <th>Nama Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $ktg)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ktg->id_kategori }}</td>
                                            <td>{{ $ktg->nama_kategori }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-toggle="modal" data-target="#editModal{{ $ktg->id_kategori }}"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('kategori.destroy', $ktg->id_kategori) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link btn-danger btn-lg" id="alert_demo_8">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="editModal{{ $ktg->id_kategori }}" tabindex="-1" aria-labelledby="editModalLabel{{ $ktg->id_kategori }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ ($ktg->id_kategori) }}">Edit Kategori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('kategori.update', $ktg->id_kategori) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nama_kategori">Nama Kategori</label>
                                                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $ktg->nama_kategori }}" placeholder="Masukkan nama kategori">
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

<div class="modal fade" id="createkategoriModal" tabindex="-1" aria-labelledby="createkategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createkategoriModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kategori">Id Kategori</label>
                        <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="Masukkan id kategori">
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama ketegori">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('script')
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf"],
            // Custom DOM to place search and buttons on the right
            "dom": '<"row"<"col-md-6"l><"col-md-6 d-flex justify-content-end align-items-center"fB>>rtip'
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
@endsection