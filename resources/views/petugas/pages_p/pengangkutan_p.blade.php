@extends('petugas.layouts_p.app_p')

@section('page', 'Pengangkutan')

@section('content')

<div class="container">

    <h4 class="fw-bold mb-4">
        Pengangkutan
    </h4>

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
                <strong>Status Pembayaran:</strong>
                {{ $pickup->order->pembayaran->status ?? '-' }}
            </p>

            <div class="d-flex gap-2">

                {{-- BUTTON UPDATE --}}
                <button type="button"
                        class="btn btn-success"
                        data-bs-toggle="modal"
                        data-bs-target="#updatePickup{{ $pickup->id }}">

                    Update

                </button>

                {{-- BUTTON SELESAI --}}
                <form action="{{ route('pengangkutan.selesai', $pickup->order->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <button type="submit"
                            class="btn btn-primary">

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
                    Update Pengangkutan
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <form action="{{ route('pengangkutan.update', $pickup->order->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <p>
                        <strong>Nama:</strong>
                        {{ $pickup->order->masyarakat->nama_masyarakat ?? '-' }}
                    </p>

                    <p>
                        <strong>Kategori:</strong>
                        {{ $pickup->order->kategori->nama_kategori ?? '-' }}
                    </p>

                    <p>
                        <strong>Alamat:</strong>
                        {{ $pickup->order->lokasi ?? '-' }}
                    </p>

                    <p>
                        <strong>Metode Pembayaran:</strong>
                        {{ $pickup->order->pembayaran->metode_pembayaran ?? '-' }}
                    </p>

                    {{-- BUKTI TF --}}
                    @if($pickup->order->pembayaran?->bukti_pembayaran)

<div class="mb-3">

    <label class="fw-bold d-block mb-2">
        Bukti Transfer
    </label>

    <img src="{{ asset($pickup->order->pembayaran->bukti_pembayaran) }}">
</div>

@endif

                    {{-- STATUS ORDER --}}
                    <div class="mb-3">

                        <label class="fw-bold">
                            Status Order
                        </label>

                        <select name="status_order"
                                class="form-select">

                            <option value="pending"
                                {{ $pickup->order->status == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="processing"
                                {{ $pickup->order->status == 'processing' ? 'selected' : '' }}>
                                Processing
                            </option>

                            <option value="completed"
                                {{ $pickup->order->status == 'completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                        </select>

                    </div>

                    {{-- STATUS PEMBAYARAN --}}
                    <div class="mb-3">

                        <label class="fw-bold">
                            Status Pembayaran
                        </label>

                        <select name="status_pembayaran"
                                class="form-select">

                            <option value="pending"
                                {{ ($pickup->order->pembayaran->status ?? '') == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="success"
                                {{ ($pickup->order->pembayaran->status ?? '') == 'success' ? 'selected' : '' }}>
                                Success
                            </option>

                            <option value="failed"
                                {{ ($pickup->order->pembayaran->status ?? '') == 'failed' ? 'selected' : '' }}>
                                Failed
                            </option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit"
                            class="btn btn-success">

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