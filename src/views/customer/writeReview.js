window.onload = function() {
    var url = new URL(window.location.href);
    // var productItemId = url.searchParams.get("product_item_id");
    var productItemId = 3;
    var userId = 1;
    if (productItemId) {
        const dataToSend = { key1: productItemId };
        fetch('../../controllers/customer/getproductreview-controller.php', {
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
                document.getElementById("page-content-product").innerHTML = `<p>${data.error}</p>`;
            } else {
                document.getElementById("page-content-product").innerHTML = `
                    <ul class="flex flex-row items-center space-x-3">
                        <li><img class="w-32 h-32" src=${data.product_image} alt="sản phẩm"></li>
                        <li class="space-y-3">
                            <p class="font-bold">${data.name}</p>
                            <p class="text-Cam_Ananas">${data.price} VND</p>
                        </li>
                    </ul>
                `;

            }
        })
        .catch(error => {
            console.error('Error sending data:', error);
        });
    }

    document.getElementById('review-form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const rating = currentRating;
        const content = document.getElementById('content').value;

        const data = { userId, productItemId, rating, content };
        fetch('../../controllers/customer/write_review-controller.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                if (alert('Bình luận thành công.'))
                {
                    window.location.href = "product_list.php";
                }
                
            } else {
                alert('Error: ' + result.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Bình luận thất bại');
        });
    });

    // ! Cancel button
    document.getElementById('cancel-button').addEventListener('click', function() {
        window.location.href = "product_list.php";
    });

};