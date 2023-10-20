/*document.addEventListener("DOMContentLoaded", function() {
    let cart = JSON.parse(localStorage.getItem("cart") || "[]");
    console.log("Retrieved cart:", cart);
    let cartContainer = document.querySelector('#cart-container');

    let cartHTML = cart.map(artworkItem => `
    <div class="cart-item">
        <img src="${artworkItem.image_url}" alt="${artworkItem.name}">
        <p>${artworkItem.name}</p>
        <p>${artworkItem.price} euros</p>
    </div>
`).join('');

    cartContainer.innerHTML = cartHTML;

});*/


document.addEventListener("DOMContentLoaded", function() {
    let cart = JSON.parse(localStorage.getItem("cart") || "[]");
    console.log("Retrieved cart:", cart);
    let cartContainer = document.querySelector('#cart-container');

    let cartHTML = cart.map(artworkItem => `
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">  <!-- Bootstrap responsive columns -->
        <div class="card mx-auto" style="width: 18rem;"> <!-- Bootstrap card -->
            <img src="${artworkItem.image_url}" alt="${artworkItem.name}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">${artworkItem.name}</h5>
                <p class="card-text">${artworkItem.price} euros</p>
            </div>
        </div>
    </div>
`).join('');

    cartContainer.innerHTML = `
<div class="container cd-cart-container">
    <div class="row justify-content-center">
        ${cartHTML}
    </div>
</div>
`;
});

