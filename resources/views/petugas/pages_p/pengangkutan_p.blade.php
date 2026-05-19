@extends('petugas.layouts_p.app_p')

@section('page', 'Pengangkutan')

@section('content')

<h1>Halaman Pengangkutan</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Pemesan</th>
            <th>Status Order</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($orders as $order)
        <tr>
            <td>{{ $order->nama }}</td>

            <td>{{ $order->status }}</td>

            <td>{{ $order->pembayaran->status ?? '-' }}</td>

            <td>
                <form action="{{ route('pengangkutan.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- STATUS ORDER -->
    <select name="status_order">
        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
            Processing
        </option>
        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
            Completed
        </option>
    </select>

    <!-- STATUS PEMBAYARAN -->
    <select name="status_payment">
        <option value="pending" {{ ($order->pembayaran->status ?? '') == 'pending' ? 'selected' : '' }}>
            Pending (COD)
        </option>
        <option value="success" {{ ($order->pembayaran->status ?? '') == 'success' ? 'selected' : '' }}>
            Success
        </option>
        <option value="failed" {{ ($order->pembayaran->status ?? '') == 'failed' ? 'selected' : '' }}>
            Failed
        </option>
    </select>

    <button type="submit">Update</button>
</form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Tidak ada data pengangkutan</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection