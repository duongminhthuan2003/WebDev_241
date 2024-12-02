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
                            <li>
                                <ul class="flex flex-row space-x-3">
                                    <li><img class="w-28 h-28" src="../customer${product.product_image}" alt="item"></li>
                                    <li>
                                        <ul class="flex flex-col">
                                            <li class="">${product.name}</li>
                                            <li class="text-gray-300">Kích cỡ: ${product.size}</li>
                                            <li class="text-gray-300">Số lượng: ${product.quantity}</li>
                                        </ul>
                                    </li>
                                    <li class="flex items-end">${product.price} VNĐ</li>
                                </ul>
                            </li>
                            <li class="flex justify-center"><hr class="border-t border-gray-400 mt-5 mb-5 w-96"></li>
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
                var final_price = parseInt(product.total_price);
                final_price = final_price + 30000;
                document.getElementById("page-content-fullprice").innerHTML = `
                    <li class="mt-5"> 
                        <ul class="flex flex-row">
                            <li class="flex w-1/3 font-bold">Tạm tính</li>
                            <li class="flex w-1/3"></li>
                            <li class=" flex ml-auto">${product.total_price} VNĐ</li>
                        </ul>
                    </li>
                    <li class="mt-2">
                        <ul class="flex flex-row">
                            <li class="font-bold flex w-1/3">Phí vận chuyển</li>
                            <li class="flex w-1/3"></li>
                            <li class="flex ml-auto">30000 VNĐ</li>
                        </ul>
                    </li>
                    <li class="mt-2">
                        <ul class="flex flex-row">
                            <li class="font-bold flex w-1/3">Giảm giá</li>
                            <li class="flex w-1/3"></li>
                            <li class="flex ml-auto">0 VNĐ</li>
                        </ul>
                    </li>
                    <li class="flex justify-center"><hr class="border-t border-gray-400 mt-5 w-96"></li>
                    <li class="mt-5">
                        <ul class="flex flex-row">
                            <li class="font-bold flex w-1/3">Thành tiền</li>
                            <li class="flex w-1/3"></li>
                            <li class="flex ml-auto">${final_price} VND</li>
                        </ul>
                    </li>

                `;
            }
        })
        .catch(error => {
            console.error('Error fetching product:', error);
        });

        // ! Payment button
        document.getElementById('payment-form').addEventListener('submit', function(event) {
            event.preventDefault();
        
            const province = document.getElementById('province').value;
            const district = document.getElementById('district').value;
            const ward = document.getElementById('ward').value;
            const address = document.getElementById('address').value;
        
            const data = { province, district, ward, address, userId };
        
            fetch('../../controllers/customer/payment-controller.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    if (alert('Thanh toán thành công.'))
                    {
                        window.location.href = "product_list.php";
                    }
                    
                } else {
                    alert('Error: ' + result.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error:', error);
            });
        });

        // ! Cancel button
        document.getElementById('cancel-button').addEventListener('click', function() {
            window.location.href = "gio_hang.php";
        });
    }
};



