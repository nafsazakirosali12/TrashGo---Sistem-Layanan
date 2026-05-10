@extends('layouts.app')

@section('page', 'Akun Petugas')

@section('content')

<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card mb-4 mx-auto">
        <div class="card-header pb-0 d-flex justify-content-between">
          <h6>Daftar Petugas</h6>
          <a href="{{ route('tambah-akun.create') }}" class=" btn bg-gradient-primary">
            + Tambah Akun
          </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
              <thead class="text-center">
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tim</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Ketua Tim</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sandi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody class="text-center">
                @forelse ($petugas as $p)
                  <tr>
                    <td>{{ $p->nama_tim }}</td>
                    <td>{{ $p->nama_ketua }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->email }}</td>
                    <td>••••••••</td>
                    <td>{{ $p->alamat }}</td>
                    <td class="text-center">
                      <a href="{{ route('tambah-akun.edit', $p->id) }}" class="btn bg-gradient-primary">
                        Ubah
                      </a>
                      <form id="deleteForm-{{ $p->id }}" action="{{ route('tambah-akun.delete', $p->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="btn btn-danger btn-sm"
                              onclick="confirmDelete({{ $p->id }})">
                              Hapus
                          </button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center">Data tidak ada</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: @json(session('success')),
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    });
</script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {

    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin hapus data?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6b8e23',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + id).submit();
            }
        });
    }

    window.confirmDelete = confirmDelete;
});
</script>

@endsection