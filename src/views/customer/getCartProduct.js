window.onload = function() {
    //var url = new URL(window.location.href);
    //var userId = url.searchParams.get("user_id");
    var userId = 1;
    if (userId) {
        const dataToSend = { key1: userId };

        fetch('../../controllers/customer/cart-controller.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataToSend),
        })
        .then(response => response.json())
        .then(product => {
            if (product.error) {
                console.error('Error:', product.error);
                document.getElementById("page-content-product").innerHTML = `<p>${product.error}</p>`;
            } else {
                const productHtml = product.map(product => {
                    return `
                            <!---item1-->
                            <li class="flex flex-row mt-5">
                                <ul class="flex flex-row space-x-3">
                                    <li class="flex w-1/6"><img class="w-18 h-18" src="../customer${product.product_image}" alt="item"></li>
                                    <li class="flex w-3/6">
                                        <ul>
                                            <Name_product class="font-bold">${product.name}</Name_product>
                                            <br>
                                            <Name_product class="font-bold">${product.color_name}</Name_product>
                                            <span class="flex flex-row space-x-3 mt-3"> 
                                                <!-- Kích cỡ -->
                                                <div class="flex flex-col space-y-2">
                                                    <select class="w-24 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500">
                                                        <option value="35">${product.size}</option>
                                                    </select>
                                                </div>
                                                <!-- Số lượng -->
                                                <div class="flex flex-col space-y-2">
                                                    <div class="flex items-center space-x-3">
                                                        <button class="px-2 py-1 text-gray-500 border border-gray-300 rounded-md hover:bg-gray-200" onclick="decreaseQuantity()">-</button>
                                                        <span id="quantity" class="text-gray-800 font-medium">${product.quantity}</span>
                                                        <button class="px-2 py-1 text-gray-500 border border-gray-300 rounded-md hover:bg-gray-200" onclick="increaseQuantity()">+</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </ul>
                                    </li>
                                    <li class="flex w-1/6"></li>
                                    <li class="flex w-2/6">
                                        <ul class="flex flex-col space-y-1 items-center">
                                            <li class="font-bold text-Cam_Ananas">${product.price} VND</li>
                                            <button class="flex items-center justify-center w-24 h-8 border border-black bg-white rounded-md hover:bg-gray-100">
                                                <img src="img/gio_hang_heart.png" alt="heart">
                                            </button>
                                            <!-- Updated Button with Data Attributes -->
                                            <button 
                                                class="flex items-center justify-center w-24 h-8 border border-black bg-black rounded-md delete-cart-item-button" 
                                                data-user-id="1" 
                                                data-product-item-id=${product.product_item_id}
                                            >
                                                <img src="img/gio_hang_bin.png" alt="Delete from cart">
                                            </button>
                                        </ul>
                                    </li>
                                </ul>
                                <div hidden>${product.product_item_id}</div>
                            </li><!--end item1-->
                    `;
                }).join('');

                document.getElementById("page-content-product").innerHTML = `${productHtml}`;
            }
        })
        .catch(error => {
            console.error('Error fetching product:', error);
        });

        fetch('../../controllers/customer/totalprice-controller.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataToSend),
        })
        .then(response => response.json())
        .then(product => {
            if (product.error) {
                console.error('Error:', product.error);
                document.getElementById("page-content-fullprice").innerHTML = `<p>${product.error}</p>`;
            } else {
                document.getElementById("page-content-fullprice").innerHTML = `
                    <li class="flex w-1/3">Đơn hàng</li>
                    <li class="flex w-1/3"></li>
                    <li class="font-bold flex ml-auto">${product.total_price} VND</li>
                `;

                document.getElementById("page-content-finalprice").innerHTML = `
                    <li class="flex w-1/3">Tạm tính</li>
                    <li class="flex w-1/3"></li>
                    <li class="font-bold flex ml-auto">${product.total_price} VND</li>
                `;
            }
        })
        .catch(error => {
            console.error('Error fetching product:', error);
        });
        // Event Delegation for Delete Buttons
        const productContainer = document.getElementById("page-content-product");
        productContainer.addEventListener('click', function(event) {
            const deleteButton = event.target.closest('.delete-cart-item-button');
            if (deleteButton) {
                const userId = deleteButton.getAttribute('data-user-id');
                const productItemId = deleteButton.getAttribute('data-product-item-id');

                console.log(`Delete button clicked for user_id: ${userId}, product_item_id: ${productItemId}`);

                // Confirm deletion with the user
                if (confirm('Are you sure you want to remove this item from your cart?')) {
                    deleteCartItem(userId, productItemId, deleteButton);
                }
            }
        });

        // ! Payment button
        document.getElementById('payment-button').addEventListener('click', function() {
            window.location.href = "payment.php";
        });
    }

    // Function to handle deletion of a cart item
    function deleteCartItem(userId, productItemId, buttonElement) {
        console.log(`Attempting to delete product_item_id: ${productItemId} for user_id: ${userId}`);
        
        fetch('../../controllers/customer/deletecart-controller.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                user_id: userId,
                product_item_id: productItemId
            })
        })
        .then(response => {
            console.log('Received response:', response);
            if (!response.ok) {
                throw new Error(`Network response was not ok (status: ${response.status})`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                alert(data.message);
                // Update the total price displayed on the page
                const totalPriceElement = document.getElementById('order-total-price');
                if (totalPriceElement) {
                    totalPriceElement.innerText = 'Total Price: ' + data.new_total_price;
                }
                // Remove the deleted item from the DOM
                const cartItem = buttonElement.closest('.cart-item');
                if (cartItem) {
                    cartItem.remove();
                }
            } else {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            if(confirm('Sản phẩm đã được xóa khỏi giỏ hàng.')){
                window.location.reload();  
            }
        });
        
    }


};



