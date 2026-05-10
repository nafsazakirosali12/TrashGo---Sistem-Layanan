@extends('layouts.app')

@section('page', 'Tambah')

@section('content')

<div class="container-fluid py-4">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="mb-0">Tambah Akun Petugas</h5>
                </div>

                <div class="card-body pt-2">

                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="formPetugas" action="{{ route('tambah-akun.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Tim</label>
                            <input type="text" name="nama_tim" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ketua Tim</label>
                            <input type="text" name="nama_ketua" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sandi</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="acctive">Aktif</option>
                                <option value="inacctive">Non-aktif</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('tambah-akun') }}" class="btn bg-gradient-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn bg-gradient-primary">
                                Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('formPetugas').addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Simpan akun?',
            text: "Data petugas akan ditambahkan",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#6b8e23',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>

@endsection