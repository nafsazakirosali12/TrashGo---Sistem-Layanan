@extends('layouts.app')

@section('page', 'Edit')

@section('content')

<div class="container-fluid py-4">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-header pb-0">
                    <h5 class="mb-0">Edit Akun Petugas</h5>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="formEditPetugas" action="{{ route('tambah-akun.update', $petugas->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Tim</label>
                            <input type="text" name="nama_tim" class="form-control"
                                value="{{ $petugas->nama_tim }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ketua</label>
                            <input type="text" name="nama_ketua" class="form-control"
                                value="{{ $petugas->nama_ketua }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ $petugas->email }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Kosongkan jika tidak diubah">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control">{{ $petugas->alamat }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="active"
                                    {{ $petugas->status == 'active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="inactive"
                                    {{ $petugas->status == 'inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('tambah-akun') }}" class="btn bg-gradient-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn bg-gradient-primary">
                                Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<script>
    document.getElementById('formEditPetugas').addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Update akun?',
            text: "Perubahan data petugas akan disimpan",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#6b8e23',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, update!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>

@endsection