async function fetchDataComm(table) {
	let point = [];

	const response = await fetch(`/maps/${table}/json`);
	const jSondata = await response.json();

	jSondata.forEach(function (params) {
		let data = [
			"",
			params.comm_name,
			params.comm_detail,
			params.comm_lat,
			params.comm_long,
			params.comm_id,
		];
		point = [...point, data];
		// console.log(point);
	});

	return point;
}

async function genDataTable() {
	try {
		const dataDT = await fetchDataComm("community");
		// console.log(dataDT);

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
						{
							targets: -1,
							data: null,
							defaultContent: `<img class="map-icon" role="button" src="/maps/app-assets/images/icons/map-icon.png" width="40">`,
							orderable: false,
						},
					];
				}

				var dt_filter_table = $(".dt-datatable");
				if (dt_filter_table.length) {
					var dt_filter = dt_filter_table.DataTable({
						// ajax: "/maps/zone/json",
						sPaginationType: "full_numbers",
						data: dataDT,
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
								let editDOM = $(this);
								var data = dt_filter.row(editDOM.parents("tr")).data();

								var url = `https://www.google.com/maps/search/?api=1&query=${data[3]},${data[4]}`;
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
											url: `/maps/community/delete/${data[5]}`,
											type: "DELETE",
											success: function (result) {
												dt_filter.row(editDOM.parents("tr")).remove().draw();
											},
										});
									}
								});
							});

							$(".editor-edit").on("click", function (e) {
								$('#editModal').modal('toggle')
								e.preventDefault();
								let editDOM = $(this);
								var data = dt_filter.row(editDOM.parents("tr")).data();
								
								$.ajax({
									url: `/maps/community/find_last_id/${data[5]}`,
									type: "GET",
									success: function (result) {

										//console.log("result : " +  String(result[0].comm_id)).slice(-2);
										if (result[0].comm_id) {
											let comm_id = parseInt(result[0].comm_id.substring(1, 3))
											 $("#ed_comm_zone").val(comm_id); 
										} 
						
									},
								});
								
								$("#ed_comm_id").val(data[5]); //comm_id
								$("#ed_comm_name").val(data[1]); //comm_name
								$("#ed_comm_detail").val(data[2]); //comm_detail
								$("#ed_comm_lat").val(data[3]); //comm_lat
								$("#ed_comm_long").val(data[4]); //comm_long

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

$(":reset").click(function (e) {
	$("#id_title").html("กรุณากรอกข้อมูลแหล่งท่องเที่ยว");
});

///////////////////////////////////////////////////////////
$("#comm_zone").change(function (e) {
	e.preventDefault();

	let val = $(this).val();

	if (val !== "#") {
		val = "Z" + String("00" + String(val)).slice(-2);

		$.ajax({
			url: `/maps/community/find_last_id/${val}`,
			type: "GET",
			beforeSend: function () {
				$("#id_title").html(`<h3>กำลังเรียกข้อมูล...</h3>`);
			},
			success: function (result) {
				// console.log(result);

				let oldID, newID;

				if (result[0].comm_id) {
					oldID = result[0].comm_id;
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

				$("#comm_id").val(newID);
			},
		});
	} else $("#id_title").html(`<h3>กรุณากรอกข้อมูลแหล่งท่องเที่ยว</h3>`);
});

//inset
$("#addNewForm").submit(function (e) {
	e.preventDefault();

	//insert data
	let form = $(this).serialize();
	// console.log(form);

	$.ajax({
		url: "/maps/community/insert",
		type: "POST",
		data: form,
		cache: false,
		success: function (params) {
			// console.log(params);
			var data = [
				"",
				params[1].comm_name,
				params[1].comm_detail,
				params[1].comm_lat,
				params[1].comm_long,
				params[1].comm_id,
			];
			//draw datatable
			let table = $(".dt-datatable").DataTable();
			let rowNode = table.row.add(data).draw().node();
			numTable(table);

			//rest form
			$(":reset").trigger("click");
		},
	});
});

//update 
$("#editNewForm").submit(function (e) {
	e.preventDefault();
	let form = $(this).serialize();
	let id = $("#ed_comm_id").val()
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
					url: "/maps/community/update/" +id,
					type: "POST",
					data: form,
					cache: false,
					success: function (params) {
						//console.log(" # #############params " + JSON.stringify(params));
						var data = [
							"",
							params.comm_name,
							params.comm_detail,
							params.comm_lat,
							params.comm_long,
							params.comm_id,
						];
						// //draw datatable
						let table = $(".dt-datatable").DataTable();
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
