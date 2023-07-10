async function fetchDataRest(table) {
	let point = [];

	const response = await fetch(`/maps/${table}/json`);
	const jSondata = await response.json();

	const folder = await fetch(`/maps/file/getallfile/`);
	const jSonFolder = await folder.json();
	// console.log(jSonFolder);

	jSondata.forEach(function (params) {
		let image = new Image();
		let zone = params.rest_id.substring(0, 3);
		let subid = params.rest_id.substring(3, 7);
		let path = zone + "/" + subid;

		try {
		//find first image
		let img = jSonFolder[zone + "/"][subid + "/"]["restaurant/"][0];
		image.src = `/mobile/images/map/${path}/restaurant/${img}`;
		
		//console.log("img : "+img);
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
			params.rest_name_thai,
			params.rest_highlight,
			params.rest_lat,
			params.rest_long,
			params.rest_id];
		point = [...point, data];
		//console.log("aaaaaa"+point);
	});

	return point;
}

async function genDataTable() {
	try {
		const restaurantDT = await fetchDataRest("restaurant");
	
		////////datatable/////////////

		// var dt_filter_table_restaurant = $(".dt-restaurant");
		// if (dt_filter_table_restaurant.length) {
		// 	// Setup - add a text input to each footer cell
		// 	$(".dt-restaurant thead tr").clone(true).appendTo(".dt-restaurant thead");
		// 	$(".dt-restaurant thead tr:eq(1) th").each(function (i) {
		// 		var title = $(this).text();
		// 		$(this).html(
		// 			'<input type="text" class="form-control form-control-sm" placeholder="Search ' +
		// 				title +
		// 				'" />'
		// 		);

		// 		$("input", this).on("keyup change", function () {
		// 			if (dt_filter_restaurant.column(i).search() !== this.value) {
		// 				dt_filter_restaurant.column(i).search(this.value).draw();
		// 			}
		// 		});
		// 	});

		// 	var dt_filter_restaurant = dt_filter_table_restaurant.DataTable({
		// 		// ajax: "/maps/restaurant/json",
		// 		data: restaurantDT,
		// 		// columns: [{ title: "Name" }, { title: "Email" }],
		// 		dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
		// 		orderCellsTop: true,
		// 		language: {
		// 			paginate: {
		// 				// remove previous & next text from pagination
		// 				previous: "&nbsp;",
		// 				next: "&nbsp;",
		// 			},
		// 		},
		// 	});
		// }

		$.ajax({
			url: "/maps/session",
			success: function (result) {
				let columnDefVal;

				//check login
				if (result == "success") {
					columnDefVal = [
						{
							targets: 0,
							searchable: false,
							orderable: false,
						},
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
						{
							searchable: false,
							orderable: false,
							targets: 0,
						},
						{ targets: 1, width: "15%" },
						{
							targets: -1,
							data: null,
							defaultContent: `<img class="map-icon" role="button" src="/maps/app-assets/images/icons/map-icon.png" width="40">`,
							orderable: false,
						},
					];
				}

				var dt_filter_table = $(".dt-restaurant");
				if (dt_filter_table.length) {
					var dt_filter = dt_filter_table.DataTable({
						// ajax: "/maps/zone/json",
						sPaginationType: "full_numbers",
						data: restaurantDT,
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

							$(".map-icon").on("click", function () {
								var data = dt_filter
									.row($(this).parents("tr"))
									.data();
								 var url = `https://www.google.com/maps/search/?api=1&query=${data[4]},${data[5]}`;
								window.open(url, "_blank");
							});


							$(".editor-delete").on("click", function (e) {
								e.preventDefault();
								let editDOM = $(this);
								var data = dt_filter.row(editDOM.parents("tr")).data();
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
										//delete data on DB
										$.ajax({
											url: `/maps/restaurant/delete/${data[6]}`,
											type: "DELETE",
											success: function (result) {
												dt_filter.row(editDOM.parents("tr")).remove().draw();
											},
										});
									}
								});
							});

							//getById
							$(".editor-edit").on("click", function (e) {
								$('#editModal').modal('toggle')
								e.preventDefault();
								let editDOM = $(this);
								var data = dt_filter.row(editDOM.parents("tr")).data();
								
								$.ajax({
									url: `/maps/restaurant/find_last_id/${data[6]}`,
									type: "GET",
									success: function (result) {
										//console.log("result : " + result);
										if (result[0].rest_id) {
											let rest_id = parseInt(result[0].rest_id.substring(1, 3))
											 $("#ed_rest_zone").val(rest_id); 
										} 
						
									},
								});
						
								$("#ed_rest_name_thai").val(data[2]); //rest_name_thai
								$("#ed_rest_highlight").val(data[3]); //rest_highlight
								$("#ed_rest_lat").val(data[4]); //rest_lat
								$("#ed_rest_long").val(data[5]); //rest_long
								$("#ed_rest_id").val(data[6]); //rest_id
							});

						},
					});
				}
				numTable(dt_filter);
			},
		});

	} catch (error) {
		console.error(error);
		
	}
}
///////////////////////////////////////////////////////////
$("#rest_zone").change(function (e) {
	e.preventDefault();
	let val = $(this).val();

	if (val !== "#") {
		val = "Z" + String("00" + String(val)).slice(-2);

		$.ajax({
			url: `/maps/restaurant/find_last_id/${val}`,
			type: "GET",
			beforeSend: function () {
				$("#id_title").html(`<h3>กำลังเรียกข้อมูล...</h3>`);
			},
			success: function (result) {
				// console.log(result);

				let oldID, newID;

				if (result[0].rest_id) {
					oldID = result[0].rest_id;
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

				$("#rest_id").val(newID);
			},
		});
	} else $("#id_title").html(`<h3>กรุณากรอกข้อมูลแหล่งท่องเที่ยว</h3>`);
});

//inset
$("#addNewAddressForm").submit(function (e) {
	e.preventDefault();
	let form = $(this).serialize();
	//console.log("ssssssssssssssss"+ JSON.stringify(form));

	$.ajax({
		url: "/maps/restaurant/insert",
		type: "POST",
		data: form,
		cache: false,
		success: function (params) {
			var data = [
				"",
				"",
				params[1].rest_name_thai,
				params[1].rest_highlight,
				params[1].rest_lat,
				params[1].rest_long,
				params[1].rest_id
			];
			//draw datatable
			let table = $(".dt-restaurant").DataTable();
			let rowNode = table.row.add(data).draw().node();
			
			numTable(table);

			//rest form
			$(":reset").trigger("click");
		},
	});
});

$("#editNewForm").submit(function (e) {
	e.preventDefault();
	let form = $(this).serialize();
	let id = $("#ed_rest_id").val()
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
					url: "/maps/restaurant/update/" +id,
					type: "POST",
					data: form,
					cache: false,
					success: function (params) {
						//console.log(" # #############params " + JSON.stringify(params));
						var data = [
							"",
							"",
							params.rest_name_thai,
							params.rest_highlight,
							params.rest_lat,
							params.rest_long,
							params.rest_id
						];
						
						//draw datatable
						let table = $(".dt-restaurant").DataTable();
						let rowNode = table.row.add(data).draw().node();
			
						//rest form
						$(":reset").trigger("click");
					},
				});
			}
		});
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

///////////////////////////////////////////
$(document).ready(function () {
	genDataTable();
});

