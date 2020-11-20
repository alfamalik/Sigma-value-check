<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sigma Value Check 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Readmore Modal -->
<div class="modal fade" id="readmoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Tetrapack Information</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25vh; height: 30vh" src="assets/img/Tetrapack.png" alt="">
                </div>
                <p>Tetrapack is a multinational food packaging and processing sub-company of Tetra Laval, with head offices in Lund, Sweden, and Pully, Switzerland. The company offers packaging, filling machines and processing for dairy, beverages, cheese, ice cream and prepared food, including distribution tools like accumulators, cap applicators, conveyors, crate packers, film wrappers, line controllers and straw applicators. Tetra Pak was founded by Ruben Rausing and built on Erik Wallenberg's innovation, a tetrahedron-shaped plastic-coated paper carton, from which the company name was derived.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <form action="<?= base_url('auth/logout') ?>" method="POST">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.responsive.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/responsive.bootstrap4.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?= base_url('assets/vendor/select2/dist/js/select2.js') ?>"></script>
<script src="<?= base_url('assets/vendor/sweetalert2-master/sweetalert2.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true
    });

    $('.select2-input').select2();

    $("#bocor_atas,#bocor_bawah,#bocor_tutup").keyup(function() {
        var bocor_atas = $('#bocor_atas').val();
        var bocor_bawah = $('#bocor_bawah').val();
        var bocor_tutup = $('#bocor_tutup').val();
        var total_reject = parseInt(bocor_atas) + parseInt(bocor_bawah) + parseInt(bocor_tutup);
        if (bocor_atas === "" || bocor_bawah === "" || bocor_tutup === "") {
            $('#total_reject_susu').html('');
        } else {
            $('#total_reject_susu').val(parseInt(total_reject));
        }
    });

    $("#bocor_atas_edit,#bocor_bawah_edit,#bocor_tutup_edit").keyup(function() {
        var bocor_atas = $('#bocor_atas_edit').val();
        var bocor_bawah = $('#bocor_bawah_edit').val();
        var bocor_tutup = $('#bocor_tutup_edit').val();
        var total_reject = parseInt(bocor_atas) + parseInt(bocor_bawah) + parseInt(bocor_tutup);
        if (bocor_atas === "" || bocor_bawah === "" || bocor_tutup === "") {
            $('#total_reject_susu_edit').html('');
        } else {
            $('#total_reject_susu_edit').val(parseInt(total_reject));
        }
    });
</script>