async function fetchData(table) {
	let point = [];

	const response = await fetch(`/maps/${table}/json`);
	const jSondata = await response.json();

	// console.log(jSonFolder);
	jSondata.forEach(function (params) {
		var data = [
			"",
			params.email,
			params.first_name + " " + params.last_name,
			params.password,
			params.date_added,
		];
		point = [...point, data];
	});
	// console.log(point);

	return point;
}

async function genDataTable() {
	try {
		const dataDT = await fetchData("user");
		// console.log(dataDT);

		////////datatable/////////////
		let columnDefVal = [
			{
				searchable: false,
				orderable: false,
				targets: 0,
			},
			// { targets: 4, width: "200px" },
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
				order: [[1, "asc"]],
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
									url: `/maps/user/delete/${data[1]}`,
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

			numTable(dt_filter);
		}
	} catch (error) {
		console.error(error);
	}
}

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
	$("#id_title").html("กรุณากรอกข้อมูลผู้ใช้");
	$("#err_password").html("");
});

$("#addNewForm").submit(function (e) {
	e.preventDefault();

	//insert data
	let form = $(this).serialize();
	// console.log(form);

	$.ajax({
		url: "/maps/user/insert",
		type: "POST",
		data: form,
		cache: false,
		success: function (params) {
			// console.log(params);
			var data = [
				"",
				params[1].email,
				params[1].first_name + " " + params[1].last_name,
				params[1].password,
				params[1].date_added,
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

$("#password_confirm,#password").keyup(function (e) {
	// e.preventDefault();

	let pass = String($("#password").val());
	let pass_c = String($("#password_confirm").val());

	// console.log(pass.length);

	if (pass_c.length < 4 || pass.length < 4) {
		$("#err_password").html("รหัสผ่านควรมีความยาวอย่างน้อย 4 ตัว");
	} else {
		if (pass != pass_c) $("#err_password").html("รหัสผ่านไม่ตรงกัน");
		else {
			$("#err_password").html("สามารถใช้รหัสผ่านได้");
		}
	}
});

///////////////////////////////////////////
$(document).ready(function () {
	genDataTable();
});
