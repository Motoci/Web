<?php

function bookTemplate($bookTitle, $bookPrice, $bookImage, $bookID) {
    $element = <<<HTML
        <a class="swiper-slide box" style="text-decoration: none">
        
            <div class="image">
              <img src=$bookImage alt="" />
            </div>
            
            <form action="index.php" method="post">
            <div class="content">
              <h3>$bookTitle</h3>
              <div class="price"> $bookPrice <span>$20.99</span></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="fa-solid fa-circle-plus"></i>
              </div>
            <button id="add-to-cart-button" type="submit" name="add">Click me</button>
            <input type="hidden" name="bookID" value="$bookID">
            </div>
            </form>
        </a>

HTML;
    echo $element;
}

function cartElement($bookTitle, $bookPrice, $bookImage, $bookID){
    $element = "
    
    <form action=\"shoppingCart.php?action=remove&id=$bookID\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$bookImage alt=\"\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$$bookTitle</h5>
                                <h5 class=\"pt-2\">$$bookPrice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}


