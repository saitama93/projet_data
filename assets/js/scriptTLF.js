// VARIABLES
var open = document.querySelector('.recherche');
var close = document.querySelector('.closebtn');

//EVENEMENTS
open.addEventListener ('click',openRecherche);
close.addEventListener ('click',closeRecherche);
// fenêtre qui s'affiche quand on click sur la loupe  
        document.getElementById("sideRecherche").style.display = "none";
    function openRecherche() {   
            
        document.getElementById("sideRecherche").style.top = "0";
        document.getElementById("sideRecherche").style.display = "block"; 
        document.getElementById("mainTLF").style.maringTop = "150px";        
    }

    function closeRecherche() {
        document.getElementById("sideRecherche").style.top = "-300px";
        document.getElementById("mainTLF").style.marginTop = "0";        
    }  






    // fenêtre qui s'affiche quand on click sur "par mois"
    // document.getElementById("searchMois").style.display = "none";
    // function openSearchMois(){
        
    // }
