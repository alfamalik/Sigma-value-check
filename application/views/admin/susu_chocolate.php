        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Datamaster / Chocolate Milk</h1>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Table Chocolate Milk</h6>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModaladdSusu"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                    </div>
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
                                    <th></th>
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
                                        <td width="100px">
                                            <a class="btn btn-outline-primary" data-id="<?= $s['id'] ?>" id="btn-edit" href="javascript:void(0)" onclick="editSusu(this)" data-toggle="modal" data-target="#ModaleditSusu"><span class="fa fa-edit"></span></a>
                                            <a class="btn btn-outline-danger" data-id="<?= $s['id'] ?>" id="btn-delete" href="javascript:void(0)" onclick="editSusu(this)" data-toggle="modal" data-target="#ModaldeleteSusu"><span class="fa fa-trash"></span></a>
                                        </td>
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

        <!-- Modal Tambah Susu-->
        <div class="modal fade" id="ModaladdSusu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Susu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form" role="form">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Bulan</label>
                                    <select class="form-control select2-input" style="width:100%;" name="bulan" id="bulan">
                                        <option value="">Pilih Bulan</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                        <select>
                                            <div id="bulan_error" class="text-danger"></div>
                                </div>
                                <div class="col-md-6">
                                    <label>Tahun</label>
                                    <select class="form-control select2-input" style="width:100%;" name="tahun" id="tahun">
                                        <option value="">Pilih Tahun</option>
                                        <?php for ($i = 1999; $i <= 2030; $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                        <select>
                                            <div id="bulan_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Total Produksi Susu</label>
                                    <input type="text" name="total_produksi_susu" id="total_produksi_susu" class="form-control">
                                    <div id="total_produksi_susu_error" class="text-danger"></div>
                                </div>
                                <div class="col-md-6">
                                    <label>Total Reject Susu</label>
                                    <input type="text" name="total_reject_susu" id="total_reject_susu" class="form-control" readonly>
                                    <div id="total_reject_susu_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Bocor Atas</label>
                                    <input type="text" name="bocor_atas" id="bocor_atas" class="form-control">
                                    <div id="bocor_atas_error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label>Bocor Bawah</label>
                                    <input type="text" name="bocor_bawah" id="bocor_bawah" class="form-control">
                                    <div id="bocor_bawah_error" class="text-danger"></div>
                                </div>
                                <div class="col-md-4">
                                    <label>Bocor Tutup</label>
                                    <input type="text" name="bocor_tutup" id="bocor_tutup" class="form-control">
                                    <div id="bocor_tutup_error" class="text-danger"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_save" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit Susu-->
        <div class="modal fade" id="ModaleditSusu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Susu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form" role="form">
                            <input type="hidden" name="idd" id="idd">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Total Produksi Susu</label>
                                    <input type="text" name="total_produksi_susu_edit" id="total_produksi_susu_edit" class="form-control">
                                    <div id="error"></div>
                                </div>
                                <div class="col-md-6">
                                    <label>Total Reject Susu</label>
                                    <input type="text" name="total_reject_susu_edit" id="total_reject_susu_edit" class="form-control" readonly>
                                    <div id="error"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Bocor Atas</label>
                                    <input type="text" name="bocor_atas_edit" id="bocor_atas_edit" class="form-control">
                                    <div id="error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label>Bocor Bawah</label>
                                    <input type="text" name="bocor_bawah_edit" id="bocor_bawah_edit" class="form-control">
                                    <div id="error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label>Bocor Tutup</label>
                                    <input type="text" name="bocor_tutup_edit" id="bocor_tutup_edit" class="form-control">
                                    <div id="error"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btn_update" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete Susu-->
        <div class="modal fade" id="ModaldeleteSusu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data Susu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form" role="form">
                            <input type="hidden" name="idd" id="idd">
                            <strong>Are you sure to delete this record?</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" id="btn_delete" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('templates/footer'); ?>

        <script>
            //Ajax Tambah Susu
            $('#btn_save').on('click', function() {
                var bulan = $('#bulan').val();
                var tahun = $('#tahun').val();
                var total_produksi_susu = $('#total_produksi_susu').val();
                var bocor_atas = $('#bocor_atas').val();
                var bocor_bawah = $('#bocor_bawah').val();
                var bocor_tutup = $('#bocor_tutup').val();
                var total_reject_susu = $('#total_reject_susu').val();
                $("#btn_save").attr("disabled", true).html('Loading ...');
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('datamaster/add_susu_chocolate') ?>",
                    dataType: "JSON",
                    data: {
                        bulan: bulan,
                        tahun: tahun,
                        total_produksi_susu: total_produksi_susu,
                        bocor_atas: bocor_atas,
                        bocor_bawah: bocor_bawah,
                        bocor_tutup: bocor_tutup,
                        total_reject_susu: total_reject_susu
                    },
                    success: function(data) {
                        $("#btn_save").attr("disabled", false).html('Submit');
                        $('[name="bulan"]').val("");
                        $('[name="tahun"]').val("");
                        $('[name="total_produksi_susu"]').val("");
                        $('[name="bocor_atas"]').val("");
                        $('[name="bocor_bawah"]').val("");
                        $('[name="bocor_tutup"]').val("");
                        $('[name="total_reject_susu"]').val("");
                        $('#ModaladdSusu').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil di simpan',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                });
                return false;
            });

            // ajax detail susu
            function editSusu(elem) {
                var dataId = $(elem).data("id");
                $("#idd").val(dataId);
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url() ?>datamaster/detail_susu_chocolate',
                    data: 'id=' + dataId,
                    dataType: 'json',
                    success: function(response) {
                        $.each(response, function(i, item) {
                            $("#idd").val(item.idd);
                            $("#bulan_edit").val(item.bulan);
                            $("#total_produksi_susu_edit").val(item.total_produksi_susu);
                            $("#total_reject_susu_edit").val(item.total_reject_susu);
                            $("#bocor_atas_edit").val(item.bocor_atas);
                            $("#bocor_bawah_edit").val(item.bocor_bawah);
                            $("#bocor_tutup_edit").val(item.bocor_tutup);
                        });
                    }
                });
            };
            //ajax update susu
            $('#btn_update').on('click', function() {
                var id = $('#idd').val();
                var total_produksi_susu = $('#total_produksi_susu_edit').val();
                var total_reject_susu = $('#total_reject_susu_edit').val();
                var bocor_atas = $('#bocor_atas_edit').val();
                var bocor_bawah = $('#bocor_bawah_edit').val();
                var bocor_tutup = $('#bocor_tutup_edit').val();
                $("#btn_update").attr("disabled", true).html('Loading ...');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('datamaster/edit_susu_chocolate') ?>",
                    dataType: "JSON",
                    data: {
                        id: id,
                        total_produksi_susu: total_produksi_susu,
                        bocor_atas: bocor_atas,
                        bocor_bawah: bocor_bawah,
                        bocor_tutup: bocor_tutup,
                        total_reject_susu: total_reject_susu
                    },
                    success: function(data) {
                        $("#btn_update").attr("disabled", false).html('Submit');
                        $('[name="total_produksi_susu_edit"]').val("");
                        $('[name="total_reject_susu_edit"]').val("");
                        $('[name="bocor_atas_edit"]').val("");
                        $('[name="bocor_bawah_edit"]').val("");
                        $('[name="bocor_tutup_edit"]').val("");
                        $('[name="idd"]').val("");
                        $('#ModaleditSusu').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil di update',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                });
                return false;
            });

            //Ajax Delete Susu
            $('#btn_delete').on('click', function() {
                var id = $('#idd').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('datamaster/delete_susu_chocolate') ?>",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#btn_delete").attr("disabled", false).html('Yes');
                        $('[name="idd"]').val("");
                        $('#ModaldeleteSusu').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil di delete',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                });
                return false;
            });
        </script>

        </body>

        </html>