async function fetchDataAttr(table) {
	let point = [];

	const response = await fetch(`/maps/${table}/json`);
	const jSondata = await response.json();

	const folder = await fetch(`/maps/file/getallfile/`);
	const jSonFolder = await folder.json();
	// console.log(jSonFolder);

	jSondata.forEach(function (params) {
		let image = new Image();

		let zone = params.attr_id.substring(0, 3);
		let subid = params.attr_id.substring(3, 7);
		let path = zone + "/" + subid;

		try {
		//find first image
		let img = jSonFolder[zone + "/"][subid + "/"]["attraction/"][0];

		// console.log(img);

		image.src = `/mobile/images/map/${path}/attraction/${img}`;
		// console.log(image.src);

		if (img) {
			path = `<img src='${image.src}' width='150'></img>`;
		} else {
			path = `ไม่พบภาพ`;
		}
	}catch (error) {
		path = `ไม่พบภาพ`;
	}
		var data = [
			"",
			path,
			params.attr_name,
			params.attr_highlight,
			params.attr_lat,
			params.attr_long,
			params.attr_id,
		];
		point = [...point, data];
	});
	// console.log(point);

	return point;
}

function urlExists(testUrl) {
	var http = jQuery.ajax({
		type: "HEAD",
		url: testUrl,
		async: false,
	});
	return http.status;
	// this will return 200 on success, and 0 or negative value on error
}

async function genDataTable() {
	try {
		const attractionDT = await fetchDataAttr("attraction");
		// console.log(attractionDT);

		////////datatable/////////////

		$.ajax({
			url: "/maps/session",
			success: function (result) {
				let columnDefVal;

				//check login
				if (result == "success") {
					columnDefVal = [
						{ targets: 0, className: "text-center", orderable: false },
						{ targets: 1, width: "15%" },

						{
							targets: -1,
							data: null,
							defaultContent: `<img class="dt-center editor-delete" src="/maps/app-assets/images/pages/maps/del.png" width="20">`,
							orderable: false,
						},
						{
							targets: -2,
							data: null,
							defaultContent: `<img class="dt-center editor-edit" src="/maps/app-assets/images/pages/maps/edit.png" width="20">`,
							orderable: false,
						},
						{
							targets: -3,
							data: null,
							defaultContent: `<img class="map-icon" role="button" src="/maps/app-assets/images/icons/map-icon.png" width="40">`,
							orderable: false,
						},
					];
				} else {
					columnDefVal = [
						{ targets: 0, className: "text-center", orderable: false },
						{ targets: 1, width: "15%" },
						{
							targets: -1,
							data: null,
							defaultContent: `<img class="map-icon" role="button" src="/maps/app-assets/images/icons/map-icon.png" width="40">`,
							orderable: false,
						},
					];
				}

				var dt_filter_table_attraction = $(".dt-attraction");
				if (dt_filter_table_attraction.length) {
					// Setup - add a text input to each footer cell
					// $(".dt-attraction thead tr")
					// 	.clone(true)
					// 	.appendTo(".dt-attraction thead");
					// $(".dt-attraction thead tr:eq(1) th")
					// 	.slice(1, -3) //except last column
					// 	.each(function (i) {
					// 		var title = $(this).text();
					// 		$(this).html(
					// 			'<input type="text" class="form-control form-control-sm" placeholder="Search ' +
					// 				title +
					// 				'" />'
					// 		);

					// 		$("input", this).on("keyup change", function () {
					// 			if (dt_filter_attraction.column(i).search() !== this.value) {
					// 				dt_filter_attraction.column(i).search(this.value).draw();
					// 			}
					// 		});
					// 	});

					var dt_filter_attraction = dt_filter_table_attraction.DataTable({
						// ajax: "/maps/attraction/json",
						sPaginationType: "full_numbers",

						data: attractionDT,
						columnDefs: columnDefVal,
						dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
						orderCellsTop: true,
						language: {
							paginate: {
								// remove previous & next text from pagination
								previous: "&nbsp;",
								next: "&nbsp;",
							},
						},
						fnDrawCallback: function () {
							//get map
							$(".map-icon").on("click", function () {
								var data = dt_filter_attraction
									.row($(this).parents("tr"))
									.data();

								var url = `https://www.google.com/maps/search/?api=1&query=${data[4]},${data[5]}`;
								window.open(url, "_blank");
							});
							
							//delete
							$(".editor-delete").on("click", function (e) {
								e.preventDefault();
								let editDOM = $(this);
								var data = dt_filter_attraction
									.row(editDOM.parents("tr"))
									.data();
								// console.log(data);

								Swal.fire({
									title: "กำลังลบข้อมูล",
									text: "คุณจะไม่สามารถกู้คืนข้อมูลได้",
									icon: "warning",
									showCancelButton: true,
									confirmButtonText: "ดำเนินการลบ",
									cancelButtonText: "ยกเลิก",
									customClass: {
										confirmButton: "btn btn-primary",
										cancelButton: "btn btn-outline-danger ms-1",
									},
									buttonsStyling: false,
								}).then(function (result) {
									if (result.value) {
										//delete ID folder
										$.ajax({
											url: `/maps/unlinkid/attraction/${data[6]}`,
											type: "DELETE",
										});

										//delete data on DB
										$.ajax({
											url: `/maps/attraction/delete/${data[6]}`,
											type: "DELETE",
											success: function (result) {
												dt_filter_attraction
													.row(editDOM.parents("tr"))
													.remove()
													.draw();

												// Swal.fire({
												// 	icon: "success",
												// 	title: "ดำเนินการลบข้อมูลแล้ว!",
												// 	// text: "ลบข้อมูลแล้ว",
												// 	customClass: {
												// 		confirmButton: "btn btn-success",
												// 	},
												// });
											},
										});
									}
								});
							});

							//GetData
							$(".editor-edit").on("click", function (e) {
								$('#editModal').modal('toggle')
								e.preventDefault();
								let editDOM = $(this);
								var data = dt_filter_attraction.row(editDOM.parents("tr")).data();
								
								$.ajax({
									url: `/maps/attraction/find_last_id/${data[6]}`,
									type: "GET",
									success: function (result) {
										console.log("result : " + result);
										if (result[0].attr_id) {
											let attr_id = parseInt(result[0].attr_id.substring(1, 3))
											 $("#ed_attr_zone").val(attr_id); 
										} 
						
									},
								});
								
			
								$("#ed_attr_name").val(data[2]); //attr_name
								$("#ed_attr_highlight").val(data[3]); //attr_highlight
								$("#ed_attr_lat").val(data[4]); //attr_lat
								$("#ed_attr_long").val(data[5]); //attr_long
								$("#ed_attr_id").val(data[6]); //attr_id

							});
						},
					});
				}
				numTable(dt_filter_attraction);
			},
		});
	} catch (error) {
		console.error(error);
	}
}

