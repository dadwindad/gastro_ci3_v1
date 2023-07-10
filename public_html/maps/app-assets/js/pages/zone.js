async function fetchData(table) {
	let point = [];

	const response = await fetch(`/maps/${table}/json`);
	const jSondata = await response.json();

	// console.log(jSonFolder);

	jSondata.forEach(function (params) {
		var data = [params.id_zone, params.zone_name_thai];
		point = [...point, data];
	});
	// console.log(point);

	return point;
}

async function genDataTable() {
	try {
		const dataDT = await fetchData("zone");
		// console.log(dataDT);

		////////datatable/////////////
		let columnDefVal = [
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
		];

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
					$(".editor-delete").on("click", function (e) {
						e.preventDefault();
						let editDOM = $(this);
						var data = dt_filter.row(editDOM.parents("tr")).data();
						console.log(data);

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
									url: `/maps/zone/delete/${data[0]}`,
									type: "DELETE",
									success: function (result) {
										dt_filter.row(editDOM.parents("tr")).remove().draw();
									},
								});
							}
						});
					});
				},
			});
		}
	} catch (error) {
		console.error(error);
	}
}

$(":reset").click(function (e) {
	$("#id_title").html("กรุณากรอกข้อมูลลุ่มน้ำ/กลุ่ม");
});

$("#addNewForm").submit(function (e) {
	e.preventDefault();

	//insert data
	let form = $(this).serialize();
	// console.log(form);

	$.ajax({
		url: "/maps/zone/insert",
		type: "POST",
		data: form,
		cache: false,
		success: function (params) {
			// console.log(params);
			var data = [params[1].id_zone, params[1].zone_name_thai];
			//draw datatable
			let table = $(".dt-datatable").DataTable();
			let rowNode = table.row.add(data).draw().node();

			//rest form
			$(":reset").trigger("click");
		},
	});
});

//get last id on modal loaded
$("#addModal").on("shown.bs.modal", function () {
	$.ajax({
		url: `/maps/zone/find_last_id/`,
		type: "GET",
		beforeSend: function () {
			$("#id_title").html(`<h3>กำลังเรียกข้อมูล...</h3>`);
		},
		success: function (result) {
			// console.log(val);
			let oldID = result[0].id_zone;
			let newID = parseInt(oldID) + 1;
			$("#id_title").html(
				`<h3>ข้อมูลล่าสุด ${oldID} || กำลังเพิ่มข้อมูล : ${newID}</h3>`
			);
			$("#id_zone").val(newID);
		},
	});
});

///////////////////////////////////////////
$(document).ready(function () {
	genDataTable();
});
