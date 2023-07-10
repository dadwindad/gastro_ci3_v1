// Layer Control
// --------------------------------------------------------------------
// var base_url = window.location.origin;

if ($("#layer-control-map").length) {
	$.getScript(
		"/maps/app-assets/js/scripts/maps/leaflet-color-markers.js",
		function () {
			async function fetchDataAttr(table) {
				let point = [];

				const response = await fetch(`/maps/${table}/json`);
				const jSondata = await response.json();

				jSondata.forEach(function (params) {
					var path =
						params.attr_id.substring(0, 3) +
						"/" +
						params.attr_id.substring(3, 7);

					var popup = `<h4>${params.attr_name}</h4>
					<hr>
					<div class="row">
						<div class="text-center">
						<img src="/mobile/images/map/${path}/attraction/1.jpg" width="120" height="90">
						<img src="/mobile/images/map/${path}/attraction/2.jpg" width="120" height="90"> 
						<div class="img-map-space"></div>
						<img src="/mobile/images/map/${path}/attraction/3.jpg" width="120" height="90">
						<img src="/mobile/images/map/${path}/attraction/4.jpg" width="120" height="90">
						</div>
					</div>
					<hr>
					<strong>ละติจูด,ลองกิจูด</strong> : ${params.attr_lat},${params.attr_long} 
					<a href="https://www.google.com/maps/search/?api=1&query=${params.attr_lat},${params.attr_long}" target="_blank">
						<img class="map-icon" src="/maps/app-assets/images/icons/map-icon.png" width="20">
					</a>
					<br>
					${params.attr_opening}<br>
					<strong>หมายเลขติดต่อ</strong> <a href="tel:${params.attr_tel}">${params.attr_tel}</a>
					<br>
					<div class="d-flex justify-content-between">
					<button class="btn btn-primary btn-sm btn-map-latlong" 
						data-latlong="${params.attr_lat},${params.attr_long}" 
						data-name="${params.attr_name}">
						เดินทาง
					</button>
					<a href="https://www.pmucgastro.net/a-${params.attr_id}" target="_blank" class="btn btn-secondary btn-sm">เพิ่มเติม</a>

					</div>
					`;

					var data = L.marker([params.attr_lat, params.attr_long], {
						icon: blueIcon,
					}).bindPopup(popup);
					// .on("click", function (e) {
					// 	let key = params.attr_id;
					// 	let value = params.attr_long + "," + params.attr_long;

					// localStorage.setItem(key, value);
					// console.log(localStorage.getItem(key));
					// });
					point = [...point, data];
					// console.log(point);
				});

				return point;
			}

			async function fetchDataComm(table) {
				let point = [];

				const response = await fetch(`/maps/${table}/json`);
				const jSondata = await response.json();

				jSondata.forEach(function (params) {
					var data = L.marker([params.comm_lat, params.comm_long], {
						icon: greenIcon,
					})
						.bindPopup(params.comm_name)
						.on("click", function (e) {
							let key = params.comm_id;
							let value = params.comm_long + "," + params.comm_long;

							localStorage.setItem(key, value);
							console.log(localStorage.getItem(key));
						});
					point = [...point, data];
					// console.log(point);
				});

				return point;
			}

			async function renderMap() {
				try {
					//////////////////point/////////////////////
					const attractionPoint = await fetchDataAttr("attraction");
					const attractionGroup = L.layerGroup(attractionPoint);

					const communityPoint = await fetchDataComm("community");
					const communityGroup = L.layerGroup(communityPoint);

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
						สถานที่ท่องเที่ยว: attractionGroup,
						ชุมชน: communityGroup,
					};

					var layerControl = L.map("layer-control-map", {
						minZoom: 0,
						maxZoom: 18,
						layers: [street_nd, attractionGroup, communityGroup],
					});

					layerControl.setView([13.5, 101.5], 6);

					L.control.layers(baseMaps, overlayMaps).addTo(layerControl);

					L.tileLayer("https://c.tile.osm.org/{z}/{x}/{y}.png", {
						attribution:
							'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
						maxZoom: 18,
					}).addTo(layerControl);

					// var orig_loc = L.latLng(13.742632, 100.527778);
					// var dest_loc = L.latLng(13.737307, 100.533287);

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
										// waypointLink + point["lat"] + "," + point["lng"] + "|";
										waypointLink + point["lat"] + "," + point["lng"] + "/";
								});

								// let link = `https://www.google.com/maps/dir/?api=1&origin=${origin}&destination=${destination}&waypoints=${waypointLink}&travelmode=driving`;

								let link = `https://www.google.com/maps/dir/My+Location/${waypointLink}@${destination},10z`;

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
			renderMap();
		}
	);
}

// clear localStorage

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