// $("#addNewModal").on("show.bs.modal", function () {});

Dropzone.autoDiscover = false;

let myDropzone = $("#dpz-file-limits").dropzone({
	// url: `/maps/upload/attraction/${id}`,
	method: "POST",
	paramName: "file", // The name that will be used to transfer the file
	maxFilesize: 2, // MB
	maxFiles: 4,
	parallelUploads: 10,
	maxThumbnailFilesize: 1, // MB
	// acceptedFiles: "image/*",
	acceptedFiles: ".jpg",
	autoProcessQueue: false,
	addRemoveLinks: true,
	dictRemoveFile: "ลบ",
	removedfile: function (file) {
		var name = file.name;

		let zone_id = $("#id_title").attr("data-zoneid");
		let unlink_path = `/maps/unlink/attraction/${zone_id}/${name}`;

		$.ajax({
			type: "DELETE",
			url: unlink_path,
			sucess: function (result) {
				console.log("success");
			},
		});
		var _ref;
		return (_ref = file.previewElement) != null
			? _ref.parentNode.removeChild(file.previewElement)
			: void 0;
	},

	init: function () {
		// Using a closure.
		var _this = this;

		$("#btn_addNew").click(function (e) {
			e.preventDefault();

			let zone_id = $("#id_title").attr("data-zoneid");
			// console.log(zone_id);
			let create_path = `/maps/createfolder/uploadFolder/attraction/${zone_id}`;

			let upload_path = `/maps/upload/attraction/${zone_id}`;

			//create folder
			$.ajax({
				url: create_path,
				type: "POST",
				success: function (result) {
					//uploadl:
					// console.log(result);
					_this.options.url = upload_path;
					// console.log(_this.options.url);
					_this.processQueue();
				},
			});

			//find first img name
			//insert data
			let form = $("#addNewAddressForm").serialize();
			// console.log(form);

			$.ajax({
				url: "/maps/attraction/insert",
				type: "POST",
				data: form,
				cache: false,
				success: function (params) {
					// console.log(params);
					let zone = zone_id.substring(0, 3);
					let subid = zone_id.substring(3, 7);
					let path = zone + "/" + subid;
					// let src = `/mobile/images/map/${path}/attraction/${_this.files[0].name}`;
					let src;
					if (_this.files[0]) {
						src = `${window.location.origin}/mobile/images/map/${path}/attraction/${_this.files[0].name}`;
					}
					img = `<img src='${src}' width='150'></img>`;

					let data = [
						"",
						img,
						params[1].attr_name,
						params[1].attr_highlight,
						params[1].attr_lat,
						params[1].attr_long,
						params[1].attr_id,
					];

					// console.log(data);
					//draw datatable
					let table = $(".dt-attraction").DataTable();
					let rowNode = table.row.add(data).draw().node();

					//rest form
					$(":reset").trigger("click");
				},
			});
		});

		$("#addNewAttraction").on("click", function () {
			_this.removeAllFiles();
		});
	},
});

