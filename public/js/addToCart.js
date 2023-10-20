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
    let name = window.name; // Ensure artwork is defined globally on the window object.
    let price = window.price
    let image_url = window.image_url
    console.log(name, price, image_url)

    addToCartBtn.addEventListener("click", function() {
        let cart = JSON.parse(localStorage.getItem("cart") || "[]");
        let artworkItem = {
            name,
            image_url,
            price,
        };

        cart.push(artworkItem);
        localStorage.setItem("cart", JSON.stringify(cart));

        console.log("Artwork item to add:", artworkItem);
        console.log("Cart after addition:", cart);

        alert("Artwork added to cart!");
    });
});

document.getElementById('goToCartButton').addEventListener('click', function() {
    window.location.href = "/cart";
});


