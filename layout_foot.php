 </div>
        <!-- /row -->
 
    </div>
    <!-- /container -->
 
<!-- jQuery library -->
<script src="libs/js/jquery.js"></script>
 
<!-- bootstrap JavaScript -->
<script src="libs/css/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="libs/css/bootstrap/docs-assets/js/holder.js"></script>
 
</body>
<script>
$(document).ready(function(){
    // add to cart button listener
    $('.add-to-cart-form').on('submit', function(){
 
        // info is in the table / single product layout
        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
 
        // redirect to add_to_cart.php, with parameter values to process the request
        window.location.href = "add_to_cart.php?id=" + id + "&quantity=" + quantity;
        return false;
    });
    
    // update quantity button listener
$('.update-quantity-form').on('submit', function(){
 
    // get basic information for updating the cart
    var id = $(this).find('.product-id').text();
    var quantity = $(this).find('.cart-quantity').val();
 
    // redirect to update_quantity.php, with parameter values to process the request
    window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
    return false;
});

// change product image on hover
$(document).on('mouseenter', '.product-img-thumb', function(){
    var data_img_id = $(this).attr('data-img-id');
    $('.product-img').hide();
    $('#product-img-'+data_img_id).show();
});
<?php
echo "<div class='col-md-5'>";
 
    echo "<div class='product-detail'>Price:</div>";
    echo "<h4 class='m-b-10px price-description'>&#36;" . number_format($product->price, 2, '.', ',') . "</h4>";
 
    echo "<div class='product-detail'>Product description:</div>";
    echo "<div class='m-b-10px'>";
        // make html
        $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));
 
        // show to user
        echo $page_description;
    echo "</div>";
 
    echo "<div class='product-detail'>Product category:</div>";
    echo "<div class='m-b-10px'>{$product->category_name}</div>";
 
echo "</div>";

echo "<div class='col-md-2'>";
 
    // to prevent null value
    $saved_cart_items=$saved_cart_items==null ? array() : $saved_cart_items;
 
    // if product was already added in the cart
    if(array_key_exists($id, $saved_cart_items)){
        echo "<div class='m-b-10px'>This product is already in your cart.</div>";
        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
            echo "Update Cart";
        echo "</a>";
 
    }
 
    // if product was not added to the cart yet
    else{
 
        echo "<form class='add-to-cart-form'>";
            // product id
            echo "<div class='product-id display-none'>{$id}</div>";
 
            echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
            echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' />";
 
            // enable add to cart button
            echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add to cart";
            echo "</button>";
 
        echo "</form>";
    }
echo "</div>";

?>
});
</script>
</html>
