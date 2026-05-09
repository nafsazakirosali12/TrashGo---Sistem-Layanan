@extends('masyarakat.layouts_m.app_m')

@section('content')

<div class="w-100 px-4 px-md-5 mt-5 d-flex flex-column" style="min-height: 80vh;">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-grow">
        <h1 class="d-flex align-items-center gap-2 fw-bold">
            <i class="fa fa-bell text-warning fs-3"></i>
            Notifikasi
        </h1>

        <a href="/" onclick="location.reload()" class="btn btn-outline-secondary btn-sm">
            <i class="fa fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    {{-- STATUS PENGIRIMAN --}}
    <div class="bg-success-subtle text-success px-4 py-2 rounded-3 d-inline-flex align-items-center gap-2 mb-3">
        <i class="fa fa-truck"></i>
        <span class="fw-semibold">Status Pengiriman</span>
    </div>

    @forelse($orders as $order)
    <div class="d-flex align-items-start gap-3 p-3 mb-3 bg-white shadow-sm rounded-4">

        {{-- ICON --}}
        <div class="p-3 rounded-circle 
            @if($order->status == 'menunggu') bg-secondary-subtle
            @elseif($order->status == 'diproses') bg-warning-subtle
            @elseif($order->status == 'selesai') bg-success-subtle
            @endif">

            <i class="fa 
                @if($order->status == 'menunggu') fa-clock text-secondary
                @elseif($order->status == 'diproses') fa-truck text-warning
                @elseif($order->status == 'selesai') fa-check-circle text-success
                @endif">
            </i>
        </div>

        {{-- CONTENT --}}
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between">
                <h6 class="mb-1 fw-bold">Pesanan #{{ $order->id }}</h6>
                <small class="text-muted">{{ $order->created_at->diffForHumans() }}</small>
            </div>

            <p class="mb-1 text-muted">
                <!-- Status: -->

                @if($order->status == 'menunggu')
                    <span class="badge bg-secondary text-white fs-8">Status: Menunggu</span>

                @elseif($order->status == 'diproses')
                    <span class="badge bg-warning text-white fs-8">Status: Diproses</span>

                @elseif($order->status == 'selesai')
                    <span class="badge bg-success text-white fs-8">Status: Selesai</span>
                @endif
            </p>

           <!-- Narasi -->
            <p class="mb-0 text-muted small">
                @if($order->status == 'menunggu')
                    Pesananmu masih menunggu konfirmasi.
                @elseif($order->status == 'diproses')
                    Pesananmu sedang dalam proses pengolahan.
                @elseif($order->status == 'selesai')
                    Pesananmu telah selesai.
                @endif
            </p>
        </div>

    </div>
    @empty
    <div class="text-center py-5">
        <i class="fa fa-box-open fa-2x text-muted mb-2"></i>
        <p class="text-muted">Belum ada notifikasi pengiriman</p>
    </div>
    @endforelse

    {{-- PAGINATION ORDER --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $orders->links() }}
    </div>

    {{-- STATUS PEMBAYARAN --}}
    <div class="bg-success-subtle text-success px-4 py-2 rounded-3 d-inline-flex align-items-center gap-2 mt-5 mb-3">
        <i class="fa fa-wallet"></i>
        <span class="fw-semibold">Status Pembayaran</span>
    </div>

    @forelse($pembayarans as $p)
    <div class="d-flex align-items-start gap-3 p-3 mb-3 bg-white shadow-sm rounded-4">

        {{-- ICON --}}
        <div class="p-3 rounded-circle 
            @if($p->status == 'menunggu') bg-warning-subtle
            @elseif($p->status == 'berhasil') bg-success-subtle
            @elseif($p->status == 'gagal') bg-danger-subtle
            @endif">

            <i class="fa 
                @if($p->status == 'menunggu') fa-hourglass-half text-warning
                @elseif($p->status == 'berhasil') fa-check text-success
                @elseif($p->status == 'gagal') fa-times text-danger
                @endif">
            </i>
        </div>

        {{-- CONTENT --}}
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between">
                <h6 class="mb-1 fw-bold">Pembayaran #{{ $p->id }}</h6>
                <small class="text-muted">{{ $p->created_at->diffForHumans() }}</small>
            </div>

            <p class="mb-1 text-muted">
                <!-- Status:  -->

                @if($p->status == 'menunggu')
                    <span class="badge bg-secondary text-white fs-8">Status: Menunggu</span>

                @elseif($p->status == 'berhasil')
                    <span class="badge bg-success text-white fs-8 ">Status: Berhasil</span>

                @elseif($p->status == 'gagal')
                    <span class="badge bg-danger text-white fs-8">Status: Gagal</span>
                @endif
            </p>

           <!-- Narasi -->
            <p class="mb-0 text-muted small">
                @if($p->status == 'menunggu')
                    Pembayaranmu masih menunggu untuk diselesaikan.
                @elseif($p->status == 'berhasil')
                    Pembayaranmu berhasil.
                @elseif($p->status == 'gagal')
                    Pembayaranmu gagal. Silakan coba lagi.
                @endif
            </p>
        </div>

    </div>
    @empty
    <div class="text-center py-5">
        <i class="fa fa-wallet fa-2x text-muted mb-2"></i>
        <p class="text-muted">Belum ada notifikasi pembayaran</p>
    </div>
    @endforelse

    {{-- PAGINATION PEMBAYARAN --}}
    <div class="d-flex justify-content-center mt-3 mb-5">
        {{ $pembayarans->links() }}
    </div>

</div>

@endsection