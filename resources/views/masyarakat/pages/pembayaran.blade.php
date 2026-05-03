@extends('masyarakat.layouts_m.app_m')

@section('content')

<div class="container mt-5 mb-5 pb-5">

    <h2>Halaman Pembayaran</h2>

    <div class="card p-4">

        <!-- <p><b>Order ID:</b> {{ $order->id }}</p> -->
        <p><b>Total Harga:</b> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
        <p><b>Status:</b> {{ $order->status }}</p>

        <hr>

        <form action="{{ route('pembayaran.store', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- METODE -->
            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="cod">COD</option>
                <option value="transfer">Transfer</option>
            </select>

            <br>

            <!-- INFO REKENING -->
            <div id="rekeningBox" style="display:none;" class="alert alert-info">
                <b>Transfer ke:</b><br>
                Bank BCA<br>
                No Rekening: <b>1234567890</b><br>
                Atas Nama: <b>PT TrashGo Indonesia</b>
            </div>

            <!-- POINT USER -->
            <div class="mt-3">
                <label>Total Point Kamu</label>
                <input type="text" class="form-control" 
                       value="{{ $total_point }}" readonly>
            </div>

            <!-- PAKAI POINT -->
            <div class="mt-3">
                <label>
                    <input type="checkbox" id="pakaiPoint" name="pakai_point">
                    Gunakan Point
                </label>
            </div>

            <div id="inputPoint" style="display:none;">
                <label>Masukkan Point</label>
                <input type="number" name="point_digunakan" id="pointInput" class="form-control" placeholder="Minimal 10">
            </div>

            <!-- TOTAL BAYAR -->
            <div class="mt-3 alert alert-success">
                Total Bayar: <b id="totalBayar">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</b>
            </div>

            <!-- BUKTI -->
            <div class="mt-3" id="buktiBox" style="display:none;">
                <label>Bukti Transfer</label>
                <input type="file" name="bukti_pembayaran" id="bukti" class="form-control">
                <small class="text-danger">* Wajib jika memilih transfer</small>
            </div>

            <br>

           <button class="btn btn-primary w-100"> Bayar Sekarang </button>

        </form>
    </div>
</div>

<script>
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
        updateTotal();
    });

    pointInput.addEventListener('input', updateTotal);

    function updateTotal(){
        let point = parseInt(pointInput.value) || 0;
        let diskon = point * 10;
        let hasil = total - diskon;

        if (hasil < 0) hasil = 0;

        totalBayar.innerText = 'Rp ' + hasil.toLocaleString('id-ID');
    }
</script>

@endsection