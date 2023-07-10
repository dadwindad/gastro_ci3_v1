// location.reload(true);
console.log("Loading...");

function loadFilter() {
  $.getJSON("/maps/gastro/jsonfilter", (data) => {
    //   console.log(data);

    data.region.forEach((el) => {
      // console.log(el);
      let dom = `<option value="${el.dish_region}">${el.dish_region}</option>`;
      $("#sel_region").append(dom);
    });

    data.province.forEach((el) => {
      // console.log(el);
      let dom;
      if (el.rest_province !== null) {
        dom = `<option value="${el.rest_province}">${el.rest_province}</option>`;
      }
      $("#sel_province").append(dom);
    });

    //   data.attr.forEach((el) => {
    //     // console.log(el);
    //     let dom = `<option value="${el.attr_name}">${el.attr_name}</option>`;
    //     $("#sel_region").append(dom);
    //   });

    data.food.forEach((el) => {
      // console.log(el);
      let dom = `<option value="${el.dish_food_type}">${el.dish_food_type}</option>`;
      $("#sel_food_type").append(dom);
    });

    data.rest.forEach((el) => {
      // console.log(el.rest_name_thai);
      let dom = `<option value="${el.rest_name_thai}">${el.rest_name_thai}</option>`;
      $("#sel_restaurant").append(dom);
    });
  });
}

function filterData() {
  $.getJSON("/maps/gastro/filter", (dataAll) => {
    $("select").on("change", () => {
      let dataFiltered = dataAll;

      let restaurant = $("#sel_restaurant").val();
      if (restaurant != "default") {
        dataFiltered = dataFiltered.filter((data) => {
          // console.log(restaurant);

          if (data.rest_name_thai !== null)
            return data.rest_name_thai.includes(restaurant);
        });
      }

      // let attraction = $("#sel_attraction").val();
      // if (attraction != "default") {
      //   // console.log(attraction);
      //   // console.log(dataFiltered[0].rest_attraction);
      //   dataFiltered = dataFiltered.filter((data) => {
      //     if (data.rest_attraction !== null)
      //       return data.rest_attraction.includes(attraction);
      //   });
      // }

      let province = $("#sel_province").val();
      if (province != "default") {
        dataFiltered = dataFiltered.filter((data) => {
          if (data.rest_province !== null)
            return data.rest_province.includes(province);
        });
      }

      let region = $("#sel_region").val();
      if (region != "default") {
        // console.log(region);
        dataFiltered = dataFiltered.filter((data) => {
          if (data.rest_region !== null)
            return data.rest_region.includes(region);
        });
      }

      let food_type = $("#sel_food_type").val();
      if (food_type != "default") {
        dataFiltered = dataFiltered.filter((data) => {
          // console.log(food_type);
          // console.log(data);
          if (data.rest_menu !== null)
            return data.rest_menu.includes(food_type);
        });
      }

      console.log(dataFiltered);
      callMap(dataFiltered);
    });

    callMap(dataAll);
    // console.log(dataAll);
  });
}

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
            var data = L.marker([params.rest_lat, params.rest_long], {
              icon: blueIcon,
            }).on("click", function () {
              modalInfo(params);
            });
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

          // L.control.layers(baseMaps, overlayMaps).addTo(layerControl);
          L.control.layers(baseMaps).addTo(layerControl);

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

function modalInfo(params) {
  // console.log(params);
  $("#modal-info-title").html(params.rest_name_thai);

  var path =
    params.rest_id.substring(0, 3) + "/" + params.rest_id.substring(3, 7);

  $("#modal-info-content").html(`
          <img src="/mobile/images/map/${path}/restaurant/1.jpg" width="120" height="90">
				  <img src="/mobile/images/map/${path}/restaurant/2.jpg" width="120" height="90"> 
          <div class="pb-2"></div>
					${params.rest_openning}<br>
					<strong>หมายเลขติดต่อ</strong> <a href="tel:${params.rest_tel}">${params.rest_tel}</a>
					<br>
          Google Maps :
					<a href="https://www.google.com/maps/search/?api=1&query=${params.rest_lat},${params.rest_long}" target="_blank">
						<img class="map-icon" src="/maps/app-assets/images/icons/map-icon.png" width="20">
					</a><hr>
          `);
  $("#modal-info-more").attr(
    "href",
    `https://www.pmucgastro.net/r-${params.rest_id}`
  );

  $("#modal-info").showMenu();
}
