@extends('petugas.layouts_p.app_p')

@section('page', 'Pengangkutan')

@section('content')

<div class="container">

    <h4 class="fw-bold mb-4">
        Pengangkutan
    </h4>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#B7C43A'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('error') }}",
        confirmButtonColor: '#d33'
    });
</script>
@endif

<style>
    .btn-trashgo {
        background-color: #B7C43A;
        border: none;
        color: white;
        min-width: 110px;
        height: 55px;
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-trashgo:hover {
        background-color: #9EAA2F;
        color: white;
    }
</style>

    @if($pickups->isEmpty())

        <!-- <div class="alert alert-info rounded-4 shadow-sm border-0">
            Tidak ada pengangkutan aktif.
        </div> -->
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center py-5">
                    <h6 class="mb-1">Tidak ada pengangkutan</h6>
                </div>
            </div>
        </div>
    @else


<div class="row g-3">

@foreach($pickups as $pickup)
    <div class="col-md-6">

    <div class="card border-0 shadow-sm rounded-4 h-100">

        <div class="card-body">

            <h5 class="fw-bold mb-3">
                Order #{{ $pickup->order->id }}
            </h5>

            <p class="mb-2">
                <strong>Nama:</strong>
                {{ $pickup->order->masyarakat->nama_masyarakat ?? '-' }}
            </p>

            <p class="mb-2">
                <strong>Alamat:</strong>
                {{ $pickup->order->lokasi ?? '-' }}
            </p>

            <p class="mb-3">
                <strong>Tanggal:</strong>
                {{ $pickup->order->tanggal ?? '-' }}
            </p>

            <p class="mb-3">
                <strong>Waktu:</strong>
                {{ \Carbon\Carbon::parse($pickup->order->waktu)->format('H:i') }}
            </p>

            <p class="mb-3">
                <strong>Status Order:</strong>

                @if($pickup->order->status == 'pending')
                    Menunggu

                @elseif($pickup->order->status == 'processing')
                    Diproses

                @elseif($pickup->order->status == 'completed')
                    Selesai

                @else
                    -
                @endif

            </p>


            <div class="d-flex gap-2">

                {{-- BUTTON UPDATE --}}
                <button type="button"
                        class="btn btn-trashgo"
                        data-bs-toggle="modal"
                        data-bs-target="#updatePickup{{ $pickup->id }}">

                    Ubah

                </button>

                {{-- BUTTON SELESAI --}}
                <form action="{{ route('pengangkutan.selesai', $pickup->order->id) }}"
                method="POST" class="form-selesai">

                    @csrf
                    @method('PUT')

                    <button type="button"
                            class="btn btn-trashgo btn-selesai">

                        Selesai

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

{{-- MODAL UPDATE --}}
<div class="modal fade"
     id="updatePickup{{ $pickup->id }}"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4 border-0">

            <div class="modal-header">

                <h5 class="modal-title">
                    Ubah Pengangkutan
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <form action="{{ route('pengangkutan.update', $pickup->order->id) }}" method="POST" class="form-update">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <p class="border-bottom pb-2 mb-3">
                        <strong>Nama:</strong>
                        {{ $pickup->order->masyarakat->nama_masyarakat ?? '-' }}
                    </p>

                    <p class="border-bottom pb-2 mb-3">
                        <strong>Kategori:</strong>
                        {{ $pickup->order->kategori->nama_kategori ?? '-' }}
                    </p>

                    <div class="border-bottom row mb-3 pb-1">
                        <div class="col-6">
                            <p>
                                <strong>Tanggal:</strong>
                                {{ $pickup->order->tanggal ?? '-' }}
                            </p>
                        </div>

                        <div class="col-6">
                            <p>
                                <strong>Waktu:</strong>
                                {{ \Carbon\Carbon::parse($pickup->order->waktu)->format('H:i') }}
                            </p>
                        </div>
                    </div>


                    <p class="border-bottom pb-2 mb-3">
                        <strong>Alamat:</strong>
                        {{ $pickup->order->lokasi ?? '-' }}
                    </p>

                    <div class="border-bottom pb-2 mb-3">
                        <strong>Total Harga:</strong>
                        <span class="fw-bold" style="color: #4f8f12;">
                            Rp {{ number_format($pickup->order->pembayaran->total_pembayaran ?? 0, 0, ',', '.') }}
                        </span>
                    </div>

                    <p class="border-bottom pb-2 mb-3">
                        <strong>Catatan:</strong>
                        {{ $pickup->order->catatan ?? '-' }}
                    </p>

                    <p class="border-bottom pb-2 mb-3">
                        <strong>Metode Pembayaran:</strong>
                        {{ $pickup->order->pembayaran->metode_pembayaran ?? '-' }}
                    </p>
                    
                    <!-- <p class="border-bottom pb-2">
                        <!-- <strong>Status Pembayaran:</strong> -->
                        <!-- {{ $pickup->order->pembayaran->status ?? '-' }} -->
                    <!-- </p> -->
                     

                    {{-- BUKTI TF --}}
                   @if($pickup->order->pembayaran?->bukti_pembayaran)

                    <div class="mb-3">

                        <label class="fw-bold d-block mb-2">
                            Bukti Transfer
                        </label>

                        <img src="{{ asset($pickup->order->pembayaran->bukti_pembayaran) }}"
                            alt="Bukti Transfer"
                            class="img-fluid rounded-3 border shadow-sm"
                            style="max-height: 300px; object-fit: cover;">

                    </div>

                    @endif

                    {{-- STATUS ORDER --}}
                    <div class="mb-3">

                        <strong>Status Order</strong>
                        <select name="status_order"
                                class="form-select">

                            <option value="pending"
                                {{ $pickup->order->status == 'pending' ? 'selected' : '' }}>
                                Menunggu
                            </option>

                            <option value="processing"
                                {{ $pickup->order->status == 'processing' ? 'selected' : '' }}>
                                Diproses
                            </option>

                            <option value="completed"
                                {{ $pickup->order->status == 'completed' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>

                    </div>

                    {{-- STATUS PEMBAYARAN --}}
                    <div class="mb-3">

                    <strong>Status Pembayaran</strong>
                        <select name="status_pembayaran"
                                class="form-select">

                            <option value="pending"
                                {{ ($pickup->order->pembayaran->status ?? '') == 'pending' ? 'selected' : '' }}>
                                Menunggu
                            </option>

                            <option value="success"
                                {{ ($pickup->order->pembayaran->status ?? '') == 'success' ? 'selected' : '' }}>
                                Berhasil
                            </option>

                            <option value="failed"
                                {{ ($pickup->order->pembayaran->status ?? '') == 'failed' ? 'selected' : '' }}>
                                Gagal
                            </option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                <button type="button"
                    class="btn btn-success btn-update">
                    Simpan
                </button>

                </div>


            </form>

        </div>

    </div>


</div>
@endforeach


</div>
@endif
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btn-selesai').forEach(button => {
        button.addEventListener('click', function () {
            let form = this.closest('form');

            Swal.fire({
                title: 'Yakin sudah selesai?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#B7C43A',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Selesai!'
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });

    document.querySelectorAll('.btn-update').forEach(button => {
        button.addEventListener('click', function () {
            let form = this.closest('form');

            Swal.fire({
                title: 'Simpan perubahan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B7C43A',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!'
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });

});
</script>
@endpush