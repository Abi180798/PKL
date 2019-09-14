var manage;

$(document).ready(function () {
	const flashData = $(".flash-data").data("flashdata");
	console.log(flashData);
	if (flashData) {
		Swal.fire({
			title: 'Data Barang ',
			text: 'Berhasil ' + flashData,
			type: 'success'
		});
	}
	const flashDatae = $(".flash-datae").data("flashdata");
	console.log(flashDatae);
	if (flashDatae) {
		Swal.fire({
			title: 'Data Barang',
			text: 'Gagal ' + flashDatae,
			type: 'error'
		});
	}
	const flashDataes = $(".flash-dataes").data("flashdata");
	console.log(flashDataes);
	if (flashDataes) {
		Swal.fire({
			title: 'Pengaturan pada Laporan',
			text: 'Berhasil ' + flashDataes,
			type: 'success'
		});
	}
	$('.tombol-kirim').on('click', function (e) {
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Yakin ingin mengirim ke data pengeluaran?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, send it!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		})
	});

	$('.tombol-hapus').on('click', function (e) {
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Yakin ingin menghapus?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		})
	});





	manage = $("#manage").DataTable({
		// dom: 'Bfrtip',
		buttons: [{
				extend: 'copy',
				title: 'Manajemen Kode barang',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'csv',
				title: 'Manajemen Kode barang',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'excel',
				// messageTop: 'Mantap'
				title: 'Manajemen Kode barang',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdf',
				// messageTop: 'Pemerintah Kota Mataram',
				title: 'Manajemen Kode barang',
				orientation: 'landscape',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'print',
				header: true,
				// messageTop: 'Pemerintah Kota Mataram',
				// messageBottom: 'Mengetahui',
				// title: 'Buku Penerimaan Barang Persediaan',
				title: 'Manajemen Kode barang',
				customize: function (win) {

					var last = null;
					var current = null;
					var bod = [];

					var css = '@page { size: landscape; }',
						head = win.document.head || win.document.getElementsByTagName('head')[0],
						style = win.document.createElement('style');

					style.type = 'text/css';
					style.media = 'print';

					if (style.styleSheet) {
						style.styleSheet.cssText = css;
					} else {
						style.appendChild(win.document.createTextNode(css));
					}

					head.appendChild(style);
				},




				exportOptions: {
					columns: ':visible'
				}
			},
			'colvis'
		],
		columnDefs: [{
			targets: -1,
			visible: false
		}],

		// "scrollY": 200,
		"scrollX": true,
		"pagingType": "full_numbers",
		"language": {
			"paginate": {
				"first": "Awal",
				"next": ">>",
				"previous": "<<",
				"last": "Akhir",

			}
		}

	});



	$('.datepicker').datepicker({
		format: "dd/mm/yyyy",
		autoclose: true,
		todayHighlight: true,
	});

	$('#vol').on('keyup', function () {
		const value1 = $(this).val();
		const value2 = $('#harga').val();
		const value3 = value1 * value2;
		$('#total').val(value3);
	});
	$('#harga').on('keyup', function () {
		const value1 = $(this).val();
		const value2 = $('#vol').val();
		const value3 = value1 * value2;
		$('#total').val(value3);
	});

	// $(document).ready(function () {

	// var hasil;
	// $('input.typeahead').typeahead({
	// 	source: function (query, process) {
	// 		return $.get('penerimaan/ajaxpro', {
	// 			query: query
	// 		}, function (data) {
	// 			console.log(data);
	// 			data = $.parseJSON(data);
	// 			hasil = data;
	// 			return process(data);
	// 		});
	// 	}
	// });
	// var countries = [{
	// 	"id": "6",
	// 	"kode": "15.01.01.0005",
	// 	nama_brg: "Amplop Lenen kabinet pendek",
	// 	"satuan": "ktk\/pak",
	// 	"harga": "30250"
	// }, {
	// 	"id": "7",
	// 	"kode": "15.01.01.0006",
	// 	"nama_brg": "Asbak Rokok   Halus",
	// 	"satuan": "buah",
	// 	"harga": "88000"
	// }, ];
	// var countries = [{
	// 		value: 'Andorra',
	// 		data: 'AD'
	// 	},
	// 	// ...
	// 	{
	// 		value: 'Zimbabwe',
	// 		data: 'ZZ'
	// 	}
	// ];


	// $('#nama_brg').autocomplete({
	// 	serviceUrl: '/penerimaan/ajaxpro',

	// 	onSelect: function (suggestion) {
	// 		alert('You selected: ' + suggestion.nama_brg + ', ' + suggestion.satuan);
	// 	}
	// });
	// });
	// $('#nama_brg').typeahead({
	// 	source: function (query, process) {
	// 		return $.get('penerimaan/ajaxpro', {
	// 			query: query
	// 		}, function (data) {
	// 			console.log(data);
	// 			// window.countries = data;
	// 			// console.log(window.countries);
	// 			data = $.parseJSON(data);
	// 			return process(data);
	// 		});
	// 	}
	// });
	// $('#nama_brg').autocomplete({
	// 	lookup: countries,
	// 	onSelect: function (suggestion) {
	// 		alert('You selected: ' + suggestion.nama_brg + ', ' + suggestion.satuan);
	// 	}
	// });
	// $("#nama_brg").autocomplete({
	// 	source: "penerimaan/ajaxpro",
	// 	select: function (event, ui) {
	// 		event.preventDefault();
	// 		$("#nama_brg").val(ui.item.id);
	// 	}
	// });

});





// if (flashData) {
// 	Swal({
// 		title: 'Data barang',
// 		text: 'Berhasil',
// 		type: 'success'
// 	});
// }
// $('#example').DataTable({
// 	pagingType: 'full',
// 	language: {
// 		paginate: {
// 			first: '«',
// 			previous: '‹',
// 			next: '›',
// 			last: '»'
// 		},
// 		aria: {
// 			paginate: {
// 				first: 'First',
// 				previous: 'Previous',
// 				next: 'Next',
// 				last: 'Last'
// 			}
// 		}
// 	}
// });
