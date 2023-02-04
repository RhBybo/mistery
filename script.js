const panier = document.querySelector('.panier');
const panierOuvert = document.querySelector('.panierOuvert');

const panierNoMess = document.getElementById('panier-no-mess');
const removePayerButton = document.querySelector('remove-payer-button');

panier.addEventListener('click', function() {
    panierOuvert.classList.toggle("open");
});


    

// A REVOIR TOUT CE BORDEL, C'EST VRAIMENT NUL
window.addEventListener('click', function (event) {
    if (event.target.closest('.remove-payer-button')) {

        // Le prix du produit séléctionné 
        const idk = event.target.closest('.tshirt-in-panier');
        const priceEl = idk.querySelector('[data-priceTShirt]').innerText.slice(0, -1);
        
        // Le prix total des produits séléctionnés
        let totalFinalPrice = document.querySelector('.total-price');

        // Calculer le prix total du t-shirt
        let actualPrice = parseInt(totalFinalPrice.innerText) - parseInt(priceEl);

        // Afficher sur la page
        totalFinalPrice.innerHTML = actualPrice;
    
        // Supprimer les données du produit
        event.target.closest('.tshirt-in-panier').remove();
        
        
        localStorage.removeItem('id-tshirt', productInfo.id);
        localStorage.removeItem('imgSrc-tshirt', productInfo.imgSrc);
        localStorage.removeItem('title-tshirt', productInfo.title);
        localStorage.removeItem('price-tshirt', productInfo.price);
        localStorage.removeItem('size-tshirt', productInfo.size);
    };
    

});


// Valider le panier et se diriger vers payer
/*
const payer = document.querySelector('.payer');

payer.addEventListener('click', () => {
    fetch("/create-checkout-session", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            items: [
                {id: 1, quatify: 3},
                {id: 2, quatify: 1}
            ],
        }),
    })
    .then(res => {
        if(res.ok) return res.json()
        return res.json().then(json => Promise.reject(json))
    }).then(({ url }) => {
        console.log(url)
        // window.location = url
    }).catch(e => {
        console.error(e.error)
    })
    console.log('Hello There')
});*/