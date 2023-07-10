// $("#region", "province", "food-type", "restaurant", "attraction").select2({
// 	dropdownParent: $(".form"),
// });

$.getJSON("/maps/gastro/filter", (dataAll) => {
	callMap(dataAll);

	sl_op("region", dataAll);
	sl_op("province", dataAll);
	sl_op("food-type", dataAll);
	sl_op("restaurant", dataAll);
	sl_op("attraction", dataAll);
	// let chars = ["AA", "B", "AA", "C", "CA", "CA", "B"];
	// let uniqueChars = [...new Set(chars)];

	// console.log(uniqueChars);

	//////////////////////////////////////////////

	// let regionAll = [];
	// $("#region option").each(function () {
	// 	regionAll = [...regionAll, $(this).val()];
	// });
	// regionAll.shift();
	// // console.log(regionAll);

	// let provinceAll = [];
	// $("#province option").each(function () {
	// 	provinceAll = [...provinceAll, $(this).val()];
	// });
	// provinceAll.shift();

	// let food_typeAll = [];
	// $("#food-type option").each(function () {
	// 	food_typeAll = [...food_typeAll, $(this).val()];
	// });
	// food_typeAll.shift();

	// let restaurantAll = [];
	// $("#restaurant option").each(function () {
	// 	restaurantAll = [...restaurantAll, $(this).val()];
	// });
	// restaurantAll.shift();

	// let attractionAll = [];
	// $("#attraction option").each(function () {
	// 	attractionAll = [...attractionAll, $(this).val()];
	// });
	// attractionAll.shift();
	// // console.log(attractionAll);

	//////////////////////////////////////////
	// console.log(dataAll);

	// let dataFiltered = dataAll;

	// 	$("#region").on("change", function () {
	// 		let region = $(this).val();

	// 		console.log("region" + region);
	// 		console.log(dataFiltered);

	// 		if (region != "#") {
	// 			dataFiltered = dataFiltered.filter((data) => {
	// 				if (data.rest_region !== null) return data.rest_region.includes(region);
	// 			});

	// 			sl_op("province", dataFiltered);
	// 			sl_op("food-type", dataFiltered);
	// 			sl_op("restaurant", dataFiltered);
	// 			sl_op("attraction", dataFiltered);
	// 		} else {
	// 			sl_op("province", dataAll);
	// 			sl_op("food-type", dataAll);
	// 			sl_op("restaurant", dataAll);
	// 			sl_op("attraction", dataAll);
	// 		}
	// 		callMap(dataFiltered);
	// 	});

	// 	$("#province").on("change", function () {
	// 		let province = $(this).val();
	// 		if (province != "#") {
	// 			// console.log(province);
	// 			dataFiltered = dataFiltered.filter((data) => {
	// 				if (data.rest_province !== null)
	// 					return data.rest_province.includes(province);
	// 			});
	// 			sl_op("food-type", dataFiltered);
	// 			sl_op("restaurant", dataFiltered);
	// 			sl_op("attraction", dataFiltered);
	// 		}
	// 		callMap(dataFiltered);
	// 	});

	// 	$("#food-type").on("change", function () {
	// 		let food_type = $(this).val();
	// 		if (food_type != "#") {
	// 			dataFiltered = dataFiltered.filter((data) => {
	// 				// console.log(food_type);
	// 				// console.log(data);
	// 				if (data.rest_menu !== null) return data.rest_menu.includes(food_type);
	// 			});

	// 			sl_op("restaurant", dataFiltered);
	// 			sl_op("attraction", dataFiltered);
	// 		} else {
	// 			sl_op("restaurant", dataAll);
	// 			sl_op("attraction", dataAll);
	// 		}
	// 		callMap(dataFiltered);
	// 	});

	// 	$("#restaurant").on("change", function () {
	// 		let restaurant = $(this).val();
	// 		if (restaurant != "#") {
	// 			dataFiltered = dataFiltered.filter((data) => {
	// 				// console.log(restaurant);

	// 				if (data.rest_name_thai !== null)
	// 					return data.rest_name_thai.includes(restaurant);
	// 			});

	// 			sl_op("attraction", dataFiltered);
	// 		} else {
	// 			sl_op("attraction", dataAll);
	// 		}
	// 		callMap(dataFiltered);
	// 	});

	// 	$("#attraction").on("change", function () {
	// 		let attraction = $(this).val();
	// 		if (attraction != "#") {
	// 			// console.log(attraction);
	// 			// console.log(dataFiltered[0].rest_attraction);
	// 			dataFiltered = dataFiltered.filter((data) => {
	// 				if (data.rest_attraction !== null)
	// 					return data.rest_attraction.includes(attraction);
	// 			});
	// 		}
	// 	});

	//////////////////////////
	function resetAll() {
		sl_op("region", dataAll);
		sl_op("province", dataAll);
		sl_op("food-type", dataAll);
		sl_op("restaurant", dataAll);
		sl_op("attraction", dataAll);

		callMap(dataAll);
	}

	$("#btn_reset").on("click", function () {
		resetAll();
	});

	///////////////////filter///////////////////////////
	function filterData() {
		let dataFiltered = dataAll,
			dataFilteredRegion = [],
			dataFilteredProvince = [],
			dataFilteredFood_type = [],
			dataFilteredRestaurant = [],
			dataFilteredAttraction = [];

		let region, province, food_type, restaurant, attraction;
		region = $("#region").val();
		province = $("#province").val();
		food_type = $("#food-type").val();
		restaurant = $("#restaurant").val();
		attraction = $("#attraction").val();

		console.log(region);
		console.log(province);
		console.log(food_type);
		console.log(restaurant);
		console.log(attraction);

		if (region != "#") {
			dataFilteredRegion = dataFiltered.filter((data) => {
				if (data.rest_region !== null) return data.rest_region.includes(region);
			});
		} else {
			dataFilteredRegion = dataFiltered;
		}

		if (province != "#") {
			dataFilteredProvince = dataFilteredRegion.filter((data) => {
				if (data.rest_province !== null)
					return data.rest_province.includes(province);
			});
		} else {
			dataFilteredProvince = dataFilteredRegion;
		}
		// console.log(dataFilteredProvince);

		if (food_type != "#") {
			dataFilteredFood_type = dataFilteredProvince.filter((data) => {
				if (data.rest_menu !== null) return data.rest_menu.includes(food_type);
			});
		} else {
			dataFilteredFood_type = dataFilteredProvince;
		}

		if (restaurant != "#") {
			dataFilteredRestaurant = dataFilteredFood_type.filter((data) => {
				if (data.rest_name_thai !== null)
					return data.rest_name_thai.includes(restaurant);
			});
		} else {
			dataFilteredRestaurant = dataFilteredFood_type;
		}

		if (attraction != "#") {
			dataFilteredAttraction = dataFilteredRestaurant.filter((data) => {
				if (data.rest_attraction !== null)
					return data.rest_attraction.includes(attraction);
			});
		} else {
			dataFilteredAttraction = dataFilteredRestaurant;
		}

		// dataFiltered = [
		// 	...dataFilteredRegion,
		// 	...dataFilteredProvince,
		// 	...dataFilteredFood_type,
		// 	...dataFilteredRestaurant,
		// 	...dataFilteredAttraction,
		// ];

		// dataFiltered = [...new Set(dataFiltered)];

		console.log(dataFilteredAttraction);

		callMap(dataFilteredAttraction);

		return dataFilteredAttraction;
	}

	$("#region").on("select2:select", function () {
		$("#province").val("#");
		$("#food-type").val("#");
		$("#restaurant").val("#");
		$("#attraction").val("#");
		let d = filterData();

		sl_op("province", d);
		sl_op("food-type", d);
		sl_op("restaurant", d);
		sl_op("attraction", d);
	});

	$("#province").on("select2:select", function () {
		$("#food-type").val("#");
		$("#restaurant").val("#");
		$("#attraction").val("#");
		let d = filterData();

		sl_op("food-type", d);
		sl_op("restaurant", d);
		sl_op("attraction", d);
	});

	$("#food-type").on("select2:select", function () {
		$("#restaurant").val("#");
		$("#attraction").val("#");
		let d = filterData();

		sl_op("restaurant", d);
		sl_op("attraction", d);
	});

	$("#restaurant").on("select2:select", function () {
		$("#attraction").val("#");
		let d = filterData();

		sl_op("attraction", d);
	});

	$("#attraction").on("select2:select", function () {
		filterData();
	});
});

