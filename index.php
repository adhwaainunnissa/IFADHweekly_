<?php
$page_title = "Home - Website Informatika";
require 'header.php';
?>

<!-- Kartu Selamat Datang & Hero Section -->
<div class="card">
    <div class="hero">
        <div class="hero-text">
            <h1>Adhwa Ainun Nissa</h1>
            <p>PAdhwa Ainun Nissa merupakan mahasiswa S1 Informatika Universitas Muhammadiyah Semarang (UNIMUS). Aktif sebagai Google Student Ambassador dan JobStreet Campus Ambassador, Adhwa memiliki minat di bidang UI/UX Design, Front-End Development, serta teknologi digital. Dikenal sebagai pribadi yang aktif, bertanggung jawab, dan memiliki semangat belajar tinggi, Adhwa terus mengembangkan kemampuan melalui organisasi, proyek, dan berbagai kegiatan akademik maupun nonakademik.</p>
            
            <div class="creator-info">
                <span>Nama panjang</span>
                <h4>Adhwa Ainun Nissa</h4>
            </div>
        </div>
        <!-- Menggunakan gambar  -->
        <img class="hero-avatar" src="assets/images/Yoongi.png" alt="Foto Kaprodi" />
    </div>
</div>

<!-- Kartu Daftar Publikasi Ilmiah -->
<div class="card">
    <h3 class="card-title">Kemampuan</h3>
    <p style="margin-bottom: 20px; color: var(--text-muted);">Adhwa Memiliki Kemampuan</p>
    
    <ul class="pub-list">
        <li class="pub-item">
            <span class="pub-category">Desain</span>
            <div class="pub-title">Figma</div>
            <ul class="pub-sublist">
                <li class="pub-subitem">Canva</li>
                <li class="pub-subitem">Capcut</li>
                <li class="pub-subitem">CorelDRAW</li>
            </ul>
        </li>
        <li class="pub-item">
            <span class="pub-category">Public Speaking</span>
            <div class="pub-title">Master Of Ceremonies</div>
            <div class="pub-title">Moderator</div>
        </li>
        <li class="pub-item">
            <span class="pub-category">Pengalaman</span>
            <div class="pub-title">Google Student Ambassador</div>
            <div class="pub-title">JobStreet Campus Ambassador</div>
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