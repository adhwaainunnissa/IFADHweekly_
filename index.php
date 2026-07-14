<?php
$page_title = "Home - Website Informatika";
require 'header.php';
?>

<!-- Kartu Selamat Datang & Hero Section -->
<div class="card">
    <div class="hero">
        <div class="hero-text">
            <h1>Selamat Datang di Portal Informatika</h1>
            <p>Portal resmi informasi akademik dan penelitian Program Studi Informatika. Temukan data mahasiswa terbaru, informasi profil civitas akademika, dan daftar jurnal ilmiah terkemuka di sini.</p>
            
            <div class="creator-info">
                <span>Dosen Pembimbing / Kaprodi</span>
                <h4>Prof. Yoongi Adhwa, Ph.D.</h4>
            </div>
        </div>
        <!-- Menggunakan gambar Yoongi.png yang ada di folder assets/images -->
        <img class="hero-avatar" src="assets/images/Yoongi.png" alt="Foto Kaprodi" />
    </div>
</div>

<!-- Kartu Daftar Publikasi Ilmiah -->
<div class="card">
    <h3 class="card-title">Daftar Publikasi Ilmiah</h3>
    <p style="margin-bottom: 20px; color: var(--text-muted);">Berikut adalah indeks publikasi ilmiah dan penelitian aktif di Program Studi Informatika:</p>
    
    <ul class="pub-list">
        <li class="pub-item">
            <span class="pub-category">Scopus Indexed</span>
            <div class="pub-title">Pemodelan Sistem Informasi Kebencanaan dan Analisis Sentimen Media Sosial</div>
            <ul class="pub-sublist">
                <li class="pub-subitem">Analisis Sentimen Kebijakan Publik Menggunakan Natural Language Processing</li>
                <li class="pub-subitem">Pemodelan Mitigasi Dampak Abrasi Pantai Berbasis Wireless Sensor Networks</li>
            </ul>
        </li>
        <li class="pub-item">
            <span class="pub-category">SINTA Nasional (S2)</span>
            <div class="pub-title">Rancang Bangun Aplikasi Monitoring Evaluasi Mahasiswa Menggunakan Web Native PHP</div>
        </li>
        <li class="pub-item">
            <span class="pub-category">Web of Science (WoS)</span>
            <div class="pub-title">Secure & Decentralized Architecture for IoT Smart Grid Management using Blockchain</div>
        </li>
    </ul>
</div>

<!-- Kartu Struktur Kurikulum Utama -->
<div class="card">
    <h3 class="card-title">Struktur Kurikulum Utama</h3>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Mata Kuliah</th>
                    <th>Kode MK</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pemrograman Berbasis Web</td>
                    <td>INF-301</td>
                    <td>3 SKS</td>
                </tr>
                <tr>
                    <td>Struktur Data dan Algoritma</td>
                    <td>INF-204</td>
                    <td>4 SKS</td>
                </tr>
                <tr>
                    <td>Basis Data Lanjut</td>
                    <td>INF-208</td>
                    <td>3 SKS</td>
                </tr>
                <tr>
                    <td>Kecerdasan Buatan (AI)</td>
                    <td>INF-402</td>
                    <td>3 SKS</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
require 'footer.php';
?>