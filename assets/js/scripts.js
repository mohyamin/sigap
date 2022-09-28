// SWEET ALERT SUCCESS
const flashData = $(".flash-data").data("flashdata");
if (flashData) {
	// SWEET ALERT
	const flashData = $(".flash-data").data("flashdata");
	if (flashData) {
		Swal.fire({
			title: "Success",
			text: flashData,
			icon: "success",
			confirmButtonText: "OK",
		});
	}
}



$(".tombol-ubah").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin",
		text: "data ini akan dihapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "green",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data!",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

const errorData = $(".error-data").data("flashdata");
if (errorData) {
	// SWEET ALERT
	const errorData = $(".error-data").data("flashdata");
	if (errorData) {
		Swal.fire({
			title: "Error",
			text: errorData,
			icon: "error",
			confirmButtonText: "OK",
		});
	}
}

// SWEET ALERT WARNING
$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin",
		text: "data ini akan dihapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#008000",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data!",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

// VALIDATION FORM
$("#tambahUser").on("click", function () {
	var error_nip = false;
	var error_nama = false;
	var error_email = false;
	var error_password = false;
	var error_confirm_password = false;

	var nip = $("#nip").val();
	var nama = $("#nama").val();
	var email = $("#email").val();
	var tgllahir = $("#tgllahir").val();
	var password = $("#password1").val();
	var confirm_password = $("#password2").val();

	if (nip == "") {
		$(".show_error_nip").html("**Nip tidak boleh kosong.");
		$(".show_error_nip").css("color", "red");
		error_nip = true;
	} else if (nip.length != 18) {
		$(".show_error_nip").html("**Nip minimal 18 dan maksimal 18 karakter");
		$(".show_error_nip").css("color", "red");
		error_nip = true;
	} else {
		$(".show_error_nama").html("");
		error_nama = false;
	}

	if (nama == "") {
		$(".show_error_nama").html("**Nama tidak boleh kosong.");
		$(".show_error_nama").css("color", "red");
		error_nama = true;
	} else {
		$(".show_error_nama").html("");
		error_nama = false;
	}

	var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	if (email == "") {
		$(".show_error_email").html("**Email tidak boleh kosong.");
		$(".show_error_email").css("color", "red");
		error_email = true;
	} else {
		$(".show_error_email").html("");
		error_email = false;
	}

	if (pattern.test(email)) {
		$(".show_error_email").html("");
		error_email = false;
	} else {
		$(".show_error_email").html("**Email tidak valid");
		$(".show_error_email").css("color", "red");
		error_email = true;
	}

	if (tgllahir == "") {
		$(".show_error_tgllahir").html("**Tgl Lahir tidak boleh kosong.");
		$(".show_error_tgllahir").css("color", "red");
		error_tgllahir = true;
	} else {
		$(".show_error_tgllahir").html("");
		error_tgllahir = false;
	}

	if (password == "") {
		$(".show_error_password").html("**password tidak boleh kosong.");
		$(".show_error_password").css("color", "red");
		error_password = true;
	} else if (password.length < 8) {
		$(".show_error_password").html("**password minimal 8 karakter.");
		$(".show_error_password").css("color", "red");
		error_password = true;
	} else {
		$(".show_error_password").html("");
		error_password = false;
	}

	if (password != confirm_password) {
		$(".show_error_confirm_password").html(
			"**confirm password tidak cocok dengan password."
		);
		$(".show_error_confirm_password").css("color", "red");
		error_confirm_password = true;
	} else {
		$(".show_error_confirm_password").html("");
		error_confirm_password = false;
	}

	if (
		error_nip == false &&
		error_nama == false &&
		error_email == false &&
		error_tgllahir == false &&
		error_password == false &&
		error_confirm_password == false
	) {
		return true;
	} else {
		return false;
	}
});

// GET UPDATE FORM
$(".tombolUbahUser").on("click", function () {
	$("#title").html("Edit User");
	$("#tombol button[type=submit]").html("Ubah");
	$(".modal-content form").attr(
		"action",
		"http://localhost/siokta/Admin/DaftarUser/UbahUser"
	);

	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/siokta/Admin/DaftarUser/GetUbahUser",
		data: {
			id: id
		},
		method: "post",
		dataType: "json",
		success: function (data) {
			$(".input-field #nip").val(data.nip);
			$(".input-field #nama").val(data.nama_user);
			$(".input-field #email").val(data.email);
			$(".input-field  #tgllahir").val(data.tanggal_lahir);
		},
	});

	// $.ajax({
	// 	url: "http://localhost/siokta/Admin/DaftarUser/GetUbahRole",
	// 	data: { id: id },
	// 	success: function (data) {
	// 		// console.log(data);
	// 		$("#role_ubah").html(data);
	// 		// console.log(data);
	// 	},
	// });
});

