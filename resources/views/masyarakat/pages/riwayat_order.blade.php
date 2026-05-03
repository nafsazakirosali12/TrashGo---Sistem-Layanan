@extends('masyarakat.layouts_m.app_m')

@section('content')

<style>
.table-custom {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
}

.table-custom th {
    font-size: 13px;
    background: #f8f9fa;
    border: none;
}

.table-custom td {
    font-size: 13px;
    border-top: 1px solid #eee;
}

/* STATUS WARNA (SOFT, GAK NORAK) */
.status-pending {
    color: #6c757d;
    font-weight: 500;
}

.status-pickup {
    color: #b08900;
    font-weight: 500;
}

.status-selesai {
    color: #198754;
    font-weight: 500;
}

/* PEMBAYARAN */
.pay-pending { color: #6c757d; }
.pay-konfirmasi { color: #b08900; }
.pay-paid { color: #198754; }
.pay-failed { color: #dc3545; }

.catatan {
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

<div class="container mt-4 mb-5 pb-5">

    <h1 class="mb-3 fw-bold">Riwayat Order</h1>

    @if($orders->isEmpty())

        <div class="alert alert-warning text-center">
            Belum ada riwayat order
        </div>

    @else

    <div class="table-responsive table-custom">

        <table class="table mb-0 align-middle">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Alamat</th>
                    <th>Catatan</th>
                    <th>Total</th>
                    <th>Status Order</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>

            <tbody>

                @foreach($orders as $index => $order)

                <tr>

                    <td>{{ $orders->firstItem() + $index }}</td>

                    <td>{{ $order->kategori->nama_kategori ?? '-' }}</td>

                    <td>{{ $order->tanggal }}</td>

                    <td>{{ $order->waktu }}</td>

                    <td>{{ $order->lokasi }}</td>

                    <td class="catatan">
                        {{ \Illuminate\Support\Str::limit($order->catatan, 40) ?? '-' }}
                    </td>

                    <td>
                        Rp {{ number_format($order->total_harga,0,',','.') }}
                    </td>

                    {{-- STATUS ORDER --}}
                    <td>
                        @if($order->status == 'pending')
                            <span class="status-pending">pending</span>
                        @elseif($order->status == 'pickup')
                            <span class="status-pickup">pickup</span>
                        @elseif($order->status == 'selesai')
                            <span class="status-selesai">selesai</span>
                        @else
                            <span>{{ $order->status }}</span>
                        @endif
                    </td>

                    {{-- STATUS PEMBAYARAN --}}
                    <td>
                        @if(optional($order->pembayaran)->status == 'pending')
                            <span class="pay-pending">pending</span>
                        @elseif(optional($order->pembayaran)->status == 'menunggu_konfirmasi')
                            <span class="pay-konfirmasi">menunggu_konfirmasi</span>
                        @elseif(optional($order->pembayaran)->status == 'paid')
                            <span class="pay-paid">paid</span>
                        @elseif(optional($order->pembayaran)->status == 'failed')
                            <span class="pay-failed">failed</span>
                        @else
                            <span>-</span>
                        @endif
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $orders->links() }}
    </div>

    @endif

</div>

@endsection