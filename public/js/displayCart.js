document.addEventListener("DOMContentLoaded", function() {
    let cart = JSON.parse(localStorage.getItem("cart") || "[]");
    console.log("Retrieved cart:", cart);
    let cartContainer = document.querySelector('#cart-container');

    let cartHTML = cart.map(artworkItem => `
        <div class="cart-item">
            <img src="${artworkItem.imageUrl}" alt="${artworkItem.name}">
            <p>${artworkItem.name}</p>
            <p>${artworkItem.price} euros</p>
        </div>
    `).join('');

    cartContainer.innerHTML = cartHTML;
    console.log(artworkItem)
});
