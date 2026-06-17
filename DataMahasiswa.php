<?php

echo "Hello, World!<br>";

$nama = "Adhwa Ainun Nissa";

echo "Nama saya adalah " . $nama . "<br>";

// Di sini $a sudah diganti menjadi $i agar tidak error lagi
for($i = 0; $i < 6; $i++)
{
    if($i % 2 == 0){
        // Bagian ini mendeteksi angka genap (0, 2, 4)
    }
}

$koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");
// if($koneksi){


$query = "SELECT * FROM mahasiswa";

$result = mysqli_query($koneksi, $query);


/// ambil data (fetch) mahasiswa dari lemari result
/// mysqli_fetch_row
/// mysqli_fetch_assoc
/// mysqli_fetch_object
/// mysqli_fetch_array




    
?>
<tr>
    <td align="center"><?= $no++; ?></td>
    <td><?= $mhs['nama']; ?></td>
    <td align="center"><?= $mhs['nim']; ?></td>
    <td align="center"><?= $mhs['jurusan']; ?></td>
    <td align="center"><?= $mhs['email']; ?></td>
    <td align="center"><?= $mhs['telepon']; ?></td>
    <td align="center"><img src="assets/images/<?= $mhs['foto']; ?>" width="70px" /></td>
    <td>
        <a href="editdata.php?id=<?= $mhs['id']; ?>"><button>EDIT</button></a> | 
        <a href="deletedata.php?id=<?= $mhs['id']; ?>"><button>DELETE</button></a>
    </td>
</tr>
<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

     <link rel="stylesheet" href="assets/style.css">
</head>
<body>
     <H1> Portofolio Adhwa</H1>
    <hr/>

    <!-- Navbar -->
    <table border="1" cellspacing="" cellpading=""> 
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="Profil.php">Profile</a></td>
            <td><a href="Kontak.php">Kontak</a></td>
            <td><a href="DataMahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>

    <h2>Data Mahasiswa</h2>
    <a href="Inputdata.php">
        <button>Tambah Data Mahasiswa</button>
    </a> 
   
        <table class="tabel-mahasiswa" border="1" cellpadding="5px">
            <tr>
                <th rowspan="2" align="center">No</th>
                <th rowspan="2" align="center">Nama</th>
                <th rowspan="2" align="center">NIM</th>
                <th rowspan="2" align="center">Foto</th>
                <th colspan="3" align="center">Nilai</th>
               
                <!-- <td>Baris 1, kolom 2</td> -->
            </tr>
            <tr>
                <td align="center">UTS</td>
                <td align="center">UAS</td>
                <td align="center">TUGAS</td>
            </tr>
            <tr>
                <td align="center">1</td>
                <td>Adhwa Ainun Nissa</td>
                <td>13182420038</td>
                <td><img src="assets/images/FotoAdhwa.jpeg" alt="Foto Adhwa" width="90" height="150"></td>
                <td>85</td>
                <td>88</td>
                <td>100</td>
            </tr>
            <tr>
                <td align="center">1</td>
                <td>Min Yoongi</td>
                <td>1000000038</td>
                <td><img src="assets/images/Yoongi.png" alt="Foto Yoongi" width="90" height="130"></td>
                <td>85</td>
                <td>88</td>
                <td>100</td>
            </tr>
        <tr>
        </table>
               </TABLE>

        <!-- latihan -->
        <hr>
        <h3>Latihan</h3>
        <table border="1" cellpading="0" cellpadding="10px">
            <tr>
                <td>1,1</td>
                <td>1,2</td>
                <td>1,3</td>
                <td>1,4</td>
            </tr>
            <tr>
                <td>2,1</td>
                <td colspan="2" rowspan="2" align="center">?</td>
                <td>2,4</td>
            <tr>
                <td>3,1</td>
                <td>3,4</td>
            </tr>    
                <tr>
                <td>4,1</td>
                <td>4,2</td>
                <td>4,3</td>
                <td>4,4</td>
            </tr>
        </table>

</body>
</html>

@media (max-width: 768px) {
  body {
    background: pink;
  }
}