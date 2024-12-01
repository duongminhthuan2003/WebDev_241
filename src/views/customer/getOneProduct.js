window.onload = function() {
    var url = new URL(window.location.href);
    var productItemId = url.searchParams.get("product_item_id");

    if (productItemId) {
        const dataToSend = { key1: productItemId };

        fetch('../../controllers/customer/detail-controller.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataToSend),
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error:', data.error);
                document.getElementById("page-content-detail").innerHTML = `<p>${data.error}</p>`;
            } else {
                // Split the description into sentences
                const sentences = data.description.split('.').filter(sentence => sentence.trim() !== '');
                const descriptionListItems = sentences.map(sentence => `<li>${sentence.trim()}.</li>`).join('');

                document.getElementById("page-content-detail-image").innerHTML = `
                    <col1><img src=${data.product_image} alt="product" style="height: 450px; width: 450px"></col1>
                `;
                document.getElementById("page-content-detail").innerHTML = `
                    <ul>
                        <li class="font-bold text-2xl">${data.name}</li>
                        <li>Màu sắc: ${data.color_name}</li>
                        <li class="font-bold text-Cam_Ananas text-2xl mt-4">${data.price} VNĐ</li>
                    </ul>
                `;
                document.getElementById("page-content-detail-description").innerHTML = `
                            <li class="font-bold">MÔ TẢ SẢN PHẨM</li>
                            <li>
                                <ul class="space-y-2 list-disc pl-5">${descriptionListItems}</ul>
                            </li>
                            <li class="font-bold">BẢNG CHỌN SIZE</li>
                `;

                document.getElementById("page-product-color").innerHTML = `
                                    <label for="color" class="font-semibold text-gray-800">Color</label>
                                    <select id="color" name="color" class="border border-gray-300 rounded-md px-2 py-1" required>
                                        <option value='${data.color_name}'>${data.color_name}</option>
                                        <option value="Red">Red</option>
                                        <option value="Green">Green</option>
                                        <option value="Black">Black</option>
                                        <option value="White">White</option>
                                    </select>
                `;

                fetch('../../controllers/customer/userreview-controller.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(dataToSend),
                })
                .then(response => response.json())
                .then(reviews => {
                    if (reviews.error) {
                        console.error('Error:', reviews.error);
                        document.getElementById("reviews-section").innerHTML = `<p>${reviews.error}</p>`;
                    } else {
                        const reviewsHtml = reviews.map(review => {
                            const starsHtml = Array.from({ length: 5 }, (_, i) => {
                                const starClass = i < review.rating ? 'text-Cam_Ananas' : 'text-gray-300';
                                return `<span data-value="${i + 1}" class="star ${starClass} text-xl">★</span>`;
                            }).join('');

                            return `
                                <li>
                                    <ul class="flex space-x-64">
                                        <li>
                                            <p class="font-bold text-gray-900">${review.user_name}</p>
                                        </li>
                                        <li class="pr-0">
                                            <div id="stars-container" class="flex justify-center">
                                                ${starsHtml}
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="text-sm text-gray-500">${new Date(review.creat_at).toLocaleDateString()}</p>
                                    <p>${review.content}</p>
                                </li>
                            `;
                        }).join('');

                        document.getElementById("reviews-section").innerHTML = `${reviewsHtml}`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching reviews:', error);
                });
            }
        })
        .catch(error => {
            console.error('Error sending data:', error);
        });
    }
    
    document.getElementById('add-to-cart-button').addEventListener('click', function() {
        const form = document.getElementById('add-to-cart-form');
        const formData = new FormData(form);
        console.log('Form data:', formData);
        fetch('../../controllers/customer/addtocart-controller.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                if (alert('Thêm vào giỏ hàng thành công.'))
                {
                    window.location.href = "product_list.php";
                }
                
            } else {
                alert('Error: ' + result.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while adding the product to the cart.');
        });
    });
};