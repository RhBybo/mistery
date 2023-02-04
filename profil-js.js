// Supabase - learn it, 03/09/2022 11:17

// Savoir si le client a visité le site ou pas
/*
var was_i_visited = "";

try {
    was_i_visited = localStorage.getItem('darkRed');
} catch {}

if (was_i_visited == "visited") {
    // laisser passer
} else {
    //L'utilisateur n'a jamais visité ce site
    localStorage.setItem('darkRed', 'visited');
}

let articleClose = document.getElementById("container1");
let divClose = document.getElementById("mon-compte-id");
const body = document.body; // Récuperer tous les données du body

// Savoir si l'utilisateur a un compte chez mystery
var myName = localStorage.getItem('name');
var myMdp = localStorage.getItem('mdp');

// enlever la petite page d'inscription

if (!myName && !myMdp){ // S'il y'en a pas, on fait cette fonction
    divClose.style.display = "none";
    // Pouvoir utiliser le form (se déplacer connexion <-> inscription)
    const signInBtn = document.querySelector('.signin-btn');
    const signUpBtn = document.querySelector('.signup-btn');
    const formBox = document.querySelector('.form-box');

    signUpBtn.addEventListener('click', function() {
        formBox.classList.add('active');
        body.classList.add('active');
    });

    signInBtn.addEventListener('click', function() {
        formBox.classList.remove('active');
        body.classList.remove('active');
    });


    // INSCRIPTION DU CLIENT
    //idée pris sur yt*
    document.forms["inscription"].addEventListener("submit", function(e) {
        e.preventDefault();

        var erreur;
        var inputs = this;

        // Traitement cas par cas (input unique)
        // Savoir si le nom est conforme
        if (inputs["name"].value.length < 3 ) {
            erreur = "Votre nom d'utilisateur doit contenir au moins 3 lettres/chiffres";
        }
        // Savoir si les mdp sont conforme
        if (inputs["mdp"].value.length < 8 ) {
            erreur = "Votre mot de passe doit contenir au moins 8 lettres/chiffres";
            if (inputs["mdp2"].value.length < 8)  {
                erreur = "Votre mot de passe doit contenir au moins 8 lettres/chiffres";
            }
        }

        if (inputs["mdp2"].value != inputs["mdp"].value) {
            erreur = "Les deux mots de passe ne correspondent pas :(";
        }

        // Traitement générique
        for (var i = 0; i < inputs.length - 1; i++) {
            if (!inputs[i].value) {
                erreur = "Veuillez renseigner tous les champs";
                break;
            }
        }

        if (erreur) {
            e.preventDefault();
            document.getElementById("erreur").innerHTML = erreur;
            return false;
        } else {
            for (var i = 0; i < inputs.length - 1; i++) {
                localStorage.setItem(inputs[i].name, inputs[i].value);
                console.log(localStorage.getItem(inputs[i].name));
            }
            articleClose.style.display = "none";
            body.classList.add('bg-color-change');

        }
    });



    // CONNEXION DU CLIENT

    document.forms["connexion"].addEventListener("submit", function(e) {
        e.preventDefault();

        var erreur2;
        var inputs2 = this;

        // Traitement cas par cas (input unique)
        if (inputs2[0].value != localStorage.name || inputs2[1].value != localStorage.getItem("mdp")) {
            erreur2 = "Le nom ou le mot de passe est incorrecte";
        }

        // Traitement générique
        for (var i = 0; i < inputs2.length - 1; i++) {
            if (!inputs2[i].value) {
                erreur2 = "Veuillez renseigner tous les champs";
                break;
            }
        }

        if (erreur2) {
            e.preventDefault();
            document.getElementById("erreur2").innerHTML = erreur2;
            return false;
        } else {
            articleClose.style.display = "none";
            body.classList.add('bg-color-change');
        }
    });
} else {
    articleClose.style.display = "none";
    body.classList.add('bg-color-change');
}


// Mon compte après avoir inscrit sur le site mystery

// Changer la couleur du cercle quand on clique
const cercleBtn = document.getElementById('cercle');
cercleBtn.addEventListener('click', () => {
        cercle.style.backgroundColor = changeC()
});

var x = Math.floor(Math.random() *256);
y = Math.floor(Math.random() * 256);
z = Math.floor(Math.random() * 256);

function changeC() {
    return  "rgb(" + x + "," + y + "," + z + ")";
};

// Ecrire sur la page le nom et etc du client
var nomDuClient;

nomDuClient = localStorage.getItem("name") + " " + localStorage.getItem("prenom");

if (nomDuClient) {
    document.getElementById("nom-du-client").innerHTML = nomDuClient;
}

// Ecrire sur la page la date d'inscription sur le site mystery
document.getElementById('date-inscription').innerHTML = Date();

// L'evenement quand on clique sur l'icone de se déconnecter
let deconection = document.getElementById('deconection');
let liParametre = document.getElementById('li-parametre');
let lideconnection = document.getElementById('li-deconection');

// Les deux boutons de deconection (yes/no)
let noDeconection = document.getElementById('no-deconection');
let yesDeconection = document.getElementById('yes-deconection');
let header = document.getElementById('header');

lideconnection.addEventListener('click', function () {
    deconection.classList.add('open');
    body.style.position = "fixed";
    divClose.style.filter = "blur(2px)";
    header.style.filter = "blur(2px)";


    // Si le client ne veux pas se déconnecter, on ferme la petite fênetre
    noDeconection.addEventListener('click', function() {
        deconection.classList.remove('open');
        body.style.position = "relative";
        divClose.style.filter = "blur(0)";
    header.style.filter = "blur(0)";
    });

    // Si le client  veux se déconnecter, on se déconnecte du site mystery
    yesDeconection.addEventListener('click', function() {
        localStorage.clear();
        deconection.classList.remove('open');
        location.reload();
        body.style.position = "relative";
    });

});
*/
