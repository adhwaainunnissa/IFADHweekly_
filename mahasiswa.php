<?php
$page_title = "Data Mahasiswa - Web Informatika";
require 'header.php';
require 'connections.php';

// Query untuk mengambil seluruh data mahasiswa
$query = "SELECT * FROM mahasiswa ORDER BY id DESC";
$mahasiswas = tampildata($query);
?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; margin-bottom: 20px;">
        <h3 style="margin: 0; font-size: 1.5rem; font-weight: 700;">Data Mahasiswa</h3>
        <a href="inputdata.php" class="btn btn-primary">➕ Tambah Mahasiswa</a>
    </div>

    <!-- Alert Edukasi Database jika data kosong atau koneksi belum di-set -->
    <?php if (empty($mahasiswas)): ?>
        <div style="background-color: #eff6ff; border-left: 4px solid var(--primary-color); padding: 15px; border-radius: var(--radius-sm); margin-bottom: 25px;">
            <h4 style="color: var(--primary-color); margin-bottom: 6px;">💡 Database Belum Siap / Data Masih Kosong</h4>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 12px;">
                Jika Anda belum membuat tabel di MySQL (MAMP/XAMPP), silakan eksekusi perintah SQL DDL berikut di phpMyAdmin Anda:
            </p>
            <pre style="background-color: #f8fafc; padding: 10px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); font-family: monospace; font-size: 0.85rem; overflow-x: auto; color: #334155;">
CREATE DATABASE IF NOT EXISTS ifbfaweekly;
USE ifbfaweekly;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nim VARCHAR(30) NOT NULL UNIQUE,
    jurusan VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    no_hp VARCHAR(20),
    foto VARCHAR(100) DEFAULT 'default.png'
);</pre>
        </div>
    <?php endif; ?>

    <!-- Tabel Data Mahasiswa -->
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 60px; text-align: center;">No</th>
                    <th style="width: 80px; text-align: center;">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Program Studi</th>
                    <th>Kontak</th>
                    <th style="width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($mahasiswas)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 30px;">
                            Tidak ada data mahasiswa tersedia. Klik tombol di kanan atas untuk menambahkan.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php
                    $no = 1;
                    foreach ($mahasiswas as $mhs):
                        // Cek apakah file foto ada di lokal, jika tidak atau default, pakai UI-Avatars API sebagai fallback
                        $foto_path = 'assets/images/' . $mhs['foto'];
                        $avatar_url = (file_exists($foto_path) && !empty($mhs['foto']) && $mhs['foto'] !== 'default.png') 
                            ? $foto_path 
                            : 'https://ui-avatars.com/api/?name=' . urlencode($mhs['nama']) . '&background=random&color=fff&size=100';
                    ?>
                        <tr>
                            <td style="text-align: center; font-weight: 600; color: var(--text-muted);">
                                <?= $no++; ?>
                            </td>
                            <td style="text-align: center;">
                                <img class="student-photo" src="<?= $avatar_url; ?>" alt="Foto <?= htmlspecialchars($mhs['nama']); ?>" />
                            </td>
                            <td>
                                <strong style="color: var(--text-dark);"><?= htmlspecialchars($mhs['nama']); ?></strong>
                            </td>
                            <td>
                                <code style="background-color: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-weight: 600; color: var(--primary-color);"><?= htmlspecialchars($mhs['nim']); ?></code>
                            </td>
                            <td>
                                <?= htmlspecialchars($mhs['jurusan']); ?>
                            </td>
                            <td>
                                <div style="display: flex; flex-direction: column; gap: 2px; font-size: 0.85rem;">
                                    <?php if (!empty($mhs['email'])): ?>
                                        <a href="mailto:<?= htmlspecialchars($mhs['email']); ?>" style="color: var(--text-muted);">📧 <?= htmlspecialchars($mhs['email']); ?></a>
                                    <?php endif; ?>
                                    <?php if (!empty($mhs['no_hp'])): ?>
                                        <span style="color: var(--text-muted);">📞 <?= htmlspecialchars($mhs['no_hp']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <div class="action-group" style="justify-content: center;">
                                    <a href="editdata.php?id=<?= $mhs['id'] ?>" class="btn btn-secondary btn-sm">✏️ Edit</a>
                                    <a href="deletedata.php?id=<?= $mhs['id'] ?>" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa (<?= htmlspecialchars($mhs['nama']); ?>) ini?')" 
                                       class="btn btn-danger btn-sm">🗑️ Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require 'footer.php';
?>