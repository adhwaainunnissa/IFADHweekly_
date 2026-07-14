<?php
// setup_db.php - Script Otomatis Pembuat Database & Konfigurator untuk MAMP/XAMPP
header('Content-Type: text/plain; charset=utf-8');

echo "=== MEMULAI DETEKSI DAN PEMBUATAN DATABASE ===\n\n";

// Daftar kombinasi konfigurasi database lokal yang umum
$configs = [
    [
        'host' => '127.0.0.1',
        'port' => 8889, // Default MAMP
        'user' => 'root',
        'pass' => 'root',
        'desc' => 'MAMP MySQL (Port 8889, Pass: root)'
    ],
    [
        'host' => '127.0.0.1',
        'port' => 3306, // Default XAMPP/MySQL
        'user' => 'root',
        'pass' => '',
        'desc' => 'XAMPP/MySQL Standard (Port 3306, Pass: kosong)'
    ],
    [
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'root',
        'pass' => 'root',
        'desc' => 'MySQL Standard dengan Pass: root'
    ],
    [
        'host' => 'localhost',
        'port' => null,
        'user' => 'root',
        'pass' => 'root',
        'desc' => 'Localhost Socket (Pass: root)'
    ],
    [
        'host' => 'localhost',
        'port' => null,
        'user' => 'root',
        'pass' => '',
        'desc' => 'Localhost Socket (Pass: kosong)'
    ]
];

$working_conn = null;
$working_config = null;

// Coba koneksi ke MySQL server
foreach ($configs as $cfg) {
    echo "Mencoba koneksi ke {$cfg['desc']}... ";
    
    // Matikan warning koneksi sementara agar tidak merusak tampilan log
    mysqli_report(MYSQLI_REPORT_OFF);
    
    $host_string = $cfg['host'];
    if ($cfg['port'] !== null) {
        $host_string .= ':' . $cfg['port'];
    }
    
    $conn = @mysqli_connect($host_string, $cfg['user'], $cfg['pass']);
    
    if ($conn) {
        echo "✅ BERHASIL!\n";
        $working_conn = $conn;
        $working_config = $cfg;
        break;
    } else {
        echo "❌ Gagal: " . mysqli_connect_error() . "\n";
    }
}

if (!$working_conn) {
    die("\n[ERROR] Tidak dapat terhubung ke MySQL lokal Anda. Pastikan MAMP atau XAMPP Anda sudah dijalankan dan MySQL Server menyala.\n");
}

echo "\nKoneksi aktif menggunakan konfigurasi: {$working_config['desc']}\n";

$db_name = "ifbfaweekly";

// 1. Buat Database jika belum ada
$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if (mysqli_query($working_conn, $sql_create_db)) {
    echo "Database `$db_name` berhasil dibuat atau sudah ada.\n";
} else {
    die("[ERROR] Gagal membuat database: " . mysqli_error($working_conn) . "\n");
}

// Pilih database
mysqli_select_db($working_conn, $db_name);

// 2. Buat Tabel mahasiswa
$sql_create_table = "CREATE TABLE IF NOT EXISTS `mahasiswa` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nama` VARCHAR(100) NOT NULL,
    `nim` VARCHAR(30) NOT NULL UNIQUE,
    `jurusan` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100),
    `no_hp` VARCHAR(20),
    `foto` VARCHAR(100) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

if (mysqli_query($working_conn, $sql_create_table)) {
    echo "Tabel `mahasiswa` berhasil dibuat atau sudah ada.\n";
} else {
    die("[ERROR] Gagal membuat tabel: " . mysqli_error($working_conn) . "\n");
}

// 3. Masukkan Data Dummy Mahasiswa
// Kita cek apakah tabel masih kosong
$result_check = mysqli_query($working_conn, "SELECT COUNT(*) as total FROM mahasiswa");
$row_check = mysqli_fetch_assoc($result_check);

if ($row_check['total'] == 0) {
    echo "Tabel kosong, menginput data dummy...\n";
    
    $dummy_students = [
        [
            'nama' => 'Adhwa Faiz Ramadhan',
            'nim' => '2201010045',
            'jurusan' => 'Teknik Informatika',
            'email' => 'adhwafaiz@student.if.ac.id',
            'no_hp' => '081234567890',
            'foto' => 'FotoAdhwa.jpeg' // File asli di assets/images
        ],
        [
            'nama' => 'Prof. Yoongi Adhwa, Ph.D.',
            'nim' => '19930309202301',
            'jurusan' => 'Teknik Informatika',
            'email' => 'yoongi@if.ac.id',
            'no_hp' => '08129930309',
            'foto' => 'Yoongi.png' // File asli di assets/images
        ]
    ];
    
    foreach ($dummy_students as $std) {
        $nama = mysqli_real_escape_string($working_conn, $std['nama']);
        $nim = mysqli_real_escape_string($working_conn, $std['nim']);
        $jurusan = mysqli_real_escape_string($working_conn, $std['jurusan']);
        $email = mysqli_real_escape_string($working_conn, $std['email']);
        $no_hp = mysqli_real_escape_string($working_conn, $std['no_hp']);
        $foto = mysqli_real_escape_string($working_conn, $std['foto']);
        
        $sql_insert = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) 
                       VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";
        
        if (mysqli_query($working_conn, $sql_insert)) {
            echo "   - Menambahkan data dummy: {$std['nama']}\n";
        } else {
            echo "   - Gagal menambahkan {$std['nama']}: " . mysqli_error($working_conn) . "\n";
        }
    }
} else {
    echo "Tabel sudah berisi data, melewati pengisian data dummy.\n";
}

