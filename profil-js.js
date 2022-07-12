//Les variables dont j'ai besoin
const formCon = document.getElementById('connexionForm');
const nameProfil = document.getElementById('nameProfil').value;
const passwordProfil = document.getElementById('passwordProfil').value;

const formIns = document.getElementById('inscriptionForm');
const check = document.getElementById('check');

var was_i_visited = "";

//On enregistre le nom et le mot de passe du client
const donnees = localStorage.setItem('name', 'mdp')

// Savoir si le client a visité le site ou pas 
try {
    was_i_visited = localStorage.getItem('darkRed');
} catch {}

if (was_i_visited == "visited") {
    
    if(nameProfil === localStorage.getItem(donnees)) {
        alert('hhhhhhh');
    };







} else {
    alert("C'est la première fois je visites ce site");
    localStorage.setItem('darkRed', 'visited');
    formCon.style.display = none;
    formIns.style.display = block;
}