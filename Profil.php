<?php
$page_title = "Profil Pembuat - Web Informatika";
require 'header.php';
?>

<div class="card">
    <h3 class="card-title">Profil Civitas</h3>
    
    <div class="profile-grid">
        <!-- Bagian Foto & Judul Samping -->
        <div class="profile-sidebar">
            <!-- Menggunakan FotoAdhwa.jpeg yang ada di folder assets/images -->
            <img class="profile-picture" src="assets/images/FotoAdhwa.jpeg" alt="Foto Adhwa" />
            <div class="profile-meta">
                <h3>Adhwa Faiz</h3>
                <p>Mahasiswa Teknik Informatika</p>
                <div style="margin-top: 15px;">
                    <span class="btn btn-secondary btn-sm" style="pointer-events: none; border-radius: 20px;">Developer</span>
                </div>
            </div>
        </div>
        
        <!-- Bagian Rincian Biodata -->
        <div>
            <h4 style="margin-bottom: 15px; color: var(--primary-color);">Informasi Pribadi</h4>
            <table class="profile-info-table">
                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td>:</td>
                    <td>Adhwa Faiz Ramadhan</td>
                </tr>
                <tr>
                    <td class="label">Nomor Induk Mahasiswa (NIM)</td>
                    <td>:</td>
                    <td>2201010045</td>
                </tr>
                <tr>
                    <td class="label">Program Studi</td>
                    <td>:</td>
                    <td>Teknik Informatika (IF)</td>
                </tr>
                <tr>
                    <td class="label">Konsentrasi Minat</td>
                    <td>:</td>
                    <td>Web Application Development & AI</td>
                </tr>
                <tr>
                    <td class="label">Email Resmi</td>
                    <td>:</td>
                    <td>adhwafaiz@student.if.ac.id</td>
                </tr>
                <tr>
                    <td class="label">Status Akademik</td>
                    <td>:</td>
                    <td><span style="color: var(--secondary-color); font-weight: 600;">Aktif</span></td>
                </tr>
            </table>

            <h4 style="margin-top: 30px; margin-bottom: 15px; color: var(--primary-color);">Kompetensi Pemrograman</h4>
            <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 15px;">Menguasai beberapa teknologi pengembangan web dan database berikut untuk menunjang tugas mandiri dan riset:</p>
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <span class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-dark); cursor: default;">HTML5 & CSS3</span>
                <span class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-dark); cursor: default;">PHP Native</span>
                <span class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-dark); cursor: default;">MySQL Database</span>
                <span class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-dark); cursor: default;">JavaScript</span>
                <span class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-dark); cursor: default;">Bootstrap CSS</span>
                <span class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-dark); cursor: default;">Laravel Framework</span>
            </div>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>