//////////////////////////
function sl_op(dom, dataFiltered) {
	// console.log(dom);
	// let select_op = [];

	var formattedData = dataFiltered.map(function (item) {
		if (dom == "region") v = item.rest_region;
		if (dom == "province") v = item.rest_province;
		if (dom == "restaurant") v = item.rest_name_thai;
		if (dom == "attraction") v = item.rest_attraction;
		if (dom == "food-type") v = item.rest_menu;

		if (Array.isArray(v)) {
			let formattedDataS = v.map((k) => ({ id: k, text: k }));
			return formattedDataS[0];
		} else return { id: v, text: v };
	});

	dom = `#` + dom;
	// $(dom).val(null).trigger("change");

	$(dom).empty();
	$(dom).select2("destroy");

	//unique
	const key = "id";

	// console.log(formattedData);

	formattedData = [
		...new Map(formattedData.map((item) => [item[key], item])).values(),
	];

	formattedData.unshift({ id: "#", text: "-เลือกทั้งหมด-" });

	$(dom).select2({
		data: formattedData,
	});
}

////////////////////////

var layerControl;

function callMap(dataAll) {
	$.getScript(
		"/maps/app-assets/js/scripts/maps/leaflet-color-markers.js",
		function () {
			async function fetchDataGastro(dataAll) {
				let point = [];

				// const response = await fetch(`/maps/gastro/filter`);
				// const JSONdata = await response.json();
				const JSONdata = dataAll;

				// console.log(JSONdata);

				JSONdata.forEach(function (params) {
					if (params.rest_lat !== null && params.rest_long !== null) {
						var path =
							params.rest_id.substring(0, 3) +
							"/" +
							params.rest_id.substring(3, 7);

						var popup = `<h4>${params.rest_name_thai}</h4>
					<hr>
					<div class="row">
						<div class="text-center">
						<img src="/mobile/images/map/${path}/restaurant/1.jpg" width="120" height="90">
						<img src="/mobile/images/map/${path}/restaurant/2.jpg" width="120" height="90"> 
						<div class="img-map-space"></div>
						<img src="/mobile/images/map/${path}/restaurant/3.jpg" width="120" height="90">
						<img src="/mobile/images/map/${path}/restaurant/4.jpg" width="120" height="90">
						</div>
					</div>
					<hr>
					<strong>ละติจูด,ลองกิจูด</strong> : ${params.rest_lat},${params.rest_long} 
					<a href="https://www.google.com/maps/search/?api=1&query=${params.rest_lat},${params.rest_long}" target="_blank">
						<img class="map-icon" src="/maps/app-assets/images/icons/map-icon.png" width="20">
					</a>
					<br>
					${params.rest_openning}<br>
					<strong>หมายเลขติดต่อ</strong> <a href="tel:${params.rest_tel}">${params.rest_tel}</a>
					<br>
					<div class="d-flex justify-content-between">
					<button class="btn btn-primary btn-sm btn-map-latlong" 
						data-latlong="${params.rest_lat},${params.rest_long}" 
						data-name="${params.rest_name_thai}">
						เดินทาง
					</button>
					<a href="https://www.pmucgastro.net/a-${params.rest_id}" target="_blank" class="btn btn-secondary btn-sm">เพิ่มเติม</a>

					</div>
					`;

						var data = L.marker([params.rest_lat, params.rest_long], {
							icon: blueIcon,
						}).bindPopup(popup);
						point = [...point, data];
					}
				});

				return point;
			}

			async function renderMap(dataAll) {
				try {
					//////////////////point/////////////////////
					const attractionPoint = await fetchDataGastro(dataAll);
					const restaurantGroup = L.layerGroup(attractionPoint);

					// console.log(attractionPoint);

					/////////////////map//////////////////////

					var street_d = L.tileLayer(
						"https://{s}.tile.osm.org/{z}/{x}/{y}.png",
						{
							attribution:
								'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
						}
					);

					var street_nd = L.tileLayer(
						"https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png",
						{
							attribution:
								'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://carto.com/attribution">CARTO</a>',
						}
					);

					const mbAttr =
						'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
					const mbUrl =
						"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw";
					const satellite = L.tileLayer(mbUrl, {
						id: "mapbox/satellite-v9",
						tileSize: 512,
						zoomOffset: -1,
						attribution: mbAttr,
					});

					var baseMaps = {
						ถนนมีรายละเอียด: street_d,
						ถนนไม่มีรายละเอียด: street_nd,
					};

					var overlayMaps = {
						ร้านอาหาร: restaurantGroup,
						// ชุมชน: communityGroup,
					};

					if (layerControl != undefined) layerControl.remove();
					layerControl = L.map("layer-control-map", {
						minZoom: 0,
						maxZoom: 18,
						// layers: [street_nd, restaurantGroup, communityGroup],
						layers: [street_nd, restaurantGroup],
					});

					// layerControl.invalidateSize();

					// layerControl.setView([13.5, 101.5], 6);

					L.control.layers(baseMaps, overlayMaps).addTo(layerControl);

					L.tileLayer("https://c.tile.osm.org/{z}/{x}/{y}.png", {
						attribution:
							'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
						maxZoom: 18,
					}).addTo(layerControl);

					// var orig_loc = L.latLng(13.742632, 100.527778);
					// var dest_loc = L.latLng(13.737307, 100.533287);

					//automatic zoom fit all marker
					var group = new L.featureGroup(attractionPoint);
					layerControl.fitBounds(group.getBounds());

					var waypoints = [];

					//on popup
					layerControl.on("popupopen", function (e) {
						var marker = e.popup._source; //Source popup

						$(".btn-map-latlong").click(function () {
							layerControl.closePopup();

							var latlong = $(this).data("latlong").split(",");
							var name = $(this).data("name");

							var point = L.latLng(latlong[0], latlong[1]);
							waypoints = [...waypoints, point];

							// console.log(waypoints);
							//list
							let listAttraction = `
							<li class="todo-item">
								<div class="todo-title-wrapper">
									<div class="todo-title-area">
										<i data-feather="more-vertical" class="drag-icon"></i>
										<div class="title-wrapper">
											<span class="todo-title">${name}</span>
										</div>
									</div>
									<div class="todo-item-action">
										<small class="text-nowrap text-muted me-1">x</small>
									</div>
								</div>
							</li>`;

							$("#todo-task-list").append(listAttraction);

							if (waypoints.length > 1) {
								//routing
								$(".leaflet-routing-container").remove();
								$("#btn-gmap").remove();

								begin_routing(waypoints, layerControl);

								//jump to google map
								let origin = waypoints[0]["lat"] + "," + waypoints[0]["lng"];
								// console.log(origin);
								let destPos = waypoints.length - 1;
								let destination =
									waypoints[destPos]["lat"] + "," + waypoints[destPos]["lng"];

								// console.log(destination);
								var waypointLink = "";
								waypoints.forEach(function (point) {
									console.log(point);
									waypointLink =
										waypointLink + point["lat"] + "," + point["lng"] + "|";
								});

								let link = `https://www.google.com/maps/dir/?api=1&origin=${origin}&destination=${destination}&waypoints=${waypointLink}&travelmode=driving`;
								console.log(link);
								let googleMapLink = `<a href="${link}" class="btn" target="_blank" id="btn-gmap">Google Map</a>`;

								$("#todo-task-list").after(googleMapLink);
							}
						});
					});
				} catch (error) {
					console.error(error);
				}
			}

			///////////////////call map async////////////////////////
			renderMap(dataAll);
		}
	);
}

/* routing control  */
function begin_routing(waypoints, map) {
	L.Routing.control({
		waypoints: waypoints,
		routeWhileDragging: false,
		routeDragInterval: 500,
		collapsible: true, // hide/show panel routing
		reverseWaypoints: false,
		showAlternatives: false,
		createMarker: function (i, wp, nWps) {
			switch (i) {
				case 0:
					return L.marker(wp.latLng, {
						icon: redIcon,
						draggable: true,
					}).bindPopup("<b>" + "Origin" + "</b>");
				case nWps - 1:
					return L.marker(wp.latLng, {
						icon: redIcon,
						draggable: true,
					}).bindPopup("<b>" + "Destination" + "</b>");
				default:
					return L.marker(wp.latLng, {
						icon: greyIcon,
						draggable: true,
					}).bindPopup("<b>" + "Waypoint" + "</b>");
			}
		},
	}).addTo(map);
}
