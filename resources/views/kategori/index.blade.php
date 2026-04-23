@extends('layouts.app')

@section('page', 'Kategori')

@section('page', 'Tables')

@section('content')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">

        <!-- HEADER -->
        <div class="card-header pb-0 d-flex justify-content-between">
          <h6>Data Kategori</h6>

          <a href="{{ route('kategori.create') }}" class="btn bg-gradient-primary btn-sm">
            + Tambah
          </a>
        </div>

        <!-- alert -->
        @if(session('success'))
        <div class="alert alert-success text-white mx-3 mt-3">
        {{ session('success') }}
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
                  <td class="text-sm">{{ $loop->iteration }}</td>

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

                    <!-- EDIT -->
                    <a href="{{ route('kategori.edit', $k->id) }}" 
                       class="text-warning font-weight-bold text-xs me-2">
                      Edit
                    </a>

                    <!-- DELETE -->
                      <button type="button" onclick="confirmDelete('{{ $k->id }}')" 
                      class="text-danger border-0 bg-transparent font-weight-bold text-xs">
                      Hapus
                    </button>
                    <form id="delete-form-{{ $k->id }}" action="{{ route('kategori.destroy', $k->id) }}" 
                    method="POST"  style="display:none;"> @csrf
                    @method('DELETE')
                  </form>
                    <form action="{{ route('kategori.destroy', $k->id) }}" 
                          method="POST" 
                          style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button onclick="return confirm('Yakin hapus?')" 
                              class="text-danger border-0 bg-transparent font-weight-bold text-xs">
                        Hapus
                      </button>
                    </form>
                  </td>

                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center text-sm text-secondary">
                    Data kategori belum ada
                  </td>
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

@endsection
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin hapus?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>