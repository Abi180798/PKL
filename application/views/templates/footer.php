 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; PKL Prodi Informatika Universitas Mataram <?= date('Y') ?></span>
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

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Yakin keluar?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Pilih "Logout" untuk keluar.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

 <!-- <script src="<?= base_url('assets/'); ?>js/jquery-3.3.1.slim.min.js"></script> -->

 <script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>

 <!-- <script src="<?= base_url('assets/'); ?>datatables/datatables.min.js"></script> -->

 <script src="<?= base_url('assets/'); ?>datatables/jquery-3.3.1.js"></script>

 <script src="<?= base_url('assets/'); ?>datatables/jquery.dataTables.min.js"></script>

 <script src="<?= base_url('assets/'); ?>datatables/dataTables.bootstrap4.min.js"></script>
 <!-- <script src="<?= base_url('assets/'); ?>datatables/dataTables.bootstrap.min.js"></script> -->
 <script>
     var baseurl = "<?php echo base_url("index.php/"); ?>";
     $('.custom-file-input').on('change', function() {
         let fileName = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(fileName);
     });
 </script>

 <!-- <script src="<?= base_url('assets/'); ?>datatables/pdfmake.min.js"></script> -->


 <script src="<?= base_url('assets/'); ?>datatables/dataTables.select.min.js"></script>

 <!-- <script src="<?= base_url('assets/'); ?>datatables/dataTables.editor.min.js"></script> -->

 <!-- <script src="<?= base_url('assets/'); ?>datatables/buttons.print.min.js"></script> -->

 <!-- <script src="<?= base_url('assets/'); ?>datatables/buttons.html5.min.js"></script> -->
 <script src="<?= base_url('assets/'); ?>js/jquery.autocomplete.js"></script>
 <script src="<?= base_url('assets/'); ?>js/jquery-ui.js"></script>
 <script src="<?= base_url('assets/'); ?>js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/bootstrap3-typeahead.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/buttons.flash.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/jszip.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/pdfmake.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/vfs_fonts.js"></script>
 <script src="<?= base_url('assets/'); ?>js/buttons.html5.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/buttons.print.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/buttons.colVis.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/script.js"></script>
 <!-- <script src="<?= base_url('assets/'); ?>js/handlebars.js"></script> -->
 <!-- <script src="<?= base_url('assets/'); ?>js/typeahead.bundle.js"></script> -->
 <!-- <script src="<?= base_url('assets/'); ?>js/gijgo.min.js"></script> -->
 </body>

 </html>