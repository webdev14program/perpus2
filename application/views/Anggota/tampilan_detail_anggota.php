<a class="btn btn-success btn-sm mb-2" href="<?= base_url() ?>Dashboard/anggota">Kembali</a>
<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card ">
            <div class="card-header bg-primary">
                <h5 class="text-center text-uppercase font-weight-bold text-white">foto</h5>
            </div>
            <div class="card-body">
                <h5 class="text-center"><img src="<?= base_url() ?>assets/icon/<?= $anggota['foto'] ?>" alt=""></h5>
            </div>
            <div class="card-footer text-muted">
                <h5 class="h4 text-gray-800 text-center">Waktu Daftar <br>
                    <?= $anggota['timestamp'] ?>
                </h5>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-2">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="text-center text-uppercase font-weight-bold text-white">Biodata</h5>
            </div>
            <div class="card-body">
                <div class="form-group"><label>ID Anggota</label>
                    <h4 class="h4 text-gray-800"><b><?= $anggota['id_anggota'] ?></b></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nama Lengkap -->
                <div class="form-group"><label>Nama Lengkap</label>
                    <h4 class="h4 text-gray-800"><?= $anggota['nama_lengkap'] ?></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- NoTelepon -->
                <div class="form-group"><label>Nomor Telepon</label>
                    <h4 class="h4 text-gray-800"><?= $anggota['notelp'] ?></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Jenis Kelamin -->
                <div class="form-group"><label>Jenis Kelamin</label>
                    <h4 class="h4 text-gray-800"><?= $anggota['jk'] ?></h4>
                </div>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group"><label>Tempat lahir</label>
                            <h4 class="h4 text-gray-800"><?= $anggota['tempat'] ?></h4>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group"><label>Tanggal Lahir</label>
                            <h4 class="h4 text-gray-800"><?= $anggota['tgllahir'] ?></h4>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group"><label>Umur</label>
                            <h4 class="h4 text-gray-800"><?= $anggota['umur'] ?> Tahun</h4>
                        </div>
                    </div>
                </div>

                <hr class="sidebar-divider">

                <!-- Alamat -->
                <div class="form-group"><label>Alamat</label>
                    <h4 class="h4 text-gray-800"><?= $anggota['alamat'] ?></h4>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider">
            </div>
        </div>
    </div>
</div>