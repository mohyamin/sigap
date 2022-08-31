 <!-- BEGIN: Footer-->
 </div>
 </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/vendors.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/plugins.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/search.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/custom/custom-script.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/scripts/customizer.min.js"></script>
    

    <!-- Data Tables -->
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/data-tables/js/dataTables.select.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/scripts/data-tables.min.js"></script>
    
    <!-- Calendar -->
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/fullcalendar/lib/moment.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/fullcalendar/js/fullcalendar.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/fullcalendar/daygrid/daygrid.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/fullcalendar/timegrid/timegrid.min.js"></script>
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/fullcalendar/interaction/interaction.min.js"></script>

    <!-- Page Users -->
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/scripts/page-users.min.js"></script>

    <!-- Chart-->
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/scripts/app-calendar.min.js"></script>
    
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/vendors/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sweet Alert 2 -->
    <script src="<?= base_url('assets/js/sweetalert2.all.js'); ?>"></script>

    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/scripts/app-calendar.min.js"></script>

    <!-- Popper Js -->
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>

    <!-- My Scripts -->
    <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>

    <!-- Modals -->
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/scripts/advance-ui-modals.min.js"></script>

    <!-- FontAwesome -->
    <script src="<?= base_url('assets/js/all.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!-- Dashboard -->
   
    <script src="<?= base_url('assets/vendor/'); ?>app-assets/js/scripts/dashboard-analytics.min.js"></script>
    
    <script src="<?= base_url('assets/highchart/highcharts.js'); ?>"></script>
    <script src="<?= base_url('assets/highchart/exporting.js');  ?>"></script>
    <script src="<?= base_url('assets/highchart/export-data.js');  ?>"></script>
    <script src="<?= base_url('assets/highchart/accessibility.js');  ?>"></script>
    <script src="<?= base_url('assets/vendor/');?>app-assets/js/scripts/advance-ui-carousel.min.js"></script>


<script>
  $(document).ready(function() {
    $('#tabelLaporan').DataTable( {
        "scrollX": true
    } );
} );

$(document).ready(function () {
	$(".viewSurat").click(function () {
		const id = $(this).data("id");
        console.log(id)
		$.ajax({
			url: "http://localhost/sigap_boge/Profile/GetViewSuratMasuk",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				// $("#no").val(data.id_kegiatan);
                console.log(data)
				$("#id_masuk").val(data.id_masuk);
				$("#tgl_surat").html(data.tgl_surat);
				$("#no_surat").html(data.no_surat);
				$("#asal").html(data.asal);
				$("#perihal").html(data.perihal);
				$("#no_agenda").html(data.no_agenda);
				$("#sifat_surat").html(data.sifat_surat);
				$("#kode_surat").html(data.kode_surat);
				$("#tgl_terima").html(data.tgl_terima);
			},
		});
	});
});

</script>

<script>
    $(".viewEditSK").on("click", function () {
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/sigap_boge/Admin/SuratKeluar/GetSuratKeluarById",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
		success: function (data) {
            console.log(data)
			$("#id_surat").val(data.id_skluar);
			// console.log(data);
		},
	});
});

</script>

	<script>
		$(".select2-icons browser-default").select2();
	</script>



 </body>

 <!-- Mirrored from pixinvent.com/materialize-material-design-admin-template/html/ltr/vertical-modern-menu-template/page-users-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Oct 2020 08:20:51 GMT -->

 </html>