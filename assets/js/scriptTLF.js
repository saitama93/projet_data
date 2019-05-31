// VARIABLES
var open = document.querySelector('.recherche');
var close = document.querySelector('.closebtn');

var openLoopPC = document.querySelector('.loupe');

//EVENEMENTS
openLoopPC.addEventListener('click', loupeOpen);

open.addEventListener('click', openRecherche);
close.addEventListener('click', closeRecherche);

// fenêtre qui s'affiche quand on click sur la loupe  
document.getElementById("sideRecherche").style.display = "none";

function openRecherche() {

    document.getElementById("sideRecherche").style.top = "0";
    document.getElementById("sideRecherche").style.display = "block";
    //document.getElementById("mainTLF").style.marginTop = "150px";
}

function closeRecherche() {
    document.getElementById("sideRecherche").style.top = "-600px";
    document.getElementById("mainTLF").style.marginTop = "0";
}

function loupeOpen(){
    document.getElementById("sideRecherche").style.top = "0";
    document.getElementById("sideRecherche").style.display = "block";
    //document.getElementById("mainTLF").style.marginTop = "150px";
}