// 4. Update file connections.php dengan parameter yang berhasil terdeteksi
echo "\nMemperbarui file `connections.php`... ";

$host_escaped = $working_config['host'];
if ($working_config['port'] !== null) {
    $host_escaped .= ':' . $working_config['port'];
}

// Generate kode connections.php baru
$connections_code = "<?php
// ==========================================
// KONEKSI DATABASE MYSQL (Diperbarui Otomatis)
// ==========================================
\$host = \"{$host_escaped}\";
\$username = \"{$working_config['user']}\";
\$password = \"{$working_config['pass']}\";
\$database = \"$db_name\";

// Hubungkan ke MySQL
\$conn = mysqli_connect(\$host, \$username, \$password, \$database);

// Cek Koneksi
if (!\$conn) {
    error_log(\"Koneksi database gagal: \" . mysqli_connect_error());
}

/**
 * Mengambil data dari database (Read)
 */
function tampildata(\$query) {
    global \$conn;
    \$rows = [];
    if (!\$conn) return \$rows;

    \$result = mysqli_query(\$conn, \$query);
    if (\$result) {
        while (\$row = mysqli_fetch_assoc(\$result)) {
            \$rows[] = \$row;
        }
    }
    return \$rows;
}

/**
 * Menambahkan data mahasiswa baru (Create)
 */
function inputdata(\$data, \$file) {
    global \$conn;
    if (!\$conn) return 0;

    \$nama = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['nama']));
    \$nim = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['nim']));
    \$jurusan = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['jurusan']));
    \$email = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['email']));
    \$no_hp = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['no_hp']));

    \$foto = upload_foto(\$file);
    if (!\$foto) return 0;

    \$query = \"INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) 
              VALUES ('\$nama', '\$nim', '\$jurusan', '\$email', '\$no_hp', '\$foto')\";
              
    mysqli_query(\$conn, \$query);
    return mysqli_affected_rows(\$conn);
}

/**
 * Mengubah data mahasiswa (Update)
 */
function editdata(\$data, \$id, \$file) {
    global \$conn;
    if (!\$conn) return 0;

    \$nama = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['nama']));
    \$nim = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['nim']));
    \$jurusan = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['jurusan']));
    \$email = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['email']));
    \$no_hp = mysqli_real_escape_string(\$conn, htmlspecialchars(\$data['no_hp']));
    
    \$mhs = tampildata(\"SELECT foto FROM mahasiswa WHERE id = \$id\");
    \$foto_lama = !empty(\$mhs) ? \$mhs[0]['foto'] : 'default.png';

    if (\$file['error'] === 4) {
        \$foto = \$foto_lama;
    } else {
        \$foto = upload_foto(\$file);
        if (\$foto && \$foto_lama !== 'default.png' && file_exists('assets/images/' . \$foto_lama)) {
            unlink('assets/images/' . \$foto_lama);
        }
    }

    \$query = \"UPDATE mahasiswa SET 
                nama = '\$nama', 
                nim = '\$nim', 
                jurusan = '\$jurusan', 
                email = '\$email', 
                no_hp = '\$no_hp', 
                foto = '\$foto' 
              WHERE id = \$id\";

    mysqli_query(\$conn, \$query);
    return mysqli_affected_rows(\$conn);
}

/**
 * Menghapus data mahasiswa (Delete)
 */
function deletedata(\$id) {
    global \$conn;
    if (!\$conn) return 0;

    \$mhs = tampildata(\"SELECT foto FROM mahasiswa WHERE id = \$id\");
    if (!empty(\$mhs)) {
        \$foto = \$mhs[0]['foto'];
        if (\$foto !== 'default.png' && file_exists('assets/images/' . \$foto)) {
            unlink('assets/images/' . \$foto);
        }
    }

    \$query = \"DELETE FROM mahasiswa WHERE id = \$id\";
    mysqli_query(\$conn, \$query);
    return mysqli_affected_rows(\$conn);
}

/**
 * Helper untuk mengunggah gambar
 */
function upload_foto(\$file) {
    \$nama_file = \$file['name'];
    \$ukuran_file = \$file['size'];
    \$error = \$file['error'];
    \$tmp_name = \$file['tmp_name'];

    if (\$error === 4) {
        return 'default.png';
    }

    \$ekstensi_gambar_valid = ['jpg', 'jpeg', 'png', 'webp'];
    \$ekstensi_gambar = explode('.', \$nama_file);
    \$ekstensi_gambar = strtolower(end(\$ekstensi_gambar));

    if (!in_array(\$ekstensi_gambar, \$ekstensi_gambar_valid)) {
        echo \"<script>alert('Ekstensi file foto tidak diizinkan!');</script>\";
        return false;
    }

    if (\$ukuran_file > 2097152) {
        echo \"<script>alert('Ukuran foto terlalu besar! Maksimal 2MB');</script>\";
        return false;
    }

    \$nama_file_baru = uniqid() . '.' . \$ekstensi_gambar;

    if (!is_dir('assets/images')) {
        mkdir('assets/images', 0777, true);
    }

    move_uploaded_file(\$tmp_name, 'assets/images/' . \$nama_file_baru);
    return \$nama_file_baru;
}
?>
";

if (file_put_contents('connections.php', $connections_code) !== false) {
    echo "✅ BERHASIL DIUPDATE!\n";
} else {
    echo "❌ GAGAL MENULIS FILE!\n";
}

mysqli_close($working_conn);
echo "\n=== SELESAI ===\n";
?>
