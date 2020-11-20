        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Datamaster / All Milk</h1>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- Page Heading -->
                    <h6 class="m-0 font-weight-bold text-primary">Table All Milk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Total Produksi Susu Pasteurisasi</th>
                                    <th>Bocor Atas</th>
                                    <th>Bocor Bawah</th>
                                    <th>Bocor Tutup</th>
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
                                        <td><?= $s['bocor_atas'] ?></td>
                                        <td><?= $s['bocor_bawah'] ?></td>
                                        <td><?= $s['bocor_tutup'] ?></td>
                                        <td><?= $s['total_reject_susu'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td><?= number_format($total_susu['total_produksi_susu'], 0, ',', '.') ?></td>
                                    <td><?= number_format($total_susu['bocor_atas'], 0, ',', '.') ?></td>
                                    <td><?= number_format($total_susu['bocor_bawah'], 0, ',', '.') ?></td>
                                    <td><?= number_format($total_susu['bocor_tutup'], 0, ',', '.') ?></td>
                                    <td colspan="2"><?= number_format($total_susu['total_reject_susu'], 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php $this->load->view('templates/footer'); ?>


        </body>

        </html>