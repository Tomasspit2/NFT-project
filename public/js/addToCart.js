

/*document.addEventListener("DOMContentLoaded", function() {
    let addToCartBtn = document.querySelector(".button-nfts");

    if (addToCartBtn) {
        let name = window.name;
        let price = window.price;
        let image_url = window.image_url;
        console.log(name, price, image_url);

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
    }

    let goToCartButton = document.getElementById('goToCartButton');
    if (goToCartButton) {
        goToCartButton.addEventListener('click', function() {
            window.location.href = "/cart";
        });
    }
});
*/


document.addEventListener("DOMContentLoaded", function() {
    let addToCartBtn = document.querySelector(".button-nfts");

    if (addToCartBtn) {
        let name = window.name;
        let price = window.price;
        let image_url = window.image_url;
        console.log(name, price, image_url);

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
    }

    let goToCartButton = document.getElementById('goToCartButton');
    if (goToCartButton) {
        goToCartButton.addEventListener('click', function() {
            let cart = JSON.parse(localStorage.getItem("cart") || "[]");

            if (cart.length === 0) {
                alert("Your cart is empty.");
            } else {
                window.location.href = "/cart";
            }
        });
    }
});




