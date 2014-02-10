<h3>Draw Jeepney Route</h3>

<div id="map" style=" height: 600px; border: 1px solid #ccc"></div>
<br>
<!--For draw output dapat xml document ni diri!-->
<textarea id="latlon" style="margin: 0 auto; width:930px;" placeholder="Created"></textarea>
<br>
<textarea id="edited" style="margin: 0 auto; width:930px;"  placeholder="Edited"></textarea>

<!-- controls for the drawing!-->

    <button class="leaflet-div-icon" style="position:relative; top:-760px; left:850px; box-shadow: -1px 1px 5px 1px gray; -webkit-border-radius: 4px 4px 4px 4px;
            -moz-border-radius: 4px 4px 4px 4px;
            border-radius: 4px 4px 4px 4px; border:white;" onclick="connectToLast()">End route</button>


    <script>

        var firstPoint;
        var layer;
        var layerEntryList = new Array(); //@params routeName, latLngs
    
        var cloudmadeUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 20}),
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
                featureGroup: drawnItems,
            }
        });
        map.addControl(drawControl);


        map.on('draw:created', function (e) {
            var type = e.layerType;
            layer = e.layer;
                
            if (type === 'marker') {
                layer.bindPopup('A popup!'); 
            }
            else if(type == 'polyline'){
                var latlons = layer.getLatLngs();
                eCurrent = latlons[latlons.length - 1];
            }

            drawnItems.addLayer(layer);

            
        });
        

         map.on('draw:edited', function (e) {
            var layers = e.layers;

            layers.eachLayer(function (layer) {
                //do whatever you want, most likely save back to db
            
                var div=document.getElementById("edited");
        
                var t=document.createTextNode(layer.getLatLngs());
                
                 div.appendChild(t);
             
                document.appendChild(div);
            });
            sumpay(layers.getLayers());
        });

        var popup = L.popup();

        function sumpay(layers){
            for(var x = 0 ; x < layerEntryList.length; x++){
                if(x != 0){
                    layerEntryList.latLngs[layerEntryList.latLngs.length - 1]
                }
            }
        }

        function onMapClick(e) { 
            popup.setLatLng(e).setContent("<form action='#' id='routename'>St. Name:<br><input style='width:80px' id='streetname' name='route'><br><a href='#' onclick='streetName()'>save</a></form>").openOn(map);
        }

        map.on('click', onMapClick);

        function streetName(){
                alert('saved!..close the info window..');
                var x=document.getElementById("routename");
                var strName = x.elements[0].value;
                

                //var t=document.createTextNode(stName + ', '+ layer.getLatLngs() + ', ');
                var latlons = layer.getLatLngs();
                // arrNodes.push(stName);
                
                var layerListEntry = new Object();
                layerListEntry = {
                    latLngs: latlons,
                    routeName: strName
                }
                layerEntryList.push(layerListEntry);

                // var div=document.createElement("p");
               
                var t=document.createTextNode( strName +' '+ latlons);
                
                // div.appendChild(t);

                var element=document.getElementById("latlon");

                while (element.hasChildNodes()) {
                    element.removeChild(element.lastChild);
                }

                element.appendChild(t);

                document.appendChild(element); 
                
        }
        
        function xmlGenerator (){
           var xw = new XMLWriter();
            xw.formatting = 'indented';//add indentation and newlines
            xw.indentChar = ' ';//indent with spaces
            xw.indentation = 2;//add 2 spaces per level

            xw.writeStartDocument();
              xw.writeStartElement( 'gpx' );
              xw.writeAttributeString( 'version', '1.1');
              xw.writeAttributeString( 'creator', 'GDAL 1.6.3');
              xw.writeAttributeString( 'xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
              xw.writeAttributeString( 'xmlns', 'http://www.topografix.com/GPX/1/1');
              xw.writeAttributeString( 'xsi:schemaLocation', 'http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/1/1/gpx.xsd');

                for(var x = 0 ; x < layerEntryList.length; x++){

                    var layerListEntry = layerEntryList[x]; 

                    var lowLat = 99999, highLat = 0, lowLon = 99999, highLon = 0;
                    for(var y = 0; y < layerListEntry.latLngs.length; y++){
                        if(layerListEntry.latLngs[y].lat > highLat){
                            highLat = layerListEntry.latLngs[y].lat;
                        }
                        if(layerListEntry.latLngs[y].lat < lowLat){
                            lowLat = layerListEntry.latLngs[y].lat;
                        }
                        if(layerListEntry.latLngs[y].lng > highLon){
                            highLon = layerListEntry.latLngs[y].lng;
                        }
                        if(layerListEntry.latLngs[y].lng < lowLon){
                            lowLon = layerListEntry.latLngs[y].lng;
                        }
                    }

                    xw.writeStartElement('rte');
                        xw.writeAttributeString( 'name', layerListEntry.routeName);
                        xw.writeAttributeString( 'lowLat', lowLat);
                        xw.writeAttributeString( 'highLat', highLat);
                        xw.writeAttributeString( 'lowLon', lowLon);
                        xw.writeAttributeString( 'highLon', highLon);

                    for(var y = 0; y < layerListEntry.latLngs.length; y++){
                        xw.writeStartElement( 'rtept');
                         xw.writeAttributeString( 'lat', layerListEntry.latLngs[y].lat);
                         xw.writeAttributeString( 'lon', layerListEntry.latLngs[y].lng);
                        xw.writeEndElement();
                    }

                    xw.writeEndElement();
                }
                    
            xw.writeEndDocument();

            var xml = xw.flush(); //generate the xml string
            xw.close();//clean the writer
            xw = undefined;//don't let visitors use it, it's closed
            //set the xml
            document.getElementById('parsed-xml').value = xml;
        }



        function connectToLast(){
            if(layer != null){
                alert('your gpx is already generated!..');
                layer.addLatLng(firstPoint);
                eCurrent = null;
                firstPoint = null;
                layer = null;
            }
            else{
                alert('Draw first..');
            }
        }
        
    </script>
           
<div id="wrap-xml">
    <h5>Generated XML file</h5>
    <form action="#" method="post">
        <textarea id="parsed-xml" onclick="xmlGenerator()" style="width:930px; height:500px" name="text"></textarea>
        <label>Filename:<input type="text" name="filename" /></label>
        <input type="submit" value="Download" name="submit"></input>
    </form>
</div>