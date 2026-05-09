@extends('masyarakat.layouts_m.app_m')

@section('content')

<style>
body {
    background: #f4f7f6;
}
</style>

<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Riwayat Order</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a class="nav-link" href="{{ route('masyarakat.pages.order') }}">Order</a></li>
                        <li class="breadcrumb-item active">Riwayat Order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- End All Title Box -->

<div class="riwayat-order-page container mt-4 mb-5 pb-5">
    <br>
        <div class="mb-3">
            <a href="{{ url('/') }}" class="btn btn-outline-success" style="border-radius: 10px;">
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>
    <br>
    @if($riwayatOrders->isEmpty())
        <div class="alert alert-warning text-center">
            Belum ada riwayat order
        </div>
    @else

    <div class="row g-3">

        @foreach($riwayatOrders as $order)

        @php
            $status = strtolower($order->status);
            $payStatus = strtolower(optional($order->pembayaran)->status ?? '');
        @endphp

        <div class="col-md-4 mb-5">

            <div class="order-card h-100">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center">
                    <b class="small-text">
                        {{ $order->kategori->nama_kategori ?? '-' }}
                    </b>

                    <span class="badge-status
                        {{ $status == 'pending' ? 'badge-pending' : '' }}
                        {{ $status == 'processing' ? 'badge-processing' : '' }}
                        {{ $status == 'completed' ? 'badge-completed' : '' }}
                    ">
                        {{ $order->status }}
                    </span>
                </div>

                <small class="text-muted">
                    @php
                        \Carbon\Carbon::setLocale('id');
                    @endphp

                    {{ \Carbon\Carbon::parse($order->tanggal)->translatedFormat('l, d F Y') }}
                    •
                    {{ \Carbon\Carbon::parse($order->waktu)->format('H:i') }} WIB
                </small>

                <hr>

                <!-- INFO -->
                <div class="info-grid small-text">
                    <div>
                        <span class="label">Alamat:</span>
                        <span>{{ $order->lokasi }}</span>
                    </div>

                    <div>
                        <span class="label">Catatan:</span>
                        <span>{{ $order->catatan ?? '-' }}</span>
                    </div>

                </div>

                <hr>

                <!-- HEADER PEMBAYARAN -->
                <div class="d-flex justify-content-between align-items-center mb-1 small-text">
                    
                    <span class="label">Pembayaran</span>

                    <span class="badge-status
                        {{ $payStatus == 'pending' ? 'badge-pending' : '' }}
                        {{ $payStatus == 'success' ? 'badge-success' : '' }}
                        {{ $payStatus == 'failed' ? 'badge-failed' : '' }}
                    ">
                        {{ optional($order->pembayaran)->status ?? '-' }}
                    </span>

                </div>

                <!-- PEMBAYARAN -->
                <div class="payment-grid small-text">
                    <div>
                        <span class="label">Metode:</span>
                        <span>{{ ucfirst(optional($order->pembayaran)->metode_pembayaran ?? '-') }}</span>
                    </div>

                    <div>
                        <span class="label">Total:</span>
                        <span>
                            <b style="color:#28a745;">
                                Rp {{ number_format($order->total_harga,0,',','.') }}
                            </b>
                        </span>
                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <!-- PAGINATION -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $riwayatOrders->links() }}
    </div>

    @endif

</div>

@endsection