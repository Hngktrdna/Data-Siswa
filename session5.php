<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1 style="text-align: center;">MASUKAN DATA SISWA</h1>

<form method="POST" action="" >

    <table border='1' style='margin: 0 auto; text-align: center; margin-bottom: 50px;'>
        <tr>
            <td><label for="nama">NAMA:</label></td>
            <td><input type="text" name="nama" id="nama"/></td>
        </tr>
        <tr>
            <td><label for="nis">NIS:</label></td>
            <td><input type="text" name="nis" id="nis"/></td>
        </tr>
        <tr>
            <td><label for="rayon">RAYON:</label></td>
            <td><input type="text" name="rayon" id="rayon"/></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="kirim">Kirim</button></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="reset">Reset</button></td>
        </tr>

    </table>
</form>


<?php
    // Memulai php
    session_start();

    // Reset
    if (isset($_POST['reset'])) {
        session_unset();

        // Redirect ke halaman utama
        header("Location: session5.php");
    }
    // Jika array multimedia belum ada, maka buat dulu
    // Isset ada atau tidaknya array 
    // Untuk membuat sesi data array multidimensi
    if(!isset($_SESSION['dataSiswa'])){
        $_SESSION['dataSiswa']=array();
    }

    // Proses button hapus pada tabel tampil data
    if (isset($_GET['hapus'])) {
        $index = $_GET['hapus'];
        unset($_SESSION['dataSiswa'][$index]);
    }

    // Jika array ada maka buat data yang di masukan 
    if(isset($_POST['kirim'])) {
        if(@$_POST['nama'] && @$_POST['nis'] && @$_POST['rayon']) {
            if(isset($_SESSION['dataSiswa'])) {
            $data = [
                'nama' => $_POST['nama'],
                'nis' => $_POST['nis'],
                'rayon' => $_POST['rayon'],
            ];
            array_push($_SESSION['dataSiswa'],$data);
            }
        }

    }
    //var_dump($_SESSION);
    if (!empty($_SESSION['dataSiswa'])) {
        echo '<table border="1" style="margin: 0 auto; text-align: center;">';
        echo '<tr>';
        echo '<th>NAMA</th>';
        echo '<th>NIS</th>';
        echo '<th>RAYON</th>';
        echo '<th>ACTION</th>';
        echo '</tr>';
    
        // Loop through each dataSiswa
        foreach ($_SESSION['dataSiswa'] as $index => $value) {
            echo '<tr>';
            echo '<td>' . $value['nama'] . '</td>';
            echo '<td>' . $value['nis'] . '</td>';
            echo '<td>' . $value['rayon'] . '</td>';
            echo '<td><a href="?hapus=' . $index . '">HAPUS</a></td>';
            echo '</tr>';
        }
    
        echo '</table>';
    } else {
        echo 'Data Masih Kosong!';
    }
    


?>
</body>
</html>