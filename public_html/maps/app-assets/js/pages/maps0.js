// Layer Control
// --------------------------------------------------------------------
// var base_url = window.location.origin;

if ($("#layer-control-map").length) {
	$.getScript(
		"/maps/app-assets/js/scripts/maps/leaflet-color-markers.js",
		function () {
			//get jSON
			var attractionPoint = [];

			// $.getJSON("/maps/attraction/json", function (json) {
			// 	json.forEach(function (params) {
			// 		var feature = {
			// 			type: "Feature",
			// 			properties: params,
			// 			geometry: {
			// 				type: "Point",
			// 				coordinates: [params.attr_long, params.attr_lat],
			// 			},
			// 		};

			// 		jsonFeatures.push(feature);
			// 	});
			// });

			// var geoJson = { type: "FeatureCollection", features: jsonFeatures };

			// $.getJSON("/maps/attraction/json", function (json) {
			// 	json.forEach(function (params) {
			// 		var point = L.marker([params.attr_lat, params.attr_long], {
			// 			icon: blueIcon,
			// 		})
			// 			.bindPopup(params.attr_name)
			// 			.on("click", function (e) {
			// 				let key = params.attr_id;
			// 				let value = params.attr_long + "," + params.attr_long;

			// 				localStorage.setItem(key, value);
			// 				console.log(localStorage.getItem(key));
			// 			});
			// 		attractionPoint.push(point);
			// 	});
			// });

			// console.log(attractionPoint);

			//loop
			var littleton = L.marker([15.748128430218456, 101.33889768969068], {
					icon: blueIcon,
				}).bindPopup("This is Littleton, CO."),
				denver = L.marker([15.748188430218456, 101.33389768969068], {
					icon: blueIcon,
				})
					.bindPopup("This is Denver, CO.")
					.on("click", function (e) {
						// alert("[39.74,-104.99],denver");
						let key = "denver";
						let value = "39.74,-104.99";

						localStorage.setItem(key, value);
						console.log(localStorage.getItem(key));
					}),
				aurora = L.marker([15.748128430218456, 101.32889768969068], {
					icon: blueIcon,
				}).bindPopup("This is Aurora, CO."),
				golden = L.marker([39.77, -105.23], { icon: blueIcon }).bindPopup(
					"This is Golden, CO."
				);

			//group
			var citiesGroup = [littleton, denver, aurora, golden];
			var cities = L.layerGroup(citiesGroup);
			console.log(cities);

			////////////////////////////////

			var crownHill = L.marker([15.848128430218456, 101.33889768969068], {
					icon: greenIcon,
				}).bindPopup("This is Crown Hill Park."),
				rubyHill = L.marker([39.68, -105.0], { icon: greenIcon }).bindPopup(
					"This is Ruby Hill Park."
				);

			var parks = L.layerGroup([crownHill, rubyHill]);

			var street = L.tileLayer("https://{s}.tile.osm.org/{z}/{x}/{y}.png", {
				attribution:
					'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
				maxZoom: 18,
			});

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

			var layerControl = L.map("layer-control-map", {
				center: [15.748128430218456, 101.33889768969068],
				zoom: 7,
				layers: [cities, parks],
			});

			// var layerControl = L.map("layer-control-map", {}).setView(
			// 	[15.748128430218456, 101.33889768969068],
			// 	7
			// );

			var baseMaps = {
				ถนน: street,
				ดาวเทียม: satellite,
			};

			var overlayMaps = {
				อาหาร: cities,
				สถานที่ท่องเที่ยว: parks,
			};
			L.control.layers(baseMaps, overlayMaps).addTo(layerControl);

			// rubyHill._icon.classList.add("map-group-1");
			// crownHill._icon.classList.add("map-group-1");

			L.tileLayer("https://c.tile.osm.org/{z}/{x}/{y}.png", {
				attribution:
					'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
				maxZoom: 18,
			}).addTo(layerControl);

			// L.geoJson(geoJson).addTo(layerControl);

			var orig_loc = L.latLng(13.742632, 100.527778);
			var dest_loc = L.latLng(13.737307, 100.533287);

			// begin_routing(orig_loc, dest_loc, layerControl);
		}
	);
}

/* Start routing control  */
function begin_routing(orig_loc, dest_loc, map) {
	L.Routing.control({
		waypoints: [
			orig_loc,
			dest_loc,
			//L.latLng(14.1688, 100.2918),
			//L.latLng(13.7042, 100.6032)
		],
		routeWhileDragging: true,
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
