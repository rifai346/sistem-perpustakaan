@extends('layout')
@section('title','Peminjaman')
@section('judul','Peminjaman')
@section('isi')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Table Peminjaman</h1>
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
                                <h3 class="card-title mb-0">DataPeminjaman</h3>
                                <div class="ml-auto">
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#createpeminjamanModal">
                                        <i class="fa fa-plus"></i> Add Peminjaman
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Peminjaman</th>
                                            <th>Id Buku</th>
                                            <th>Id Member</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $pmj)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pmj->id_peminjaman }}</td>
                                            <td>{{ $pmj->judul_buku }}</td>
                                            <td>{{ $pmj->nama_member }}</td>
                                            <td>{{ $pmj->tgl_peminjaman }}</td>
                                            <td>{{ $pmj->status }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-toggle="modal" data-target="#editModal{{ $pmj->id_peminjaman }}"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('peminjaman.destroy', $pmj->id_peminjaman) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link btn-danger btn-lg" id="alert_demo_8">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="editModal{{ $pmj->id_peminjaman }}" tabindex="-1" aria-labelledby="editModalLabel{{ $pmj->id_peminjaman }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ ($pmj->id_peminjaman) }}">Edit Peminjaman</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('peminjaman.update', $pmj->id_peminjaman) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="id_peminjaman">id peminjaman</label>
                                                                <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman" value="{{ $pmj->id_peminjaman }}" placeholder="Masukkan id peminjaman">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="id_buku">Buku</label>
                                                                <select class="form-control" id="id_buku" name="id_buku" required>
                                                                    <option value="" disabled selected>-- Pilih Buku --</option>
                                                                    @foreach ($buku as $bk)
                                                                    <option value="{{ $bk->id_buku }}">{{ $bk->judul_buku }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="id_member">Member</label>
                                                                <select class="form-control" id="id_member" name="id_member" required>
                                                                    <option value="" disabled selected>-- Pilih Member --</option>
                                                                    @foreach ($member as $mbr)
                                                                    <option value="{{ $mbr->id_member }}">{{ $mbr->nama_member }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tgl_peminjaman">Tanggal Peminjaman</label>
                                                                <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value="{{ $pmj->tgl_peminjaman }}" placeholder="Masukkan tangggal peminjaman">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Status</label>
                                                                <select class="form-control" name="status" required>
                                                                    <option value="Dipinjam">Dipinjam</option>
                                                                    <option value="Dikembalikan">Dikembalikan</option>
                                                                    <option value="Hilang">Hilang</option>
                                                                </select>
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

<div class="modal fade" id="createpeminjamanModal" tabindex="-1" aria-labelledby="createpeminjamanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createbukuModalLabel">Tambah Peminjaman Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_peminjaman">Id Peminjaman</label>
                        <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman" placeholder="Masukkan id peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="id_buku">Buku</label>
                        <select class="form-control" id="id_buku" name="id_buku" required>
                            <option value="" disabled selected>-- Pilih Judul --</option>
                            @foreach ($buku as $bk)
                            <option value="{{ $bk->id_buku }}">{{ $bk->judul_buku }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_member">Member</label>
                        <select class="form-control" id="id_member" name="id_member" required>
                            <option value="" disabled selected>-- Pilih Memeber --</option>
                            @foreach ($member as $mbr)
                            <option value="{{ $mbr->id_member }}">{{ $mbr->nama_member }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_peminjaman">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" placeholder="Masukkan tanggal pinjam">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                            <option value="Dicuri">Dicuri</option>
                            <option value="Dijual">Dijual</option>
                        </select>
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