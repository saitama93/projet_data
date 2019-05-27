/* ***********************************************************************
 *************************MAP PAGE TOUS LES FESTIVALS**********************
 ************************************************************************** */

var mymap = L.map('map').setView([45.756837, 3.239749], 6.4);
    
    //permet d'afficher la map :
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/mgaaintjrae/cjw1s9oo30hlo1co1l7mgq804/tiles/256/{z}/{x}/{y}?&access_token=pk.eyJ1IjoibWdhYWludGpyYWUiLCJhIjoiY2p3MXMzMzJqMG4xcDQwa3Q1a25heGtnbyJ9.DMXg-P_uxnVml82Ki6SmUQ#10.0/42.362400/-71.020000/0}'
        , {
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoibWdhYWludGpyYWUiLCJhIjoiY2p3MXMzMzJqMG4xcDQwa3Q1a25heGtnbyJ9.DMXg-P_uxnVml82Ki6SmUQ'
        }).addTo(mymap);
    //permet d'afficher un repère :
    var icon = L.icon({
        iconUrl: 'http://localhost/projet_data/assets/images/icons/marker.svg',
        color: 'orange',
        iconSize: [25, 40], //taille du repère
        iconAnchor: [12.5, 46], //ombre
        popupAnchor: [-3, -76 ]
    });
    var markerOrange = {icon: icon};
    
   L.marker([46.861337, 5.036074], {icon: icon}).addTo(mymap);
    {% for i in donnees %}
    L.marker([{{ i.coordonnees_insee }}], markerOrange).addTo(mymap);
    {% endfor %} 

/* ***********************************************************************
 *************************MAP PAGE AUTOUR DE MOI***************************
 ************************************************************************** */

var mymap = L.map('map').setView([45.756837, 3.239749], 6.71);
//permet d'afficher la map :
L.tileLayer(
    'https://api.mapbox.com/styles/v1/mgaaintjrae/cjw1s9oo30hlo1co1l7mgq804/tiles/256/{z}/{x}/{y}?&access_token=pk.eyJ1IjoibWdhYWludGpyYWUiLCJhIjoiY2p3MXMzMzJqMG4xcDQwa3Q1a25heGtnbyJ9.DMXg-P_uxnVml82Ki6SmUQ#10.0/42.362400/-71.020000/0}'

    , {
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoibWdhYWludGpyYWUiLCJhIjoiY2p3MXMzMzJqMG4xcDQwa3Q1a25heGtnbyJ9.DMXg-P_uxnVml82Ki6SmUQ'
    }).addTo(mymap);

//permet d'afficher un repère :
var marker = L.marker([51.5, -0.09], {    
    iconSize: [66, 77],
    iconAnchor: [12.5, 46], //ombre
    popupAnchor: [, ],
}).addTo(mymap);


/* ************************************************************************
 *******************NAVBAR BURGER SMARTPHONE/TABLETTE**********************
 *******************ACCUEIL/AUTOUR DE MOI/AGENDA/CONTACT******************* 
 **************************************************************************/
function openNav() {
    document.getElementById("sideNavigation").style.width = "350px";
    document.getElementById("main").style.marginRight = "350px";
}

function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginRight = "0";
}