$(".detailKegiatan").on("click", function () {
	$(".modal-content form").attr(
		"action",
		"http://localhost/siokta/Staff/Kegiatan/Terima_Kegiatan"
	);
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/siokta/Staff/Kegiatan/GetUbahKegiatan",
		data: {
			id: id
		},
		method: "post",
		dataType: "json",
		success: function (data) {
			$("#no").val(data.id_kegiatan);
			$("#jenis").html(data.nama_dpa);
			$("#operator").html(data.nama_user);
			$("#kegiatan").html(data.nama_kegiatan);
			$("#tgl_kegiatan").html(data.tgl_kegiatan);
			$("#keterangan").html(data.keterangan);
			$("#togleStatus").val(data.status);
		},
	});
});

$(".detailKegiatan").on("click", function () {
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/siokta/Staff/Kegiatan/GetKategoriKegiatan",
		data: {
			id: id
		},
		success: function (data) {
			$("#rincian_kegiatan").html(data);
			// console.log(data);
		},
	});
});

$(document).ready(function () {
	$(".viewSurat").click(function () {
		const id = $(this).data("id");
		console.log(id);
		$.ajax({
			url: "http://localhost/siokta/Admin/SuratMasuk/GetViewSuratMasuk",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data.id_masuk)
				// $("#no").val(data.id_kegiatan);
				$("#nomasuk").html(data.id_masuk);
				$("#tgl_terima").html(data.tgl_surat);
				$("#no_surat").html(data.no_surat);
				$("#perihal").html(data.perihal);
				$("#no_agenda").html(data.no_agenda);
				$("#sifat_surat").html(data.sifat_surat);
				$("#kode_surat").html(data.kode_surat);
				$("#tgl_terima").html(data.tgl_terima);
			},
		});
	});
});

$(".viewKegiatan").on("click", function () {
	const id = $(this).data("id");
	$.ajax({
		url: "http://localhost/siokta/Admin/Kegiatan/GetKategoriKegiatan",
		data: {
			id: id
		},
		success: function (data) {
			$("#rincian_view").html(data);
			// console.log(data);
		},
	});
});

$("#togleStatus").on("change", function () {
	if ($(this).is(":checked")) {
		$(this).val("1");
	} else {
		$(this).val("0");
	}
});


$("#tambahJenisPelaksana").on("click", function () {
	var error_kddpa = false;
	var error_namadpa = false;

	var kddpa = $("#kddpa").val();
	var namadpa = $("#namadpa").val();

	if (kddpa == "") {
		$(".show_error_kddpa").html("**Kode DPA tidak boleh kosong.");
		$(".show_error_kddpa").css("color", "red");
		error_nip = true;
	} else {
		$(".show_error_kddpa").html("");
		error_nip = false;
	}

	if (namadpa == "") {
		$(".show_error_namadpa").html("**Nama DPA tidak boleh kosong.");
		$(".show_error_namadpa").css("color", "red");
		error_namadpa = true;
	} else {
		$(".show_error_namadpa").html("");
		error_namadpa = false;
	}


	if (error_kddpa == false && error_namadpa == false) {
		return true;
	} else {
		return false;
	}
});


// // GET UPDATE FORM
// $(".tombol-ubah").on("click", function () {
// 	console.log("tes")
// 	$("#title").html("Edit Jenis Pelaksana");
// 	$("#tombol button[type=submit]").html("Ubah");
// 	$(".modal-content form").attr(
// 		"action",
// 		"http://localhost/siokta/Admin/JenisPelaksana/update"
// 	);

// 	const id = $(this).data("id");
// 	$.ajax({
// 		url: "http://localhost/siokta/Admin/JenisPelaksana/getJenisPelaksana",
// 		data: { id: id },
// 		method: "post",
// 		dataType: "json",
// 		success: function (data) {
// 			$(".input-field #kddpa").val(data.nip);
// 			$(".input-field #namadpa").val(data.nama_user);
// 		},
// 	});
// });
