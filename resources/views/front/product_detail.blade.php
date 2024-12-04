@extends('front.layouts.layout') @section('content')

<div class="banner-tailors">
    <div class="container browse-tailors">
        <div class="row browse-content">
            <h1 class="text-white">Product Detail</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row product-detail-page">
        <div class="col-lg-6 product-summary-left">
            <!-- Main Product Image -->
            <div class="main-product-image">
                <img id="main-product-image" src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="Main Product" class="" />
            </div>

            <!-- Related Product Images -->
            <div class="related-product-images mt-3">
                <div class="row product-images-inner">
                    <div class="col-3 one related-product-one">
                        <a href="javascript:void(0);">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design1.png" alt="Related Product 1" class="related-product-img" />
                        </a>
                    </div>
                    <div class="col-3 one related-product-two">
                        <a href="javascript:void(0);">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design3.png" alt="Related Product 2" class="related-product-img" />
                        </a>
                    </div>
                    <div class="col-3 one related-product-three">
                        <a href="javascript:void(0);">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/tailor1.png" alt="Related Product 3" class="related-product-img" />
                        </a>
                    </div>
                    <div class="col-3 one related-product-four">
                        <a href="javascript:void(0);">
                            <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/category1.png" alt="Related Product 4" class="related-product-img" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 product-summary-right">
            <h1 class="product_title entry-title">Printed Green Shirt</h1>
            <p class="price"><span>$34.00</span>$32.00</p>
            <p class="dolor-text">Neque porro quisquam est, qui dolore ipsum quia dolor sit amet, consectetur adipisci velit, sed quia non incidunt lores ta porro ame. numquam eius modi tempora incidunt lores ta porro ame.</p>

            <div class="quantity">
                <div class="quantity-inner">
                    <button class="minus" aria-label="Decrease">&minus;</button>
                    <input type="number" class="input-box" value="1" min="1" max="10" />
                    <button class="plus" aria-label="Increase">&plus;</button>
                </div>
                <div class="add-to-cart-btn">
                    <a href="#" type="submit" name="add-to-cart" value="169" class="single_add_to_cart_button button alt">Add to cart</a>
                </div>
            </div>

            <p class="product-meta"><span>Category:</span>Tshirts</p>
            <h6>Free shipping on orders over $50!</h6>
            <ul class="refunds-text">
                <li><i class="fa fa-check-circle"></i>No-Risk Money Back Guarantee!</li>
                <li><i class="fa fa-check-circle"></i>No Hassle Refunds</li>
                <li><i class="fa fa-check-circle"></i>Secure Payments</li>
            </ul>
        </div>
    </div>

 
    <div class="container related-products-list">
        <h1 class="inner-detail-pdc">Related Products</h1>
   <img src="https://votivelaravel.in/tailor_hub/public/front_assets/images/Line.png">
        <div class="row related-products">
            <!-- Product 1 -->
            <div class="col-md-3 col-sm-6 product-item">
                <div class="product-wrap">
                    <div class="product-img img-zoom">
                        <a href="">
                            <img class="img-fluid w-100" src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="" />
                        </a>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="">Angel Boutique</a></h3>
                        <div class="product-price">
                            <span>$60.99</span>
                                                

                        </div>
                        <span class="review-rating">★★★★★</span>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-md-3 col-sm-6 product-item">
                <div class="product-wrap">
                    <div class="product-img img-zoom">
                        <a href="">
                            <img class="img-fluid w-100" src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design1.png" alt="" />
                        </a>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="">Angel Boutique</a></h3>
                        <div class="product-price">
                            <span>$60.99</span>
                                               

                        </div>

                         <span class="review-rating">★★★★★</span>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-md-3 col-sm-6 product-item">
                <div class="product-wrap">
                    <div class="product-img img-zoom">
                        <a href="">
                            <img class="img-fluid w-100" src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design2.png" alt="" />
                        </a>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="">Angel Boutique</a></h3>
                        <div class="product-price">
                            <span>$60.99</span>
                                                
                        </div>
                        <span class="review-rating">★★★★★</span>

                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-md-3 col-sm-6 product-item">
                <div class="product-wrap">
                    <div class="product-img img-zoom">
                        <a href="">
                            <img class="img-fluid w-100" src="https://votivelaravel.in/tailor_hub/public/front_assets/images/design3.png" alt="" />
                        </a>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="">Angel Boutique</a></h3>
                        <div class="product-price">
                            <span>$60.99</span>

                        </div>
                         <span class="review-rating">★★★★★</span>

                    </div>
                </div>
            </div>
        </div>
    </div>


   <div class="row reviews-details">
        <div class="reviews-point">
            <h2>Customer Reviews</h2>
         
            <div class="review">
                <div class="review-header">
                    <strong>John Doe</strong>
                    <span class="review-rating">★★★★★</span>
                </div>
                <p class="review-comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>

            <div class="review">
                <div class="review-header">
                    <strong>Jane Smith</strong>
                    <span class="review-rating">★★★★☆</span>
                </div>
                <p class="review-comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.

                </p>
            </div>

            <a href="#" class="see-all-reviews-btn">See All Reviews</a>
        </div>
    </div>

        </div>

    <script>
        // JavaScript to handle the click event
        document.querySelectorAll(".related-product-img").forEach((image) => {
            image.addEventListener("click", function () {
                const mainImage = document.getElementById("main-product-image");
                mainImage.src = this.src; // Update the main product image source
            });
        });
    </script>

    <script>
        (function () {
            const quantityContainer = document.querySelector(".quantity");
            const minusBtn = quantityContainer.querySelector(".minus");
            const plusBtn = quantityContainer.querySelector(".plus");
            const inputBox = quantityContainer.querySelector(".input-box");

            updateButtonStates();

            quantityContainer.addEventListener("click", handleButtonClick);
            inputBox.addEventListener("input", handleQuantityChange);

            function updateButtonStates() {
                const value = parseInt(inputBox.value);
                minusBtn.disabled = value <= 1;
                plusBtn.disabled = value >= parseInt(inputBox.max);
            }

            function handleButtonClick(event) {
                if (event.target.classList.contains("minus")) {
                    decreaseValue();
                } else if (event.target.classList.contains("plus")) {
                    increaseValue();
                }
            }

            function decreaseValue() {
                let value = parseInt(inputBox.value);
                value = isNaN(value) ? 1 : Math.max(value - 1, 1);
                inputBox.value = value;
                updateButtonStates();
                handleQuantityChange();
            }

            function increaseValue() {
                let value = parseInt(inputBox.value);
                value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
                inputBox.value = value;
                updateButtonStates();
                handleQuantityChange();
            }

            function handleQuantityChange() {
                let value = parseInt(inputBox.value);
                value = isNaN(value) ? 1 : value;

                // Execute your code here based on the updated quantity value
                console.log("Quantity changed:", value);
            }
        })();
    </script>

    @endsection

