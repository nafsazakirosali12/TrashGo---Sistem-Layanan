@extends('layouts.app')

@section('page', 'Kategori')

@section('content')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">

        <!-- HEADER -->
        <div class="card-header pb-0 d-flex justify-content-between">
          <h6>Data Kategori</h6>

          <!-- Button trigger modal tambah -->
            <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">
              + Tambah
            </button>
        </div>

          <!-- alert -->
          @if(session('success'))
          <div class="alert alert-success text-white mx-3 mt-3">
            {{ session('success') }}
          </div>
          @endif
          @if(session('warning'))
          <div class="alert alert-warning text-dark mx-3 mt-3">
            {{ session('warning') }}
          </div>
          @endif
          @if(session('error'))
            <div class="alert alert-danger text-white mx-3 mt-3">
              {{ session('error') }}
            </div>
          @endif
    
        <!-- TABLE -->
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">

              <!-- THEAD -->
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>

              <!-- TBODY -->
              <tbody>
                @forelse($kategori as $k)
                <tr>

                  <!-- NO -->
                  <td class="text-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $loop->iteration }}</td>

                  <!-- NAMA -->
                  <td>
                    <h6 class="mb-0 text-sm">{{ $k->nama_kategori }}</h6>
                  </td>

                  <!-- DESKRIPSI -->
                  <td>
                    <p class="text-xs text-secondary mb-0">
                      {{ $k->deskripsi ?? '-' }}
                    </p>
                  </td>

                  <!-- AKSI -->
                  <td class="text-center">

                    <!-- Ubah -->
                     <!-- Button trigger modal tambah -->
                    <button type="button" class="btn bg-gradient-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUbah{{ $k->id }}">
                      Ubah
                    </button>
                  
                    <!-- DELETE -->
                      <button type="button" onclick="confirmDelete('{{ $k->id }}')" 
                      class="btn btn-danger btn-sm">
                      Hapus
                    </button>
                    <form id="delete-form-{{ $k->id }}" action="{{ route('kategori.destroy', $k->id) }}" 
                    method="POST"  style="display:none;"> @csrf
                    @method('DELETE')
                  </form>
                  </td>

                </tr>

                <!-- Ubah Modal -->
                      <div class="modal fade" id="modalUbah{{ $k->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="modalUbah{{ $k->id }}">Ubah Kategori</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="formUbah-{{ $k->id }}" action="{{ route('kategori.update', $k->id) }}" method="POST">
                            <div class="modal-body">
                              @csrf
                              @method('PUT')

                              @if ($errors->any() && session('edit_modal') == $k->id)
                                <div class="alert alert-danger text-white">
                                    {{ implode(' & ', $errors->all()) }}
                                </div>
                              @endif

                              <!-- NAMA -->
                              <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input 
                                  type="text" 
                                  name="nama_kategori" 
                                  class="form-control"
                                  value="{{ $k->nama_kategori }}"
                                  placeholder="Masukkan nama kategori"
                                >
                              </div>

                              <!-- DESKRIPSI -->
                              <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea 
                                  name="deskripsi" 
                                  class="form-control"
                                  rows="3"
                                  placeholder="Masukkan deskripsi kategori">{{ $k->deskripsi }}</textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                              <button type="button" class="btn btn-primary" onclick="confirmUbah('{{ $k->id }}')">Simpan</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                @empty
                <tr>
                  <td colspan="4" class="text-center text-sm text-secondary">
                    Data kategori belum tersedia
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>

            <!-- Tambah Modal -->
            <div class="modal fade"
                id="modalTambah"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="modalTambahLabel"
                aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalTambahLabel">Tambah Kategori</h1>

                            <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                            </button>
                        </div>

                        <form id="formTambah" action="{{ route('kategori.store') }}" method="POST">
                            @csrf

                            <div class="modal-body">

                                {{-- ERROR --}}
                                @if ($errors->any())
                                <div class="alert alert-danger text-white" id="errorAlert">
                                    {{ implode(' & ', $errors->all()) }}
                                </div>
                                @endif

                                <!-- NAMA -->
                                <div class="mb-3">
                                    <label class="form-label">
                                        Nama Kategori
                                    </label>

                                    <input type="text"
                                        name="nama_kategori"
                                        class="form-control"
                                        value="{{ old('nama_kategori') }}"
                                        placeholder="Masukkan nama kategori">
                                </div>

                                <!-- DESKRIPSI -->
                                <div class="mb-3">
                                    <label class="form-label">
                                        Deskripsi
                                    </label>

                                    <textarea name="deskripsi"
                                        class="form-control"
                                        rows="3"
                                        placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetModalTambah()">Kembali</button>
                                <button type="button" class="btn btn-primary" onclick="confirmTambah()">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any() && session('edit_modal'))
<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = new bootstrap.Modal(
        document.getElementById('modalUbah{{ session('edit_modal') }}')
    );

    modal.show();

});
</script>
@endif

@if ($errors->any() && !session('edit_modal'))
<script>
document.addEventListener('DOMContentLoaded', function () {

    const modalTambah = new bootstrap.Modal(
        document.getElementById('modalTambah')
    );

    modalTambah.show();

});
</script>
@endif


<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus kategori?',
        text: 'Kategori yang dihapus tidak bisa dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        allowOutsideClick: false,
        allowEscapeKey: false,
        buttonsStyling: false,

        customClass: {
            confirmButton: 'btn btn-danger me-2',
            cancelButton: 'btn btn-secondary'
        }

    }).then((result) => {

        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }

    });
}

function confirmTambah() {
    Swal.fire({
        title: 'Simpan kategori?',
        text: 'Pastikan data kategori sudah benar',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
        allowOutsideClick: false,
        allowEscapeKey: false,
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-primary me-2',
            cancelButton: 'btn btn-secondary'
        }
    }).then((result) => {

        if (result.isConfirmed) {
            document.getElementById('formTambah').submit();
        }
    });
}

function confirmUbah(id) {

    Swal.fire({
        title: 'Simpan perubahan?',
        text: 'Perubahan yang dilakukan akan disimpan',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
        allowOutsideClick: false,
        allowEscapeKey: false,
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-primary me-2',
            cancelButton: 'btn btn-secondary'
        }
    }).then((result) => {

        if (result.isConfirmed) {
            document.getElementById('formUbah-' + id).submit();
        }
    });
}

function resetModalTambah() {

    const modalTambah = document.getElementById('modalTambah');

    // reset form
    modalTambah.querySelector('form').reset();

    // kosongkan input manual
    modalTambah.querySelector('input[name="nama_kategori"]').value = '';

    modalTambah.querySelector('textarea[name="deskripsi"]').value = '';

    // hilangkan alert
    const alertBox = document.getElementById('errorAlert');

    if (alertBox) {
        alertBox.remove();
    }
}

</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const modalUbahList = document.querySelectorAll('[id^="modalUbah"]');

    modalUbahList.forEach(function(modalEl) {

        modalEl.addEventListener('hidden.bs.modal', function () {

            const form = modalEl.querySelector('form');
            form.reset();

            const alert = modalEl.querySelector('.alert');

            if (alert) {
                alert.remove();
            }

            window.location.href = "{{ route('kategori.index') }}";

        });

    });

});
</script>

<style>

.swal2-confirm:focus,
.swal2-cancel:focus {
    box-shadow: none !important;
}

.btn-danger.swal2-confirm:hover,
.btn-danger.swal2-confirm:focus,
.btn-danger.swal2-confirm:active {
    background-color: #ff0019 !important;
    border-color: rgb(255, 0, 25) !important;
}

</style>