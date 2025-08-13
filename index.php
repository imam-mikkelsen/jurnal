<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: bisque;
    }

    .main {
        width: 250px;
        background-color: aliceblue;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
        margin: auto;
        border: 1px solid black;
    }

    h1 {
        text-align: center;
    }

    .jurnal {
        width: 250px;
        background-color: aliceblue;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
        margin: auto;
        border: 1px solid black;
    }

    table {
        margin: auto;
        border-collapse: collapse;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    th,
    td {
        border: 1px solid black;
        padding: 15px;
        background-color: aliceblue;
    }
</style>

<body>
    <h1>Belajar PHP</h1>
    <!-- <div class="main">
        <form action="index.php" method="post">
            <input id="nama" name="nama" type="text" placeholder="Nama"> <br>
            <input id="matkul" name="matkul" type="text" placeholder="Mata Kuliah">
            <button name="submit" type="submit" value="submit">Kirim</button>
        </form>
    </div>
    <br>
    <div class="main">
        <form action="index.php" method="post">
            <input id="nilai" name="nilai" type="text" placeholder="Nilai"> <br>
            <button name="submit" type="submit" value="submit">Kirim</button>
        </form>
    </div>
    <br>
    <div class="main">
        <form action="index.php" method="post">

            <input id="username" name="username" type="text" placeholder="Username"> <br>
            <input id="password" name="password" type="password" placeholder="Password">
            <button name="submit" type="submit" value="submit">Kirim</button>
        </form>
    </div> -->
    <!-- <table border="1" >
        <tr>
            <td>Akun</td>
            <td>Debit</td>
            <td>Kredit</td>
        </tr>
        <tr>
            <td>P</td>
            <td>P</td>
            <td>P</td>
        </tr>
        <tr>
            <td>P</td>
            <td>P</td>
            <td>P</td>
        </tr>
        <tr>
            <td>P</td>
            <td>P</td>
            <td>P</td>
        </tr>
    </table> -->
    <br>
    <div class="main">
        <form action="index.php" method="post">

            <input name="pembelian" type="number" placeholder="Pembelian" required> <br>

            <p>Pembelian :</p>
            <select name="type" id="">
                <option value="persediaan">Persediaan</option>
                <option value="kendaraan">Kendaraan</option>
                <option value="perlengkapan">Perlengkapan</option>
            </select>
            <select name="jurnal" id="">
                <option value="debit">Tunai</option>
                <option value="kredit">Kredit</option>
            </select> <br>
            <button name="submit" type="submit" value="submit">Kirim</button>
        </form>
    </div> <br>


    <?php

    $pembelian = $_POST['pembelian'] ?? 0;
    $ppn = $pembelian * 0.11 ?? " ";
    $total = $pembelian + $ppn ?? " ";
    $jurnal = $_POST['jurnal'] ?? " ";
    $type = $_POST['type'] ?? " ";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($jurnal == 'debit' && $type == 'persediaan') {
            echo "  <table>
        <tr>
            <td>Akun</td>
            <td>Debit</td>
            <td>Kredit</td>
        </tr>
        <tr>
            <td> Persediaan</td>
            <td>$pembelian</td>
            <td></td>
        </tr>
        <tr>
            <td>PPN Masukan</td>
            <td>$ppn</td>
            <td></td>
        </tr>
        <tr>
            <td>Kas</td>
            <td></td>
            <td>$total</td>
        </tr>
    </table>";
        } elseif ($jurnal == 'debit' && $type == 'kendaraan') {
            echo "  <table>
        <tr>
            <td>Akun</td>
            <td>Debit</td>
            <td>Kredit</td>
        </tr>
        <tr>
            <td> Kendaraan </td>
            <td>$pembelian</td>
            <td></td>
        </tr>
        <tr>
            <td>PPN Masukan</td>
            <td>$ppn</td>
            <td></td>
        </tr>
        <tr>
            <td>Kas</td>
            <td></td>
            <td>$total</td>
        </tr>
    </table>";
        } elseif ($jurnal == 'kredit' && $type == 'persediaan') {
            echo "  <table>
        <tr>
            <td>Akun</td>
            <td>Debit</td>
            <td>Kredit</td>
        </tr>
        <tr>
            <td> Persediaan</td>
            <td>$pembelian</td>
            <td></td>
        </tr>
        <tr>
            <td>PPN Masukan</td>
            <td>$ppn</td>
            <td></td>
        </tr>
        <tr>
            <td>Utang</td>
            <td></td>
            <td>$total</td>
        </tr>
    </table>";
        } elseif ($jurnal == 'debit' && $type == 'perlengkapan') {
            echo "  <table>
        <tr>
            <td>Akun</td>
            <td>Debit</td>
            <td>Kredit</td>
        </tr>
        <tr>
            <td> Perlengkapan </td>
            <td>$pembelian</td>
            <td></td>
        </tr>
        <tr>
            <td>PPN Masukan</td>
            <td>$ppn</td>
            <td></td>
        </tr>
        <tr>
            <td>Kas</td>
            <td></td>
            <td>$total</td>
        </tr>
    </table>";
        } elseif ($jurnal == 'kredit' && $type == 'perlengkapan') {
            echo " <table>
        <tr>
            <td>Akun</td>
            <td>Debit</td>
            <td>Kredit</td>
        </tr>
        <tr>
            <td>Perlengkapan</td>
            <td>$pembelian</td>
            <td></td>
        </tr>
        <tr>
            <td>PPN Masukan</td>
            <td>$ppn</td>
            <td></td>
        </tr>
        <tr>
            <td>Utang</td>
            <td></td>
            <td>$total</td>
        </tr>
    </table>";
        } else {
            echo " <table>
        <tr>
            <td>Akun</td>
            <td>Debit</td>
            <td>Kredit</td>
        </tr>
        <tr>
            <td>Kendaraan </td>
            <td>$pembelian</td>
            <td></td>
        </tr>
        <tr>
            <td>PPN Masukan</td>
            <td>$ppn</td>
            <td></td>
        </tr>
        <tr>
            <td>Utang</td>
            <td></td>
            <td>$total</td>
        </tr>
    </table>";
        }
    }




    // $username = $_POST['username'];
    // $password = $_POST['password'];

    // if (($_POST['username'] == "imam123") && ($_POST['password'] == 123)) {
    //     echo "Username & Password Benar";
    // } else {
    //     echo "Username & Password Salah";
    // }

    // if ($username = "imam123" && $password = 123) {
    //     echo "Username & Password Benar";
    // } else {
    //     echo "Username & Password Salah";
    // }

    // $nilai = $_POST['nilai'];

    // if ($nilai >= 85) {
    //     echo 'Nilai Kamu A';
    // } elseif ($nilai >= 80) {
    //     echo 'Nilai Kamu A-';
    // } elseif ($nilai >= 75) {
    //     echo 'Nilai Kamu B+';
    // } elseif ($nilai >= 70) {
    //     echo 'Nilai Kamu B';
    // }

    // switch ($nilai) {
    //     case $nilai >= 85;
    //         echo 'Nilai Kamu A';
    //         break;
    //     case $nilai >= 80;
    //         echo 'Nilai Kamu A-';
    //         break;
    //     case $nilai >= 75;
    //         echo 'Nilai Kamu B+';
    //         break;
    //     case $nilai >= 70;
    //         echo 'Nilai Kamu B';
    //         break;
    //     case $nilai >= 65;
    //         echo 'Nilai Kamu C+';
    //         break;
    //     case $nilai >= 60;
    //         echo 'Nilai Kamu C';
    //         break;
    //     case $nilai >= 55;
    //         echo 'Nilai Kamu D';
    //         break;
    //     default;
    //         echo 'Nilai Kamu E';
    // }



    //  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //     echo $_POST['nilai'];

    // }

    // if (isset($_POST['submit'])) {
    //     echo $_POST['nama'];
    // }

    // if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //     echo $_POST['nama'];
    // }



    // $matkul = ['Akuntansi Manajemen', 'Auditing', 'Perpajakan'];

    //   foreach($matkul as $m) {
    //     echo $m. '<br>' ;
    //   }

    //   for($m = 0; $m <= 15; $m++ ) {
    //     echo $m . '<br>' ;
    //   }

    ?>
</body>

</html>