<?php 
require 'connections.php';

// Logika pemrosesan form saat tombol submit ditekan
if (isset($_POST['submit'])) {
    if (inputdata($_POST, $_FILES["foto"]) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan atau tidak ada perubahan');
            document.location.href = 'mahasiswa.php';
        </script>";
    }
}

$page_title = "Tambah Data Mahasiswa - Web Informatika";
require 'header.php';
?>

<div class="card form-card">
    <h3 class="card-title">Tambah Data Mahasiswa</h3>
    
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Contoh: Budi Santoso" required />
        </div>
        
        <div class="form-group">
            <label for="nim" class="form-label">NIM (Nomor Induk Mahasiswa)</label>
            <input type="number" name="nim" id="nim" class="form-control" placeholder="Contoh: 2201010045" required />
        </div>
        
        <div class="form-group">
            <label for="jurusan" class="form-label">Program Studi</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Contoh: Teknik Informatika" required />
        </div>
        
        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="budi@student.if.ac.id" />
        </div>
        
        <div class="form-group">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Contoh: 08123456789" />
        </div>
        
        <div class="form-group">
            <label for="foto" class="form-label">Foto Profil</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*" />
            <p class="form-tip">Format yang diizinkan: JPG, JPEG, PNG, WEBP. Maksimal 2MB.</p>
        </div>
        
        <div class="form-actions">
            <button type="submit" name="submit" id="submit" class="btn btn-primary">💾 Simpan Data</button>
            <a href="mahasiswa.php" class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-muted); display: inline-flex; align-items: center;">Kembali</a>
        </div>
    </form>
</div>

<!-- Kotak Catatan Edukasi Pembelajaran -->
<div class="card form-card" style="margin-top: 25px; border-left: 4px solid var(--secondary-color); background-color: #f0fdf4;">
    <h4 style="color: var(--secondary-color); margin-bottom: 8px;">🔑 Catatan Belajar Web Dev</h4>
    <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.5;">
        Kunci utama pengiriman data dari form HTML ke PHP adalah atribut <strong><code>name</code></strong>, bukan <code>id</code>. Ketika PHP menangkap data melalui variabel global (misal: <code>$_POST['nama']</code>), nilai di dalam kurung siku merujuk pada nilai atribut <code>name="nama"</code> di tag input. Atribut <code>id</code> lebih sering digunakan untuk penargetan label (<code>for=""</code>) dan manipulasi JavaScript.
    </p>
</div>

<?php
require 'footer.php';
?>