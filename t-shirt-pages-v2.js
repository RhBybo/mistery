// Choisir la couleur du t shirt - v2
window.addEventListener('click', function (event) {
    // Vérifier si le bouton qu'on clique est bien white
    if (event.target.dataset.color === 'white') {
        // Récupérer tous les données du t shirt
        const anyDiv = event.target.closest('.anyDiv');

        // Récupérer l'image du produit du t shirt et la changer
        const productImg = anyDiv.querySelector('[data-img]');
        productImg.src = "./img/petit-blanc.jpg";

        // Récupérer le nom de la couleur du t shirt et la changer
        const colorNameWhite = anyDiv.querySelector('[data-colorNameWhite]');
        const colorNameBlack = anyDiv.querySelector('[data-colorNameBlack]');

        colorNameWhite.style.color = '#66cca3';
        colorNameBlack.style.color = 'gray';
    }

    // Vérifier si le bouton qu'on clique est bien black
    if (event.target.dataset.color === 'black') {
        // Récupérer tous les données du t shirt
        const anyDiv = event.target.closest('.anyDiv');

        // Récupérer l'image du produit du t shirt et la changer
        const productImg = anyDiv.querySelector('[data-img]');
        productImg.src = "./img/petit-noir.jpg"

        // Récupérer le nom de la couleur du t shirt et la changer
        const colorNameWhite = anyDiv.querySelector('[data-colorNameWhite]');
        const colorNameBlack = anyDiv.querySelector('[data-colorNameBlack]');

        colorNameBlack.style.color = '#66cca3';
        colorNameWhite.style.color = 'gray';
    }
});

// Choisir la taille du t-shirt v4
window.addEventListener('click', function (event) {
    // Récupérer tous les données du t shirt
    const anyDiv = event.target.closest('.anyDiv');
    if (anyDiv) {
        const itemSize = anyDiv.querySelector('[data-real]');
        // Vérifier si le bouton qu'on clique est bien L
    if (event.target.dataset.size === 'L') {
        itemSize.innerHTML = 'L';
    }
    if (event.target.dataset.size === 'M') {

        itemSize.innerHTML = 'M';
    }

    }
});




// Choisir differents type de t-shirts que ce t-shirt dispose - v2
let imageRemove = document.querySelector('#t-shirt-classic-fit-one');

let exampleImgClassicFitOne = document.querySelector("#ex1-img-classic-fit-one");
let example2ImgClassicFitOne = document.querySelector("#ex2-img-classic-fit-one");
let example3ImgClassicFitOne = document.querySelector("#ex3-img-classic-fit-one");

exampleImgClassicFitOne.addEventListener('click', () => {
    imageRemove.src = "./img/example-img-classic-fit-one.jpg";
})

example2ImgClassicFitOne.addEventListener('click', () => {
    imageRemove.src = "./img/example2-img-classic-fit-one.jpg";
})

example3ImgClassicFitOne.addEventListener('click', () => {
    imageRemove.src = "./img/example3-img-classic-fit-one.jpg";
})

// Calculer le prix des produits ajoutés au panier
function calcCartPrice() {
    const cartItems = document.querySelectorAll('.tshirt-in-panier');
    let totalPrice = 0;

    cartItems.forEach(function(item) {
        // Le prix du produit séléctionné
        const priceEl = item.querySelector('.prix-du-t-shirt-au-panier').innerText;
        // Le prix total des produits séléctionnés
        const totalFinalPrice = document.querySelector('.total-price');

        const currentPrice = parseInt(priceEl);
        totalPrice += currentPrice;
        totalFinalPrice.innerHTML = totalPrice;
    })
}




// Boutton ajauter au panier - v2
window.addEventListener('click', function (event) {
    const panierOuvert = document.querySelector('.panierOuvert');

    // Savoir si le là où on click, il a un tel attribut etc...
    if (event.target.hasAttribute('data-cart')) {
        const card = event.target.closest('.anyDiv');

        // On récupére les données du t shirt
        productInfo = {
            id: card.dataset.id,
            title: card.querySelector('.item-title').innerText,
            imgSrc: card.querySelector('.product-img').getAttribute('src'),
            price: card.querySelector('.item-price').innerText,
            size: card.querySelector('.item-size').innerText
        }

        // Demander à l'utilisateur de choisir une taille
        var erreur;
        erreur = "";

        const anyDiv = event.target.closest('.anyDiv');
        const itemSize = anyDiv.querySelector('[data-real]');

        if (itemSize.innerText == '') {
            erreur = "Veuillez choisir une taille.";
        } else {
            erreur = "";

            // L'evenement quand on clique sur l'icone d'Ajouter au Panier

            // Connaître la couleur du t-shirt
            let nameColor = '';
            if (productInfo.imgSrc == './img/petit-blanc.jpg') {
                nameColor = 'Blanc';
            }
            if (productInfo.imgSrc == './img/petit-noir.jpg') {
                nameColor = 'Noir';
            }

            // L'evenement d'ajout au panier
            // Les données du t shirt
            const cardItemHTML = `
            <div class="tshirt-in-panier">
                <div class="img-part-panier">
                    <img src="${productInfo.imgSrc}" alt="Produit 1">
                </div>
                <div class="text-part-panier">
                    <p class="remove-payer-button">x</p>
                    <h4 class="nom-du-t-shirt-au-panier">${productInfo.title}</h4>
                    <span class="taille-du-t-shirt-au-panier" style="float: left;">${productInfo.size}</span>
                    <span data-priceTShirt class="prix-du-t-shirt-au-panier" style="float: right;">${productInfo.price}</span>
                </div>
            </div>`;

            const panierNoMess = document.getElementById('panier-no-mess');

            // Fonction fênetre popup
            const popupConfirmation = () => {
                if (window.confirm( `${card.querySelector('.item-title').innerText} option: ${card.dataset.id} a bien été ajouté dans le panier
                Consultez le panier OK ou revenir au magasin ANNULER` )) {
                    panierOuvert.insertAdjacentHTML('beforeend', cardItemHTML);
                    panierNoMess.style.display = 'none';
                    panierOuvert.classList.toggle("open");
                } else {
                    window.location.href = "men.html" // Envoyer sur une page du site qu'on veut
                }
            }

            // On déclare la variable "ProductEnregistrerDansLocalStorage"
            let ProductEnregistrerDansLocalStorage = JSON.parse(localStorage.getItem("produit"))
            // console.log(ProductEnregistrerDansLocalStorage)
            // Si y'a déjà des produits enregistré dans localStorage
            if (ProductEnregistrerDansLocalStorage) {
                ProductEnregistrerDansLocalStorage.push(productInfo);
                localStorage.setItem("produit", JSON.stringify(ProductEnregistrerDansLocalStorage));
                // console.log(ProductEnregistrerDansLocalStorage);
                popupConfirmation();
            }
            // Si y'a pas encore des produits enregistré dans localStorage
            else {
                ProductEnregistrerDansLocalStorage = [];
                ProductEnregistrerDansLocalStorage.push(productInfo);
                localStorage.setItem("produit", JSON.stringify(ProductEnregistrerDansLocalStorage));

                // console.log(ProductEnregistrerDansLocalStorage);
                popupConfirmation();
            }
            calcCartPrice();
        }
        // Récupérer tous les données du t shirt
        //
        // Récupérer l'image du produit du t shirt et la changer
        card.querySelector('[data-erreur]').innerHTML = erreur;
    }
});
