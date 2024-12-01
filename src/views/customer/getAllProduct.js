// A $( document ).ready() block.
$( document ).ready(function() {
    window.onload = function() {
        list_products();
        list_category();
    };
    // A function trigger on button click to go to the detail page with the product_item_id as parameter
    window.toDetail = function(product_item_id) {
        window.location.href = "product_detail.php?product_item_id=" + product_item_id;
    }
    
});


function list_products() {
    $.getJSON("../../controllers/customer/product-controller.php", function (data) {
        var read_products_html = ``;
        for (var i in data) {
            read_products_html += `
                    <ul class="flex flex-col text-sm">
                        <li><img src=` + data[i]["product_image"] +` alt="Product ` + i +` "></li>
                        <li>
                            <ul class="flex flex-row">
                                <li><p class="font-bold h-16 mt-3">`+ data[i]["name"] +`</p></li>
                                <li>
                                    <button id="heartButton" class="w-5 h-5 mt-3" onclick="toggleHeart(this)">
                                    <img src="img/prd_list_heart.png" alt="heart" class="heart-icon"/>
                                    </button>
                                </li>
                            </ul>
                        </li>
                        <li class="text-gray-600">`+ data[i]["color_name"] +`</li>
                        <li class="flex flex-row space-x-10 items-center">
                            <p class="font-medium justify-start">`+ data[i]["price"] +` VND</p>
                            <button onclick="toDetail(`+data[i].product_item_id+`)" class=" bg-Cam_Ananas text-white font-medium px-2 py-2 rounded hover:bg-gradient-to-r hover:from-[#FFAE5C] hover:via-[#F15E2C] hover:to-[#F15E2C] focus:outline-none transition-all duration-300 ease-in-out">Xem thêm</button>
                        </li>
                    </ul>
            `        
        }


        
        $("#page-content-product").html(read_products_html);
    });
}

function list_category() {
    $.getJSON("../../controllers/customer/category-controller.php", function (data) {
        var read_category_html = ``;
        for (var i in data) {
            read_category_html += `
                <li class="">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="option `+ i +`" class="form-checkbox h-5 w-5">
                        <label for="option `+ i +`" class="font-BeVietnam">`+ data[i]["category_name"] +`</label>
                    </div>
                </li> 
            `
        }
        
        $("#page-content-category").html(read_category_html);
    });
}
