latitude = '';
longitude = '';

function maPosition(position) {
  var infopos = "Position déterminée :\n";
  infopos += "Latitude : "+position.coords.latitude +"\n";
  infopos += "Longitude: "+position.coords.longitude+"\n";
  infopos += "Altitude : "+position.coords.altitude +"\n";
  latitude = position.coords.latitude;
  longitude = position.coords.longitude;

  //requête AJAX
  fetch("https://nominatim.openstreetmap.org/reverse.php?format=json&lat="+latitude+"&lon="+longitude)
  //on vérifie si la promesse est bien tenue
  .then(function(response){
      return response.json();
  })
  //la réponse au format final souhaité
  .then(function(response){
      postcode = response.address.postcode;
      console.log(postcode);
      dept = postcode.substr(0,2);
      console.log(dept);
      if(dept.length > 0){
        data = new FormData();
        data.append("postcode", dept);  
        fetch("/projet_data/coordonate_ajax", 
        {
            method: 'POST',
            body: data,
        })
        .then(function(response){
            return response.json();
        })        
        .then(function(response){
            for(item of response){
                latlgt = item.coordonnees_insee.split(',');
                console.log(latlgt);
                L.marker([latlgt[0],latlgt[1]], {icon: icon}).addTo(mymap);
            }
        });

      }
  })
}

if(navigator.geolocation){

  navigator.geolocation.getCurrentPosition(maPosition);
 
}

function erreurPosition(error) {
  var info = "Erreur lors de la géolocalisation : ";
  switch(error.code) {
  case error.TIMEOUT:
    info += "Timeout !";
  break;
  case error.PERMISSION_DENIED:
info += "Vous n’avez pas donné la permission";
  break;
  case error.POSITION_UNAVAILABLE:
    info += "La position n’a pu être déterminée";
  break;
  case error.UNKNOWN_ERROR:
    info += "Erreur inconnue";
  break;
  }

document.getElementById("infoposition").innerHTML = info;}