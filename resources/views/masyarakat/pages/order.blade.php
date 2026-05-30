@extends('masyarakat.layouts_m.app_m')

@section('content')

<style>
    .btn-trashgo {
        background-color: #B7C43A;
        border: none;
        color: white;
        transition: 0.3s;
    }

    .btn-trashgo:hover {
        background-color: #9EAA2F; /* lebih gelap dikit */
        color: white;
    }
</style>

<div class="container py-5 mb-5 pb-5">

    <div class="row justify-content-center">

        <!-- FORM CARD -->
        <div class="col-lg-7">

            <div class="card shadow-sm border-0 rounded-3">

                <div class="card-header bg-white border-0">
                    <h3 class="mb-0">Pesanan Layanan TrashGo!</h>
                    <p><small class="text-muted">Isi data dengan benar</small></p>
                </div>

                <div class="card-body">

                    <form id="formOrder" action="{{ url('/order') }}" method="POST">
                        @csrf

                        <!-- KATEGORI -->
                         <!-- NAMA -->
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control"
                                value="{{ $user->nama_masyarakat }}"
                                readonly>
                        </div>

                        <!-- NOMOR TELEPON -->
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control"
                                value="{{ $user->no_telepon }}"
                                readonly>
                        </div>

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
                            <textarea 
                                name="lokasi"
                                class="form-control"
                                readonly>{{ $user->alamat }}</textarea>
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
                        <button type="button" id="btnOrder" class="btn btn-trashgo w-100 py-2">
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
                        <li>✔ Harga Rp 10.000</li>
                        <li>✔ Sistem otomatis</li>
                        <li>✔ Langsung ke pembayaran</li>
                    </ul>

                    <hr>

                    <h6>Proses Pesanan</h6>
                    <ol>
                        <li>Isi formulir</li>
                        <li>Tekan pesan</li>
                        <li>Masuk pembayaran</li>
                        <li>Pesanan diproses</li>
                    </ol>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('btnOrder').addEventListener('click', function () {

        let kategori = document.querySelector('[name="kategori_id"]').value;
        let tanggal = document.querySelector('[name="tanggal"]').value;
        let waktu = document.querySelector('[name="waktu"]').value;
        let catatan = document.querySelector('[name="catatan"]').value;

        // VALIDASI KOSONG
        if (
            kategori === "" ||
            tanggal === "" ||
            waktu === "" ||
            catatan === ""
        ) {

            Swal.fire({
                icon: 'warning',
                title: 'Form Belum Lengkap',
                text: 'Silakan lengkapi semua data pesanan terlebih dahulu.',
                confirmButtonColor: '#B7C43A'
            });

            return;
        }

        // KONFIRMASI ORDER
        Swal.fire({
            title: 'Buat Pesanan?',
            text: 'Pastikan data pesanan sudah benar',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#B7C43A',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Pesan!',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if (result.isConfirmed) {
                document.getElementById('formOrder').submit();
            }

        });

    });

});
</script>

@endsection