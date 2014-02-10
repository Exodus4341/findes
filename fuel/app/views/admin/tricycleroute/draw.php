<h3>Draw Tricycle Route</h3>

<div id="map" style=" height: 600px; border: 1px solid #ccc"></div>

    <script>
    
        var cloudmadeUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18}),
            map = new L.Map('map', {layers: [cloudmade], center: new L.LatLng(7.06819, 125.55725), zoom: 15 });

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polygon: {
                    title: 'Draw a sexy polygon!',
                    allowIntersection: false,
                    drawError: {
                        color: '#b00b00',
                        timeout: 1000
                    },
                    shapeOptions: {
                        color: '#bada55'
                    },
                    showArea: true
                },
                polyline: {
                    metric: false
                },
                circle: {
                    shapeOptions: {
                        color: '#662d91'
                    }
                }
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);

        map.on('draw:created', function (e) {
            var type = e.layerType,
                layer = e.layer;

            if (type === 'marker') {
                layer.bindPopup('A popup!');
            }

            
            drawnItems.addLayer(layer);
        });
        
    </script>