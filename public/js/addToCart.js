/*document.addEventListener("DOMContentLoaded", function() {

    // Get the add to cart button
    let addToCartBtn = document.querySelector(".button-nfts");

    // Get the image that you want to hide
    let imageToHide = document.querySelector(".cd-single-img");

    addToCartBtn.addEventListener("click", function() {
        // Hide the image
        imageToHide.style.display = "none";
    });

});
*/
/*
document.addEventListener("DOMContentLoaded", function() {

    let addToCartBtn = document.querySelector(".button-nfts");

    addToCartBtn.addEventListener("click", function() {


        let cart = JSON.parse(localStorage.getItem("cart") || "[]");

        let artworkItem = {
            id: artwork.id,
            name: artwork.name,
            imageUrl: artwork.image_url,
            price: artwork.price
        };

        cart.push(artworkItem);

        localStorage.setItem("cart", JSON.stringify(cart));

        console.log("Artwork item to add:", artworkItem);
        cart.push(artworkItem);
        console.log("Cart after addition:", cart);

        alert("Artwork added to cart!");
    });

});*/
document.addEventListener("DOMContentLoaded", function() {
    let addToCartBtn = document.querySelector(".button-nfts");
    let artwork = window.artwork || {}; // Ensure artwork is defined globally on the window object.

    addToCartBtn.addEventListener("click", function() {
        let cart = JSON.parse(localStorage.getItem("cart") || "[]");
        let artworkItem = {
            id: artwork.id,
            name: artwork.name,
            imageUrl: artwork.image_url,
            price: artwork.price
        };

        cart.push(artworkItem);
        localStorage.setItem("cart", JSON.stringify(cart));

        console.log("Artwork item to add:", artworkItem);
        console.log("Cart after addition:", cart);

        alert("Artwork added to cart!");
    });
});


