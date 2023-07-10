var layerControl;

function callMap() {
  console.log("Loading...");

  $.getScript(
    "/maps/app-assets/js/scripts/maps/leaflet-color-markers.js",
    function () {
      async function fetchData(table) {
        let point = [];

        const response = await fetch(`/maps/${table}/json`);
        const JSONdata = await response.json();

        // console.log(JSONdata);

        let lat, lng, iconColor;

        JSONdata.forEach(function (params) {
          if (table == "attraction") {
            lat = params.attr_lat;
            lng = params.attr_long;
            iconColor = blueIcon;
          }

          if (table == "community") {
            lat = params.comm_lat;
            lng = params.comm_long;
            iconColor = yellowIcon;
          }

          if (table == "restaurant") {
            lat = params.rest_lat;
            lng = params.rest_long;
            iconColor = redIcon;
          }

          if (lat !== null && lng !== null) {
            var data = L.marker([lat, lng], {
              icon: iconColor,
            }).on("click", function () {
              modalInfo(params, table);
            });
            point = [...point, data];
          }
        });

        return point;
      }

      async function renderMap() {
        try {
          //////////////////point/////////////////////
          const attractionPoint = await fetchData("attraction");
          const attractionGroup = L.layerGroup(attractionPoint);

          const restaurantPoint = await fetchData("restaurant");
          const restaurantGroup = L.layerGroup(restaurantPoint);

          const communityPoint = await fetchData("community");
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
            มีรายละเอียด: street_d,
            ไม่มีรายละเอียด: street_nd,
          };

          var overlayMaps = {
            สถานที่ท่องเที่ยว: attractionGroup,
            ร้านอาหาร: restaurantGroup,
            ชุมชน: communityGroup,
          };

          if (layerControl != undefined) layerControl.remove();
          layerControl = L.map("layer-control-culture-map", {
            minZoom: 0,
            maxZoom: 18,
            layers: [
              street_nd,
              attractionGroup,
              restaurantGroup,
              communityGroup,
            ],
            // layers: [street_nd, restaurantGroup],
          });

          // layerControl.invalidateSize();

          // layerControl.setView([13.5, 101.5], 6);

          L.control.layers(baseMaps, overlayMaps).addTo(layerControl);
          // L.control.layers(baseMaps).addTo(layerControl);

          L.tileLayer("https://c.tile.osm.org/{z}/{x}/{y}.png", {
            attribution:
              'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 18,
          }).addTo(layerControl);

          // var orig_loc = L.latLng(13.742632, 100.527778);
          // var dest_loc = L.latLng(13.737307, 100.533287);

          //automatic zoom fit all marker
          var group = new L.featureGroup(
            attractionPoint,
            restaurantGroup,
            communityGroup
          );
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
      renderMap();
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

function modalInfo(params, table) {
  //table
  // r - restaurant, c- community, a-attraction
  let title, id, openning, tel, lat, lng;

  if (table == "attraction") {
    title = params.attr_name;
    id = params.attr_id;
    openning = params.attr_opening;
    tel = params.attr_tel;
    lat = params.attr_lat;
    lng = params.attr_long;
  }

  if (table == "restaurant") {
    title = params.rest_name_thai;
    id = params.rest_id;
    openning = params.rest_openning;
    tel = params.rest_tel;
    lat = params.rest_lat;
    lng = params.rest_long;
  }

  if (table == "community") {
    title = params.comm_name;
    id = params.comm_id;
    lat = params.comm_lat;
    lng = params.comm_long;
  }

  // console.log(params);
  $("#modal-info-title").html(title);
  let path = id.slice(0, 3) + "/" + id.slice(3, 7);
  let img = `<img src="/mobile/images/map/${path}/${table}/1.jpg" width="120" height="90">
            <img src="/mobile/images/map/${path}/${table}/2.jpg" width="120" height="90"> 
            <div class="pb-2"></div>`;
  let gmap = `<br>
            Google Maps :
            <a href="https://www.google.com/maps/search/?api=1&query=${lat},${lng}" target="_blank">
              <img class="map-icon" src="/maps/app-assets/images/icons/map-icon.png" width="20">
            </a><hr>`;

  if (table != "community") {
    $("#modal-info-content").html(`
        ${img}
        ${openning}
        <br><strong>หมายเลขติดต่อ</strong> <a href="tel:${tel}">${tel}</a>
        ${gmap}
    `);
  } else {
    $("#modal-info-content").html(`
          ${img}
					${params.comm_address}
          ${gmap}
          `);
  }

  $("#modal-info-more").attr(
    "href",
    `https://www.pmucgastro.net/${table.slice(0, 1)}-${id}`
  );

  $("#modal-info").showMenu();
}
