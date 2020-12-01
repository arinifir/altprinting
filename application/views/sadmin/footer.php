        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url('assets/admin/') ?>plugins/common/common.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/settings.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/gleek.js"></script>
    <script src="<?= base_url('assets/admin/') ?>js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="<?= base_url('assets/admin/') ?>plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="<?= base_url('assets/admin/') ?>plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="<?= base_url('assets/admin/') ?>plugins/d3v3/index.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/topojson/topojson.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="<?= base_url('assets/admin/') ?>plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url('assets/admin/') ?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url('assets/admin/') ?>plugins/chartist/js/chartist.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <!-- Datatables -->
    <script src="<?= base_url('assets/admin/') ?>plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <!-- Editor -->
    <script src="<?= base_url('assets/admin/') ?>plugins/summernote/dist/summernote.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>plugins/summernote/dist/summernote-init.js"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?= base_url('assets/myjs/') ?>my.js"></script>

    <?php
if ($this->session->flashdata('gagal')) :
?>
	<script>
		$(document).ready(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'warning',
				title: '<?= $this->session->flashdata('gagal'); ?>'
			})
		})
	</script>
<?php endif ?>

<?php
if ($this->session->flashdata('berhasil')) :
?>
	<script>
		$(document).ready(function() {
			const Toast = Swal.mixin({
				toast: true,
                position: 'top-end',
                // background: '#CC080A',
                // text: 'white',
				showConfirmButton: false,
				timer: 3000,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?=$this->session->flashdata('berhasil');?>'
			})
		})
	</script>
<?php endif ?>
<?php
if ($this->session->flashdata('error')) :
?>
	<script>
		$(document).ready(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'error',
				title: '<?=$this->session->flashdata('error');?>'
			})
		})
	</script>
<?php endif ?>

</body>

</html>