$(":reset").click(function (e) {
	$("#id_title").html("กรุณากรอกข้อมูลแหล่งท่องเที่ยว");
});

$("#attr_zone").change(function (e) {
	e.preventDefault();

	let val = $(this).val();

	if (val !== "#") {
		val = "Z" + String("00" + String(val)).slice(-2);

		$.ajax({
			url: `/maps/attraction/find_last_id/${val}`,
			type: "GET",
			beforeSend: function () {
				$("#id_title")
					.html(`<h3>กำลังเรียกข้อมูล...</h3>`)
					.attr("data-zoneid", "");
			},
			success: function (result) {
				// console.log(val);

				let oldID, newID;

				if (result[0].attr_id) {
					oldID = result[0].attr_id;
					newID =
						val +
						String("0000" + (parseInt(oldID.substring(3, 7)) + 1)).slice(-4);
					$("#id_title").html(
						`<h3>ข้อมูลล่าสุด ${oldID} || กำลังเพิ่มข้อมูล : ${newID}</h3>`
					);
				} else {
					newID = `${val}0001`;
					$("#id_title").html(`<h3>กำลังเพิ่มข้อมูล : ${newID}</h3>`);
				}

				$("#attr_id").val(newID);
			},
		});
	} else $("#id_title").html(`<h3>กรุณากรอกข้อมูลแหล่งท่องเที่ยว</h3>`).attr("data-zoneid", "");
});

////////////////////////////////////////////////////
function numTable(dt) {
	dt.on("order.dt search.dt", function () {
		let i = 1;

		dt.cells(null, 0, { search: "applied", order: "applied" }).every(function (
			cell
		) {
			this.data(i++);
		});
	}).draw();
}

//update 
$("#editNewForm").submit(function (e) {
	e.preventDefault();
	let form = $(this).serialize();
	let id = $("#ed_attr_id").val()
	//console.log("#form : " +JSON.stringify(form));
	//console.log("#form : " +	$("#ed_comm_id").val());

	Swal.fire({
		title: "กำลังอัพเดชรายการ",
		text: "",
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: "ตกลง",
		cancelButtonText: "ยกเลิก",
		customClass: {
			confirmButton: "btn btn-primary",
			cancelButton: "btn btn-outline-danger ms-1",
		},
		buttonsStyling: false,
	}).then(function (result) {
		if (result.value) {
				$.ajax({
					url: "/maps/attraction/update/" +id,
					type: "POST",
					data: form,
					cache: false,
					success: function (params) {
						//console.log(" # #############params " + JSON.stringify(params));
						let data = [
							"",
							"",
							params.attr_name,
							params.attr_highlight,
							params.attr_lat,
							params.attr_long,
							params.attr_id,
						];

						// //draw datatable
						let table = $(".dt-attraction").DataTable();
						let rowNode = table.row.add(data).draw().node();
						
						//rest form
						$(":reset").trigger("click");
					},
				});
			}
		});
});


///////////////////////////////////////////
$(document).ready(function () {
	genDataTable();
});
