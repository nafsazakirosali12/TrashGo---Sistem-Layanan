@extends('masyarakat.layouts_m.app_m')

@section('content')

<div class="container py-5 mb-5 pb-5">

    <div class="row justify-content-center">

        <!-- FORM CARD -->
        <div class="col-lg-7">

            <div class="card shadow-sm border-0 rounded-3">

                <div class="card-header bg-white border-0">
                    <h3 class="mb-0">Buat Pesanan</h3>
                    <small class="text-muted">Isi data dengan benar sebelum checkout</small>
                </div>

                <div class="card-body">

                    <form action="{{ url('/order') }}" method="POST">
                        @csrf

                        <!-- KATEGORI -->
                        <div class="mb-3">
                            <label class="form-label">Kategori Layanan</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- LOKASI -->
                        <div class="mb-3">
                            <label class="form-label">Lokasi Penjemputan</label>
                            <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Jl. Sudirman No. 10" required>
                        </div>

                        <div class="row">

                            <!-- TANGGAL -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>

                            <!-- WAKTU -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Waktu</label>
                                <input type="time" name="waktu" class="form-control" required>
                            </div>

                        </div>

                        <!-- CATATAN -->
                        <div class="mb-3">
                            <label class="form-label">Catatan</label>
                            <textarea name="catatan" class="form-control" rows="3" placeholder="Contoh: tolong cepat dijemput / ada barang besar" required></textarea>
                        </div>

                        <!-- INFO PRICE BOX -->
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <div>
                                Harga Tetap
                            </div>
                            <strong>Rp 10.000</strong>
                        </div>

                        <!-- BUTTON -->
                        <button type="submit" class="btn btn-success w-100 py-2">
                            Pesan Sekarang
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <!-- SIDEBAR INFO -->
        <div class="col-lg-5">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h5>Informasi Layanan</h5>
                    <hr>

                    <ul class="list-unstyled">
                        <li>✔ Penjemputan sampah cepat</li>
                        <li>✔ Harga fix Rp 10.000</li>
                        <li>✔ Sistem otomatis</li>
                        <li>✔ Langsung ke pembayaran</li>
                    </ul>

                    <hr>

                    <h6>Proses Order</h6>
                    <ol>
                        <li>Isi form</li>
                        <li>Klik pesan</li>
                        <li>Masuk pembayaran</li>
                        <li>Order diproses</li>
                    </ol>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection