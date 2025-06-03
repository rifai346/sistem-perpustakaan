@extends('layout')
@section('title','Member')
@section('judul','Member')
@section('isi')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Table Member</h1>
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
                                <h3 class="card-title mb-0">Data Member</h3>
                                <div class="ml-auto">
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#creatememberModal">
                                        <i class="fa fa-plus"></i> Add Mmember
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Member</th>
                                            <th>Nama Member</th>
                                            <th>Alamat</th>
                                            <th>Program Studi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($member as $mbr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mbr->id_member }}</td>
                                            <td>{{ $mbr->nama_member }}</td>
                                            <td>{{ $mbr->alamat }}</td>
                                            <td>{{ $mbr->program_studi }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-toggle="modal" data-target="#editModal{{ $mbr->id_member }}"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('member.destroy', $mbr->id_member) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link btn-danger btn-lg" id="alert_demo_8">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="editModal{{ $mbr->id_member }}" tabindex="-1" aria-labelledby="editModalLabel{{ $mbr->id_member }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ ($mbr->id_member) }}">Edit Mahasiswa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('member.update', $mbr->id_member) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="id_member">Id Member</label>
                                                                <input type="text" class="form-control" id="id_member" name="id_member" value="{{ $mbr->id_member }}" placeholder="Masukkan id member">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_member">Judul Buku</label>
                                                                <input type="text" class="form-control" id="nama_member" name="nama_member" value="{{ $mbr->nama_member }}" placeholder="Masukkan nama member">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Penerbit</label>
                                                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mbr->alamat }}" placeholder="Masukkan alamat">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="program_studi">Tahun Terbit</label>
                                                                <input type="text" class="form-control" id="program_studi" name="program_studi" value="{{ $mbr->program_studi }}" placeholder="Masukkan program studi">
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

<div class="modal fade" id="creatememberModal" tabindex="-1" aria-labelledby="creatememberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('member.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createbukuModalLabel">Tambah Buku Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_member">Id Member</label>
                        <input type="text" class="form-control" id="id_member" name="id_member" placeholder="Masukkan id member">
                    </div>
                    <div class="form-group">
                        <label for="nama_member">Nama Member</label>
                        <input type="text" class="form-control" id="nama_member" name="nama_member" placeholder="Masukkan nama member">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat">
                    </div>
                    <div class="form-group">
                        <label for="program_studi">Program Studi</label>
                        <input type="text" class="form-control" id="program_studi" name="program_studi" placeholder="Masukkan program studi">
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