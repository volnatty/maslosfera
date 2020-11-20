

    import mapboxgl from "mapbox-gl";
    
    var dolgota = $('#dolgota').val();
    var shirota = $('#shirota').val();

    $('.map-ground').on('click' , function(){
        $(this).fadeOut();
    })




    if (document.querySelector('#map')) {
        

        mapboxgl.accessToken = 'pk.eyJ1IjoibWFwLWJveC1kZXYiLCJhIjoiY2p0bzNzbDR2MnJhZTQ5bXg5NGpzdHp3OCJ9.kojuOFOVnCAGX_KYUlr0xw';
        const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/map-box-dev/cjvdncj5j1xb91fmtkbn33ixc',
        center: [dolgota , shirota],
        zoom: 12.4
        });
        
        
        map.on('style.load', function (e) {
            map.addSource('markers', {
                "type": "geojson",
                "data": {
                    "type": "FeatureCollection",
                    "features": [{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [dolgota , shirota]
                        },
                        "properties": {
                            "title": "OIL sphere",
                            "marker-symbol": "fuel-15"
                        }
                    }]
                }
            });
        
            map.addLayer({
                "id": "markers",
                "source": "markers",
                "type": "symbol",
                "layout": {
                    "icon-image": "{marker-symbol}",
                    "text-field": "{title}",
                    "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
                    "text-offset": [0, 0.6],
                    "text-anchor": "top"
                }
            });
        });
        
    }
