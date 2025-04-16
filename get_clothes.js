// Function to fetch and display clothes
function displayClothes() {
    fetch('get_clothes.php')
    .then(response => response.json())
    .then(data => {
        // Get the element where products will be displayed
        const productContainer = document.querySelector('.center-text');

        // Iterate over each product and create HTML elements to display them
        data.forEach(product => {
            // Create a div element for the product card
            const productCard = document.createElement('div');
            productCard.classList.add('box');

            // Create a div element for the product image
            const slideImg = document.createElement('div');
            slideImg.classList.add('slide-img');

            // Create an img element for the product image
            const img = document.createElement('img');
            img.src = product.image;
            img.alt = product.name;

            // Append the img element to the slideImg div
            slideImg.appendChild(img);

            // Create a div element for the product details
            const detailBox = document.createElement('div');
            detailBox.classList.add('detail-box');

            // Create a div element for the product type
            const type = document.createElement('div');
            type.classList.add('type');

            // Create a span element for the product name
            const productName = document.createElement('span');
            productName.textContent = product.name;

            // Create a span element for the product price
            const productPrice = document.createElement('span');
            productPrice.classList.add('pricetag');
            productPrice.textContent = `Ksh ${product.price}`;

            // Append the product name and price to the type div
            type.appendChild(productName);
            type.appendChild(productPrice);

            // Append the type div to the detailBox div
            detailBox.appendChild(type);

            // Append the slideImg and detailBox divs to the productCard div
            productCard.appendChild(slideImg);
            productCard.appendChild(detailBox);

            // Append the productCard to the productContainer
            productContainer.appendChild(productCard);
        });
    })
    .catch(error => console.error('Error fetching clothes:', error));
}

// Call the function to display clothes when the page loads
window.onload = displayClothes;
