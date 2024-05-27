@extends('layouts.user.sidebar')

@section('style')
    <style>
        .card-detail {
            padding: 25px;
            border-radius: 10px;
            background-color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="p-5">

        <div class="mb-5">
            <h3>Ketentuan dan Persyaratan</h3>
        </div>
        <div class="mb-4">
            <h4>Pengalaman</h4>
            <ul style="list-style-type:disc;" class="ms-4">
                <li>Memiliki pengalaman magang atau bekerja di media massa.</li>
                <li>Memiliki portofolio tulisan berita yang baik.</li>
            </ul>
        </div>
        <div class="mb-4">
            <h4>Pendidikan dan Keterampilan</h4>
            <ul style="list-style-type:disc;" class="ms-4">
                <li>Memiliki minimal pendidikan Diploma III jurnalistik atau komunikasi massa.</li>
                <li>Memiliki kemampuan menulis yang baik dan tata bahasa yang benar.</li>
                <li>Memiliki kemampuan riset dan investigasi yang baik.</li>
                <li>Memiliki kemampuan untuk bekerja secara cepat dan tepat waktu.</li>
                <li>Memiliki pengetahuan luas tentang berbagai isu terkini.</li>
                <li>Memiliki kemampuan untuk bekerja di bawah tekanan.</li>
            </ul>
        </div>
        <div class="mb-4">
            <h4>Keterampilan Lainya</h4>
            <ul style="list-style-type:disc;" class="ms-4">
                <li>Memiliki kemampuan interpersonal yang baik.</li>
                <li>Mampu bekerja dalam tim.</li>
                <li>Memiliki etos kerja yang tinggi.</li>
                <li>Memiliki komitmen dan dedikasi yang tinggi.</li>
            </ul>
        </div>
        <div class="mb-4">
            <h4>Proses Seleksi</h4>
            <ul style="list-style-type:disc;" class="ms-4">
                <li>Lamaran kerja dapat diajukan melalui website atau email perusahaan media massa.</li>
                <li>Keputusan akhir mengenai penerimaan atau penolakan lamaran kerja akan diumumkan setelah proses seleksi
                    selesai.</li>
            </ul>
        </div>
        <div class="mb-4">
            <h4>Tips</h4>
            <ul style="list-style-type:disc;" class="ms-4">
                <li>Pastikan Anda memenuhi semua persyaratan yang diajukan oleh perusahaan media massa.</li>
                <li>Latih kemampuan menulis dan riset Anda.</li>
                <li>Ikuti perkembangan berita terkini.</li>
                <li>Tunjukkan antusiasme dan passion Anda terhadap dunia jurnalistik.</li>
            </ul>
        </div>
        <div class="mt-5">
            <a href="profile-user" class="btn btn-md text-black px-4"
                style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
                Kembali
            </a>
        </div>

    </div>
@endsection
