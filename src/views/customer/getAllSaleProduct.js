$( document ).ready(function() {
    window.onload = function() {
        list_products();
    };
});

function list_products() {
    $.getJSON("../../controllers/customer/product-controller.php", function (data) {
        var read_products_html = ``;
        for (var i in data) {
            read_products_html += `
                <div class="text-sm">
                    <img src=` + data[i]["product_image"] +` alt="Product ` + i +` ">
                    <span class="flex flex-row space-x-8 mt-3"> 
                    <p class="font-bold">`+ data[i]["name"] +`</p>
                    <img class="w-5 h-5 object-contain" src="img/prd_list_heart.png" alt="heart">
                    </span>
                    <p class="text-gray-600">`+ data[i]["color_name"] +`</p>
                    <span class="flex flex-row space-x-10 items-center">
                        <p class="font-medium justify-start">`+ data[i]["price"] +` VND</p>
                        <button class=" bg-Cam_Ananas text-white font-medium px-2 py-2 rounded hover:bg-gradient-to-r hover:from-[#FFAE5C] hover:via-[#F15E2C] hover:to-[#F15E2C] focus:outline-none transition-all duration-300 ease-in-out">Mua ngay</button>
                    </span>
                </div>
            `        
        }
        
        $("#page-content-sale-product").html(read_products_html);
    });
}