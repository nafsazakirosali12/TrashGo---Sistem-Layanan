@extends('petugas.layouts_p.app_p')

@section('page', 'Daftar Pesanan')

@section('content')
<div class="container-fluid py-4">

    <h4 class="fw-bold mb-4">
        Daftar Pesanan
    </h4>

    @if(session('success'))
        <div class="alert alert-success text-white">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-white">
            {{ session('error') }}
        </div>
    @endif

    <style>
    .order-card {
        border-radius: 18px;
        transition: 0.2s ease;
        border: 1px solid #eef2e8;
        overflow: hidden;
    }

    .order-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.10) !important;
    }

    .order-card-top {
        height: 5px;
        background: linear-gradient(90deg, #82d616, #2dce89);
    }

    .order-icon {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: #f0f9e8;
        color: #4f8f12;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    .order-text {
        line-height: 1.4;
    }

    .order-location {
        min-height: 34px;
    }

    .modal-simple {
        border-radius: 18px;
        overflow: hidden;
    }

    .modal-simple-top {
        height: 5px;
        background: #82d616;
    }

    .detail-label {
        font-size: 11px;
        color: #8392ab;
        margin-bottom: 3px;
    }

    .detail-value {
        font-size: 13px;
        font-weight: 700;
        color: #344767;
        margin-bottom: 0;
    }

    .detail-row {
        margin-bottom: 14px;
    }

    .detail-close {
        background: transparent;
        border: none;
        color: #000;
        font-size: 26px;
        line-height: 1;
    }

    .swal-custom-popup {
        border-radius: 18px !important;
        padding: 28px !important;
    }

    .swal-custom-title {
        font-size: 28px !important;
        font-weight: 700 !important;
        color: #555 !important;
    }

    .swal2-html-container {
        font-size: 18px !important;
        color: #666 !important;
    }

    .swal2-icon.swal2-question {
        border-color: #9ab5bf !important;
        color: #9ab5bf !important;
    }
</style>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-cols-xxl-5 g-3">
    @forelse($orders as $order)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 order-card">
                <div class="order-card-top"></div>

                <div class="card-body p-3">

                    <div class="d-flex align-items-center mb-3">
                        <div class="order-icon me-2">
                            <i class="fas fa-user"></i>
                        </div>

                        <div>
                            <p class="text-xs text-secondary mb-0">Pemesan</p>
                            <h6 class="mb-0 text-sm">
                                {{ $order->masyarakat->nama_masyarakat ?? 'Nama tidak tersedia' }}
                            </h6>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="order-icon me-2">
                            <i class="fas fa-calendar-alt"></i>
                        </div>

                        <div class="order-text">
                            <p class="text-xs text-secondary mb-0">Tanggal & Waktu</p>
                            <p class="text-xs font-weight-bold mb-0 text-nowrap">
                                {{ \Carbon\Carbon::parse($order->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                |
                                {{ \Carbon\Carbon::parse($order->waktu)->format('H.i') }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="order-icon me-2">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>

                        <div class="order-text order-location">
                            <p class="text-xs text-secondary mb-0">Alamat</p>
                            <p class="text-xs font-weight-bold mb-0">
                                {{ $order->lokasi ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button type="button"
                                class="btn btn-sm btn-outline-success w-50 mb-0 py-2"
                                data-bs-toggle="modal"
                                data-bs-target="#detailPesanan{{ $order->id }}">
                            Detail
                        </button>

                        <form action="{{ route('daftar-pesanan.ambil', $order->id) }}" 
                            method="POST" 
                            class="w-50 form-ambil-pesanan">
                            @csrf
                            <button type="submit" class="btn btn-sm bg-gradient-success w-100 mb-0 py-2">
                                Ambil
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- Modal Detail Pesanan --}}
        <div class="modal fade" id="detailPesanan{{ $order->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 modal-simple">

                    <div class="modal-simple-top"></div>

                    @php
                        $pembayaran = $order->pembayaran;

                        $metodePembayaran = [
                            'cod' => 'COD',
                            'transfer' => 'Transfer',
                        ];

                        $statusPembayaran = [
                            'pending' => 'Menunggu',
                            'success' => 'Berhasil',
                            'failed' => 'Gagal',
                        ];
                    @endphp

                    <div class="modal-header" style="background: #82d616; border-bottom: none;">
                        <div>
                            <h6 class="modal-title mb-0 text-white">Detail Pesanan</h6>
                            <p class="text-xs mb-0 text-white" style="opacity: 0.85;">
                                Informasi lengkap pesanan pengangkutan
                            </p>
                        </div>

                        <button type="button"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                                style="background: transparent; border: none; color: #fff; font-size: 26px; line-height: 1;">
                            &times;
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="detail-row">
                            <p class="detail-label">Nama Pemesan</p>
                            <p class="detail-value">
                                {{ $order->masyarakat->nama_masyarakat ?? 'Nama tidak tersedia' }}
                            </p>
                        </div>

                        <div class="detail-row">
                            <p class="detail-label">Alamat</p>
                            <p class="detail-value">
                                {{ $order->lokasi ?? '-' }}
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-6 detail-row">
                                <p class="detail-label">Tanggal</p>
                                <p class="detail-value">
                                    {{ \Carbon\Carbon::parse($order->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                </p>
                            </div>

                            <div class="col-6 detail-row">
                                <p class="detail-label">Waktu</p>
                                <p class="detail-value">
                                    {{ \Carbon\Carbon::parse($order->waktu)->format('H.i') }}
                                </p>
                            </div>
                        </div>

                        <div class="detail-row">
                            <p class="detail-label">Kategori Sampah</p>
                            <p class="detail-value">
                                {{ $order->kategori->nama_kategori ?? '-' }}
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-6 detail-row">
                                <p class="detail-label">Metode Pembayaran</p>
                                <p class="detail-value">
                                    {{ $metodePembayaran[$pembayaran->metode_pembayaran ?? ''] ?? '-' }}
                                </p>
                            </div>

                            <div class="col-6 detail-row">
                                <p class="detail-label">Status Pembayaran</p>
                                <p class="detail-value">
                                    {{ $statusPembayaran[$pembayaran->status ?? ''] ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 detail-row">
                                <p class="detail-label">Point Digunakan</p>
                                <p class="detail-value">
                                    {{ number_format($pembayaran->point_digunakan ?? 0, 0, ',', '.') }} point
                                </p>
                            </div>

                            <div class="col-6 detail-row">
                                <p class="detail-label">Total Pembayaran</p>
                                <p class="detail-value">
                                    Rp{{ number_format($pembayaran->total_pembayaran ?? $order->total_harga ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <div class="detail-row mb-0">
                            <p class="detail-label">Catatan</p>
                            <p class="detail-value">
                                {{ $order->catatan ?? 'Tidak ada catatan.' }}
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    @empty
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center py-5">
                    <h6 class="mb-1">Belum ada pesanan</h6>
                    <p class="text-sm text-secondary mb-0">
                        Pesanan dengan status pending akan muncul di halaman ini.
                    </p>
                </div>
            </div>
        </div>
    @endforelse
</div>

@if($orders->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
@endif

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.form-ambil-pesanan').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                icon: 'question',
                title: 'Ambil pesanan?',
                text: 'Pastikan pesanan sudah sesuai.',
                showCancelButton: true,
                confirmButtonText: 'AMBIL',
                cancelButtonText: 'BATAL',
                reverseButtons: true,
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn bg-gradient-success mx-2',
                    cancelButton: 'btn btn-secondary mx-2',
                    popup: 'swal-custom-popup',
                    title: 'swal-custom-title'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection