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

<div class="container mt-5 mb-5 pb-5" id="halamanPembayaran">

    <h2>Halaman Pembayaran</h2>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4">

        <!-- <p><b>Order ID:</b> {{ $order->id }}</p> -->
        <p><b>Total Harga:</b> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
        <!-- <p><b>Status:</b> {{ $order->status }}</p> -->

        <hr>

       <form id="formPembayaran" action="{{ route('pembayaran.store', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- METODE -->
            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="cod">COD</option>
                <option value="transfer">Transfer</option>
            </select>

            <!-- <br> -->

            <!-- INFO REKENING -->
            <div id="rekeningBox" style="display:none;" class="alert alert-info mt-3">
                <b>Transfer ke:</b><br>
                Bank BCA<br>
                No Rekening: <b>1234567890</b><br>
                Atas Nama: <b>PT TrashGo Indonesia</b>
            </div>

            <!-- POINT USER -->
            <div class="mt-3">
                <label>Total Poin Kamu</label>
                <input type="text" class="form-control" 
                       value="{{ $total_point }}" readonly>
            </div>

            <!-- PAKAI POINT -->
            <div class="mt-3">
                <label>
                    <input type="checkbox" id="pakaiPoint" name="pakai_point">
                    Gunakan Poin
                </label>
            </div>

            <div id="inputPoint" style="display:none;">
                <label>Masukkan Poin</label>
                <input type="number" name="point_digunakan" id="pointInput" class="form-control" placeholder="Minimal 10">
                <small id="errorPoint" class="text-danger"></small>
            </div>

            <!-- TOTAL BAYAR -->
            <div class="mt-3 alert alert-success">
                Total Bayar: <b id="totalBayar">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</b>
            </div>

            <!-- BUKTI -->
            <div class="mt-3" id="buktiBox" style="display:none;">
                <label class="form-label">Bukti Transfer</label>

                <div class="input-group">
                    
                    <label for="bukti" class="btn btn-outline-secondary mb-0">
                        Pilih File
                    </label>

                    <input type="file"
                        name="bukti_pembayaran"
                        id="bukti"
                        hidden>

                    <input type="text"
                        id="namaFile"
                        class="form-control"
                        value="Belum ada file dipilih"
                        readonly>
                </div>

                <small class="text-danger">
                    * Wajib jika memilih transfer
                </small>
            </div>

            <br>

           <button type="button" id="btnBayar" class="btn btn-trashgo w-100">
                Bayar Sekarang
            </button>
        </form>
    </div>
</div>


<!-- SWEETALERT2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let pembayaranSelesai = false;
    const metode = document.getElementById('metode');
    const rekeningBox = document.getElementById('rekeningBox');
    const buktiBox = document.getElementById('buktiBox');
    const bukti = document.getElementById('bukti');

    const pakaiPoint = document.getElementById('pakaiPoint');
    const inputPoint = document.getElementById('inputPoint');
    const pointInput = document.getElementById('pointInput');
    const totalBayar = document.getElementById('totalBayar');

    let total = {{ $order->total_harga }};

    metode.addEventListener('change', function() {
        if (this.value === 'transfer') {
            rekeningBox.style.display = 'block';
            buktiBox.style.display = 'block';
            bukti.required = true;
        } else {
            rekeningBox.style.display = 'none';
            buktiBox.style.display = 'none';
            bukti.required = false;
        }
    });

    pakaiPoint.addEventListener('change', function(){
        inputPoint.style.display = this.checked ? 'block' : 'none';

        if(!this.checked){
            pointInput.value = '';
            document.getElementById('errorPoint').innerText = '';
        }

        updateTotal();
    });

    pointInput.addEventListener('input', updateTotal);

    function updateTotal(){
        let point = parseInt(pointInput.value) || 0;
        let errorText = document.getElementById('errorPoint');

        if(point > 0 && point < 10){
            errorText.innerText = "Minimal 10 point!";
        } else {
            errorText.innerText = "";
        }

        let diskon = point * 10;
        let hasil = total - diskon;

        if (hasil < 0) hasil = 0;

        totalBayar.innerText = 'Rp ' + hasil.toLocaleString('id-ID');
    }

    // SWEET ALERT KONFIRMASI
    document.getElementById('btnBayar').addEventListener('click', function(){

        let form = document.getElementById('formPembayaran');
        let point = parseInt(pointInput.value) || 0;

        // VALIDASI POINT
        if(pakaiPoint.checked && point < 10){
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Point minimal 10!'
            });
            return;
        }

        // VALIDASI METODE
        if(metode.value == ""){
            Swal.fire({
                icon: 'warning',
                title: 'Metode pembayaran kosong!',
                text: 'Silakan pilih metode pembayaran'
            });
            return;
        }

        // VALIDASI BUKTI TRANSFER
        if(metode.value == "transfer" && bukti.files.length === 0){
            Swal.fire({
                icon: 'warning',
                title: 'Bukti transfer belum diupload!',
                text: 'Silakan upload bukti pembayaran'
            });
            return;
        }

        // KONFIRMASI
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pastikan data pembayaran sudah benar",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#B7C43A',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Bayar!',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Pembayaran sedang diproses',
                    timer: 1500,
                    showConfirmButton: false
                });

                setTimeout(() => {
                    pembayaranSelesai = true;
                    form.requestSubmit();
                }, 1500);
            }

        });

    });

    // BLOK SEMUA LINK / BUTTON SELAMA BELUM BAYAR
    document.addEventListener('click', function(e){

        if(pembayaranSelesai) return;

        const target = e.target.closest('a, button');

        if(!target) return;

        // IZINKAN tombol bayar
        if(target.id === 'btnBayar'){
            return;
        }

        // IZINKAN tombol SweetAlert
        if(target.classList.contains('swal2-confirm') ||
        target.classList.contains('swal2-cancel')){
            return;
        }

        // IZINKAN area upload file
        if(target.closest('#buktiBox')){
            return;
        }

        // cegah semua aksi
        e.preventDefault();
        e.stopPropagation();

        Swal.fire({
            icon: 'warning',
            title: 'Selesaikan Pembayaran',
            text: 'Silakan selesaikan pembayaran terlebih dahulu!',
            confirmButtonColor: '#B7C43A'
        });

    }, true);

    bukti.addEventListener('change', function () {

        const nama = this.files.length > 0
            ? this.files[0].name
            : 'Belum ada file dipilih';

        document.getElementById('namaFile').value = nama;

    });
</script>

@endsection