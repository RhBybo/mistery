/* Montrer sur l'écran l'Adresse e-mail de l'utilisateur
document.getElementsByName('email-name')[0].placeholder = localStorage.getItem('email');

/* Montrer sur l'écran le mot de passe de l'utilisateur
let z = "";
for (var i = 0; i < localStorage.getItem('mdp').length; i++ ) {
    z += "*";
}
document.getElementsByName('mdp-name')[0].placeholder = z;

// Montrer sur l'écran le numéro portable de l'utilisateur
let numero = document.getElementById('numeroTel-info-client');
if (!localStorage.getItem('numero')) {
    document.getElementsByName('numero-name')[0].placeholder = "Champ vide";
}

// Montrer sur l'écran l'Adresse de l'utilisateur
let adresse = document.getElementById('adresse-info-client');
if (!localStorage.getItem('adresse')) {
    document.getElementsByName('adresse-name')[0].placeholder = "Champ vide";
}

// L'évenement après le clique sur le btn 'Modifier'
let modifier = document.getElementById('modifier');
let modifierMess = document.getElementById('modifier-mess');


// L'utilisateur ne pourra cliquer sur ce bouton, il pourra que quand il vient apres Modifier
const infoClient = document.getElementsByClassName('info-client').addEventListener ('click', function () {
    infoClient.event.preventDefault();  
})
    
modifier.addEventListener('click', function () {
    modifierMess.style.display = "block"; // Montrer une message pour dire de cliquer sur un champ pour le modifier
    
});*/