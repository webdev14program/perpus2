<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Perpus Online</title>
    <link rel="icon" href="<?= base_url() ?>assets/icon/books.png">
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md">

                <div class="row" style="margin-top: 50px;">
                    <img src="<?= base_url() ?>assets/icon/books.png" style="width: 160px;height: 160px;margin-top: 20px; margin-left: 20px;">
                    <div class="col-md mt-4">
                        <table class="table border">
                            <tbody>
                                <tr>
                                    <td class="text-uppercase font-weight-bold">Jenis Transaksi</td>
                                    <td class="font-weight-bold text-uppercase">: Pengembalian Buku</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase font-weight-bold">JUmlah Peminjam Buku</td>
                                    <td class="font-weight-bold text-uppercase">: <?= $header['jumlah_pinjam'] ?> Orang</td>
                                </tr>

                                <tr>
                                    <td class="text-uppercase font-weight-bold">Bulan dan Tahun</td>
                                    <td class="font-weight-bold text-uppercase">: <?= $header['bulan'] ?> <?= $header['tahun'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><br>
                <hr style="border-top: 2px dashed black;">
            </div>
        </div>

        <div class="row">
            <div class="col-md mt-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $no = 1;
                            foreach ($kembali as $row) {
                            ?>
                                <td class="text-center text-uppercase font-weight-bold"><?php echo $no++; ?></td>
                                <td class="text-uppercase"><?= $row['nama_lengkap']; ?></td>
                                <td class="text-uppercase"><?= $row['judul']; ?></td>
                                <td class="text-uppercase"><?= $row['timestamp']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>