$(document).ready(() => {
    $(".product-list").on("click", (event) => {
        if($(event.target).hasClass("show_change"))
        {
            $(".change_conteiner").show();
            let product_id = $(".change_product_id").val(event.target.id);
            console.log($(".change_product_id").val());
        }
        
    });
    $(".close").on("click", (event) => {
        $(".change_conteiner").hide();
    })

})