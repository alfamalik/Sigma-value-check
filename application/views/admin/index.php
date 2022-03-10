<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php if (!$this->session->userdata('tahun')) : ?>
            <h1 class="h3 mb-0 text-gray-800">Menu Utama / 2018</h1>
        <?php else : ?>
            <h1 class="h3 mb-0 text-gray-800">Dashboard / <?= $this->session->userdata('tahun') ?></h1>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="input-group mb-3">
                <select class="custom-select" name="tahun">
                    <option value="">-- Pilih Tahun --</option>
                    <?php foreach ($tahuns as $t) : ?>
                        <?php if ($t['tahun'] == $this->session->userdata('tahun')) :  ?>
                            <option value="<?= $t['tahun'] ?>" selected><?= $t['tahun'] ?></option>
                        <?php else : ?>
                            <option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <div class="input-group-prepend">
                    <button class="btn btn-primary" type="submit" name="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Product -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Product</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_susu['total_produksi_susu'], 0, ',', '.') ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Reject -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Reject</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_susu['total_reject_susu'], 0, ',', '.') ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-window-close fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Percentage of Reject -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Percentage of Reject</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php foreach ($persenan_reject_produksi as $data) {
                                            $persenproduksi = round($data->persenan_produksi, 2);
                                            $persenreject = round($data->persenan_reject, 2);
                                        }
                                        echo $persenreject; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $persenreject ?>%" aria-valuenow="<?= $persenreject ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percent fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sigma Value -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sigma Value</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sigma ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Bar Chart -->
        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Comparison of Reject Plain, Chocolate, Nonfat</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myBarChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table of Total Production and Reject -->
        <div class="col-xl-8 col-lg-9">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Table of Total Production and Reject</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Total Produksi Susu Pasteurisasi</th>
                                    <th>Total Reject Susu Pasteurisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($susu as $s) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $s['bulan'] ?></td>
                                        <td><?= $s['tahun'] ?></td>
                                        <td><?= number_format($s['total_produksi_susu'], 0, ",", ".") ?></td>
                                        <td><?= $s['total_reject_susu'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td><?= number_format($total_susu['total_produksi_susu'], 0, ',', '.') ?></td>
                                    <td colspan="2"><?= number_format($total_susu['total_reject_susu'], 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="d-flex flex-column">
                <!-- Sigma Value of Plain -->
                <div class="card border-left-primary shadow h-100 py-2 mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sigma Value of Plain</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= number_format($sigma_plain, 4, ',', '.') ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sigma Value of Chocolate -->
                <div class="card border-left-success shadow h-100 py-2 mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sigma Value of Chocolate</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= number_format($sigma_chocolate, 4, ',', '.') ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sigma Value of Nonfat -->
                <div class="card border-left-info shadow h-100 py-2 mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sigma Value of Nonfat</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?= number_format($sigma_notfat, 4, ',', '.') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tetra Pack Information</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25vh; height: 30vh" src="assets/img/Tetrapack.png" alt="">
                    </div>
                    <p>TetraPack is a multinational food packaging and processing sub-company of Tetra Laval, with head offices in Lund, Sweden, and Pully, Switzerland. The company offers packaging, filling machi...</p>
                    <a rel="nofollow" href="javascript:void(0)" data-toggle="modal" data-target="#readmoreModal">Read more &rarr;</a>
                </div>
            </div>

        </div>
        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pasteurized Liquid Milk Plain</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25vh; height: 30vh" src="assets/img/Plain.png" alt="">
                    </div>
                    <p>Liquid milk products obtained from fresh milk or reconstituted milk or recombined milk are heated by the High Temperature Short Time (HTST) method or the Holding method, and packaged immediately in sterile aseptic packaging.</p>
                </div>
            </div>

        </div>
        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pasteurized Liquid Milk Chocolate</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25vh; height: 30vh" src="assets/img/Chocolate.png" alt="">
                    </div>
                    <p>Pasteurized liquid milk chocolate requires hydrocolloid which functions as a stabilizer because the density of cocoa powder is greater than the density of milk.</p>
                </div>
            </div>

        </div>
        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pasteurized Liquid Milk Non Fat</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25vh; height: 30vh" src="assets/img/Nonfat.png" alt="">
                    </div>
                    <p>Non-fat pasteurized milk is heating the milk at + 63 ° C in a closed container for 30 minutes. Non-fat pasteurized milk can last 12 hours outside the refrigerator and 2 days in the refrigerator after opening.</p>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->load->view('templates/footer'); ?>
<script src="<?= base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
<script src="<?= base_url('assets/js/demo/chart-bar-demo.js') ?>"></script>
<?php
foreach ($total_susu_perbulan_plain as $data) {
    $reject_plain[] = $data->total_reject_susu;
}
foreach ($total_susu_perbulan_chocolate as $data) {
    $reject_chocolate[] = $data->total_reject_susu;
}
foreach ($total_susu_perbulan_notfat as $data) {
    $reject_notfat[] = $data->total_reject_susu;
}
?>
<script>
    // Bar Chart Example
    var ctx = document.getElementById("myBarChart1");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Plain",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: <?= json_encode($reject_plain) ?>,
            }, {
                label: "Chocolate",
                backgroundColor: "#ff4d4d",
                hoverBackgroundColor: "#ff0000",
                borderColor: "#ff4d4d",
                data: <?= json_encode($reject_chocolate) ?>,
            }, {
                label: "Nonfat",
                backgroundColor: "#e8e831",
                hoverBackgroundColor: "#f2f235",
                borderColor: "#ff4d4d",
                data: <?= json_encode($reject_notfat) ?>,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 200,
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel, 0, ',', '.');
                    }
                }
            },
        }
    });
</script>

</body>

</html>