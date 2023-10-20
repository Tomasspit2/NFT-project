

/*document.addEventListener("DOMContentLoaded", function() {
    let cart = JSON.parse(localStorage.getItem("cart") || "[]");
    let cartContainer = document.querySelector('#cart-container');

    function renderCart() {
        // Compute the total price of all items in the cart
        let total = cart.reduce((accumulator, artworkItem) => accumulator + Number(artworkItem.price), 0);

        let cartHTML = cart.map((artworkItem, index) => `
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">  <!-- Bootstrap responsive columns -->
            <div class="card mx-auto" style="width: 18rem;"> <!-- Bootstrap card -->
                <img src="${artworkItem.image_url}" alt="${artworkItem.name}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">${artworkItem.name}</h5>
                    <p class="card-text">${artworkItem.price} euros</p>    
                    <p class="card-firstname-lastname">${artworkItem.firstname} ${artworkItem.lastname}</p>
                    <button data-index="${index}" class="btn btn-danger delete-btn">Delete</button>
                </div>
            </div>
        </div>
    `).join('');

        cartContainer.innerHTML = `
    <div class="container cd-cart-container">
        <div class="row justify-content-center">
            ${cartHTML}
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h4>Total: ${total} euros</h4>
            </div>
        </div>
    </div>
    `;

        // Add event listeners to the delete buttons
        let deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                let index = e.target.getAttribute('data-index');
                cart.splice(index, 1); // Remove the item from the cart
                localStorage.setItem("cart", JSON.stringify(cart)); // Update localStorage
                renderCart(); // Re-render the cart
            });
        });
    }

    renderCart(); // Initial render
});

*/












document.addEventListener("DOMContentLoaded", function() {
    let cart = JSON.parse(localStorage.getItem("cart") || "[]");
    let cartContainer = document.querySelector('#cart-container');

    function renderCart() {
        // Compute the total price of all items in the cart
        let total = cart.reduce((accumulator, artworkItem) => accumulator + Number(artworkItem.price), 0);

        let cartHTML = cart.map((artworkItem, index) => `
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">  <!-- Bootstrap responsive columns -->
            <div class="card mx-auto" style="width: 18rem;"> <!-- Bootstrap card -->
                <img src="${artworkItem.image_url}" alt="${artworkItem.name}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">${artworkItem.name}</h5>
                    <p class="card-text">${artworkItem.price} euros</p>    
                    <p class="card-firstname-lastname">${artworkItem.firstname} ${artworkItem.lastname}</p>
                    <button data-index="${index}" class="btn btn-danger delete-btn">Delete</button>
                </div>
            </div>
        </div>
    `).join('');

        cartContainer.innerHTML = `
    <div class="container cd-cart-container">
        <div class="row justify-content-center">
            ${cartHTML}
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h4>Total: ${total} euros</h4>
                <button class="btn button-nfts mb-4" id="checkout-btn">Checkout</button> <!-- Checkout button -->
            </div>
        </div>
    </div>
    `;

        // Add event listeners to the delete buttons
        let deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                let index = e.target.getAttribute('data-index');
                cart.splice(index, 1); // Remove the item from the cart
                localStorage.setItem("cart", JSON.stringify(cart)); // Update localStorage
                renderCart(); // Re-render the cart
            });
        });

        // Add event listener to the checkout button
        document.querySelector('#checkout-btn').addEventListener('click', function() {
            alert('Proceeding to checkout!');
        });
    }

    renderCart(); // Initial render
});
