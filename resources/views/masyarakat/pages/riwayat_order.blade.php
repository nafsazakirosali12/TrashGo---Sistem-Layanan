@extends('masyarakat.layouts_m.app_m')

@section('content')
<div class="container mt-5">

    <h3 class="fw-bold mb-4">Riwayat Order</h3>

    @if($orders->isEmpty())
        <div class="text-center mt-5">
            <h5 class="text-muted">Belum ada riwayat order</h5>
            <a href="/order" class="btn btn-success mt-2">Buat Order</a>
        </div>
    @else

    <div class="row">
        @foreach($orders as $order)
        <div class="col-md-6 mb-4">

            <div class="card border-0 shadow-sm order-card p-3">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="fw-bold mb-0">
                        {{ $order->kategori->nama_kategori ?? '-' }}
                    </h5>

                    <span class="badge 
                        {{ $order->status == 'completed' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <!-- TANGGAL -->
                <small class="text-muted">
                    {{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }} 
                    • {{ $order->waktu }}
                </small>

                <hr class="my-2">

                <!-- DETAIL -->
                <p class="mb-1">📍 {{ $order->lokasi }}</p>

                <p class="mb-1">
                    💳 {{ $order->pembayaran->metode_pembayaran ?? '-' }}
                </p>

                <!-- FOOTER -->
                <div class="d-flex justify-content-between align-items-center mt-2">

                    <span class="fw-bold text-success">
                        Rp {{ number_format($order->total_harga) }}
                    </span>

                    <span class="badge 
                        {{ ($order->pembayaran->status_pembayaran ?? '') == 'lunas' 
                            ? 'bg-success' 
                            : 'bg-danger' }}">
                        {{ $order->pembayaran->status_pembayaran ?? 'Belum Bayar' }}
                    </span>

                </div>

            </div>

        </div>
        @endforeach
    </div>

    @endif
</div>

<style>
.order-card {
    border-radius: 16px;
    transition: 0.2s ease;
}

.order-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}
</style>

@endsection