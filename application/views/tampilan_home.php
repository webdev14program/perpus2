<div class="row">
    <div class="col-md mb-2">
        <div class="card">
            <div class="card-body bg-primary">
                <h5 class="text-uppercase font-weight-bold text-white">Perputakaan Online (RC 2.0)</h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Anggota</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $anggota['jumlah_anggota'] ?> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <h5 class="text-center"><a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/anggota"> Detail</a></h5>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $buku['jumlah_buku'] ?> Buah</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-openfa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <h5 class="text-center"><a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/buku"> Detail</a></h5>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengadaan
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pengadaan['jumlah_pengadaan'] ?> Buku</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <h5 class="text-center"><a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="#"> Detail</a></h5>
            </div>
        </div>
    </div> -->

    <!-- Pending Requests Card Example -->
    <div class="col-md mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Peminjaman Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pinjam['jumlah_pinjam'] ?> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <h5 class="text-center"><a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/pemimjam"> Detail</a></h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Penerbit</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $penerbit['jumlah_penerbit'] ?> Lembaga</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <h5 class="text-center"><a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/penerbit"> Detail</a></h5>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kategori</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kategori['jumlah_kategori'] ?> Kategori</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-th-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <h5 class="text-center"><a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/kategori_buku"> Detail</a></h5>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Rak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rak['jumlah_rak'] ?> Rak</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <h5 class="text-center"><a class="btn btn-success btn-sm text-uppercase font-weight-bold" href="<?= base_url() ?>Dashboard/rak"> Detail</a></h5>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">

   
    <div class="col-md">
        <div class="card shadow mb-4">
          
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div> -->