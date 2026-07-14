<?php 
require 'connections.php';

// Validasi keberadaan parameter ID di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: mahasiswa.php");
    exit;
}

$id = intval($_GET["id"]);

// Logika pemrosesan form saat tombol submit ditekan
if (isset($_POST['submit'])) {
    if (editdata($_POST, $id, $_FILES["foto"]) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah atau tidak ada perubahan data');
            document.location.href = 'mahasiswa.php';
        </script>";
    }
}

// Ambil data mahasiswa berdasarkan ID
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$data_mhs = tampildata($query);

// Jika ID mahasiswa tidak ditemukan di database
if (empty($data_mhs)) {
    echo "<script>
        alert('Data mahasiswa tidak ditemukan!');
        document.location.href = 'mahasiswa.php';
    </script>";
    exit;
}

$mhs = $data_mhs[0];

$page_title = "Edit Data Mahasiswa - Web Informatika";
require 'header.php';
?>

<div class="card form-card">
    <h3 class="card-title">Edit Data Mahasiswa</h3>
    
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Input hidden untuk menjaga nama foto lama jika tidak diubah -->
        <input type="hidden" name="foto_lama" value="<?= htmlspecialchars($mhs['foto']); ?>" />

        <div class="form-group">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($mhs['nama']); ?>" required />
        </div>
        
        <div class="form-group">
            <label for="nim" class="form-label">NIM (Nomor Induk Mahasiswa)</label>
            <input type="number" name="nim" id="nim" class="form-control" value="<?= htmlspecialchars($mhs['nim']); ?>" required />
        </div>
        
        <div class="form-group">
            <label for="jurusan" class="form-label">Program Studi</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= htmlspecialchars($mhs['jurusan']); ?>" required />
        </div>
        
        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($mhs['email']); ?>" />
        </div>
        
        <div class="form-group">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" value="<?= htmlspecialchars($mhs['no_hp']); ?>" />
        </div>
        
        <div class="form-group">
            <label class="form-label">Foto Profil Saat Ini</label>
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 12px;">
                <?php
                $foto_path = 'assets/images/' . $mhs['foto'];
                $avatar_url = (file_exists($foto_path) && !empty($mhs['foto']) && $mhs['foto'] !== 'default.png') 
                    ? $foto_path 
                    : 'https://ui-avatars.com/api/?name=' . urlencode($mhs['nama']) . '&background=random&color=fff&size=100';
                ?>
                <img src="<?= $avatar_url; ?>" alt="Foto Profil" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border-color);" />
                <span style="font-size: 0.85rem; color: var(--text-muted);"><?= htmlspecialchars($mhs['foto']); ?></span>
            </div>
            
            <label for="foto" class="form-label">Unggah Foto Baru (Opsional)</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*" />
            <p class="form-tip">Biarkan kosong jika tidak ingin mengubah foto profil.</p>
        </div>
        
        <div class="form-actions">
            <button type="submit" name="submit" id="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
            <a href="mahasiswa.php" class="btn btn-sm" style="background-color: #f1f5f9; color: var(--text-muted); display: inline-flex; align-items: center;">Batal</a>
        </div>
    </form>
</div>

<!-- Kotak Catatan Edukasi Pembelajaran -->
<div class="card form-card" style="margin-top: 25px; border-left: 4px solid var(--secondary-color); background-color: #f0fdf4;">
    <h4 style="color: var(--secondary-color); margin-bottom: 8px;">🔑 Catatan Belajar Web Dev</h4>
    <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.5;">
        Pada halaman pengubahan data (Edit/Update), kita perlu mengisi input formulir secara otomatis menggunakan data lama dari database. Atribut <strong><code>value="..."</code></strong> digunakan pada elemen <code>input</code> untuk menaruh teks bawaan. Khusus untuk gambar, kita memajang gambar lama sebagai pratinjau dan menyediakan input file kosong, sehingga pengguna hanya mengunggah file jika mereka berniat mengganti foto tersebut.
    </p>
</div>

<?php
require 'footer.php';
?>