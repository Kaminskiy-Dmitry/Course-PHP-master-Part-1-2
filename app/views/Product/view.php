<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title"><?=$product['title']?></h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <?= $breadcrumbs ?>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Product Details Area Start -->
<?php
$curr = \shop\App::$app->getProperty('currency');
$cats = \shop\App::$app->getProperty('cats');
;?>
<div class="product-details-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        <?php if($gallery): ?>
                            <?php foreach ($gallery as $image): ?>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="public/assets/images/product-image/zoom-image/<?= $image->img?>"
                                         alt="">
                                </div>
                            <?php endforeach; ?>
                        <?php else:?>
                            <div class="swiper-slide">
                                <img class="img-responsive m-auto" src="public/assets/images/product-image/zoom-image/<?= $product->img?>"
                                     alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="swiper-container zoom-thumbs mt-3 mb-3">
                    <div class="swiper-wrapper">
                        <?php if($gallery): ?>
                            <?php foreach ($gallery as $image): ?>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="public/assets/images/product-image/small-image/<?= $image->img?>"
                                         alt="">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                <div class="product-details-content quickview-content">
                    <h2><?=$product['title']?></h2>
                    <div class="pricing-meta">
                        <ul>
                            <li style="color: #dc3545">
                                <span id="new-price" data-new-price="<?= round($product->price * $curr['value']) ?>"><?= $curr['symbol_left']?><?= round($product->price * $curr['value']) ?><?= $curr['symbol_right']?></span>
                            </li>
                            <?php if($product->old_price):?>
                            <span style="color: #0f0f0f">
                                <del><li><span id="old-price" data-old-price="<?= round($product->old_price * $curr['value']) ?>"><?= $curr['symbol_left']?><?= round($product->old_price * $curr['value']) ?><?= $curr['symbol_right']?></span></li></del>
                            <?php endif ?>
                            </span>
                        </ul>
                    </div>
                    <div class="pro-details-rating-wrap">
                        <div class="rating-product">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="read-review"><a class="reviews" href="#">( 5 Customer Review )</a></span>
                    </div>
                    <div class="mods"><?php if($mods) : ?>
                        <div class="pro-details-color-info d-flex align-items-center">
                                <span>Color</span>
                                <div class="pro-details-color">
                                    <select class="select-css">
                                        <option value="">Select color...</option>
                                        <?php foreach ($mods as $mod): ?>
                                            <option data-title="<?= $mod->color ?>"
                                                    data-price="<?= $mod->price * $curr['value']; ?>"
                                                    value="<?= $mod->id ?>"
                                            ><?= $mod->color ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="pro-details-size-info d-flex align-items-center">
                            <?php if ($mod->size != null): ?>
                                <span>Size</span>
                                <div class="pro-details-size">
                                    <select class="select-css">
                                        <option value="">Select size...</option>
                                        <?php foreach ($mods as $mod): ?>
                                            <option data-size="<?= $mod->size ?>"
                                                    data-price="<?= $mod->price * $curr['value']; ?>"
                                                    value="<?= $mod->id ?>"
                                            ><?= $mod->size ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endif ?></div>
                    <p class="m-0"><?=  $product->description ?></p>
                    <div class="pro-details-quality">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" min="1" step="1"/>
                        </div>
                        <div class="pro-details-cart">
                            <button id="productAdd" data-id="<?= $product->id ?>" class="add-cart add-to-cart-link" href="/card/add?id=<?= $product->id ?>"> Add To
                                Cart</button>
                        </div>
                        <div class="pro-details-compare-wishlist pro-details-wishlist ">
                            <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                        </div>
                        <div class="pro-details-compare-wishlist pro-details-compare">
                            <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                        </div>
                    </div>
                    <div class="pro-details-categories-info pro-details-same-style d-flex">
                        <span>Categories: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="/category/<?= $cats[$product->category_id]['alias']?>"><?= $cats[$product->category_id]['title']?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-social-info pro-details-same-style d-flex">
                        <span>Share: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- product details description area start -->
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-bs-toggle="tab" href="#des-details2">Information</a>
                <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                <a data-bs-toggle="tab" href="#des-details3">Reviews (02)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper text-start">
                        <p>
                            <?=$product['params']?>
                        </p>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>
                            <?=$product['content']?>
                        </p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="public/assets/images/review-image/1.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                euismod vehicula. Phasellus quam nisi, congue id nulla.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="public/assets/images/review-image/2.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                euismod vehicula.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <button class="btn btn-primary btn-hover-color-primary "
                                                            type="submit" value="Submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details description area end -->

<!-- Related product Area Start -->
<?php if($related): ?>
<div class="related-product-area pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30px0px line-height-1">
                    <h2 class="title m-0">Related Products</h2>
                </div>
            </div>
        </div>
        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
            <div class="new-product-wrapper swiper-wrapper">
                <?php foreach ($related as $item): ?>
                    <!-- Single Prodect -->
                    <div class="product">
                        <div class="thumb">
                            <a href="/product/<?= $item['alias'] ?>" class="image">
                                <img src="public/assets/images/product-image/<?= $item['img'] ?>" alt="Product"/>
                                <img class="hover-image" src="public/assets/images/product-image/<?= $item['img'] ?>"
                                     alt="Product"/>
                            </a>
                            <span class="badges">
                                <?php if ($item['label_id'] == 3): ?>
                                    <span class="new">New</span>
                                <?php endif ?>
                                <?php if ($item['label_id'] == 2): ?>
                                    <span class="new">Best</span>
                                <?php endif ?>
                                <?php if ($item['old_price'] > 0) : ?>
                                    <span class="sale"><?= round(($item['price'] / ($item['old_price'] / 100)) - 100) . '%' ?></span>
                                <?php endif ?>
                             </span>
                            <div class="actions">
                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                            class="pe-7s-like"></i></a>
                                <a href="#" class="action quickview" data-link-action="quickview"
                                   title="Quick view" data-bs-toggle="modal"
                                   data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                <a href="compare.html" class="action compare" title="Compare"><i
                                            class="pe-7s-refresh-2"></i></a>
                            </div>
                            <a title="Add To Cart" class=" add-to-cart add-to-cart-link"
                               href="/cart/add?id=<?= $item['id'] ?>" data-id="<?= $item['id'] ?>">
                                Add To Cart
                            </a>
                        </div>
                        <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                            <h5 class="title">
                                <a href="/product/<?= $item['alias'] ?>">
                                    <?= $item['title'] ?>
                                </a>
                            </h5>
                            <span class="price">
                                <?php if ($item['old_price'] > 0): ?>
                                    <span class="old"><?= $curr['symbol_left'] ?><?= round($item['old_price'] * $curr['value']) ?><?= $curr['symbol_right'] ?></span>
                                <?php endif ?>
                                <span class="new"><?= $curr['symbol_left'] ?><?= round($item['price'] * $curr['value']) ?><?= $curr['symbol_right'] ?></span>
                            </span>
                        </div>
                    </div>
                    <!-- Single Prodect -->
                <?php endforeach ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!-- Related product Area End -->
<?php endif; ?>

<!-- Recently product Area -->
<?php if($recentlyViewed): ?>
    <div class="related-product-area pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px line-height-1">
                        <h2 class="title m-0">Recently Products</h2>
                    </div>
                </div>
            </div>
            <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                <div class="new-product-wrapper swiper-wrapper">
                    <?php foreach ($recentlyViewed as $item): ?>
                        <!-- Single Prodect -->
                        <div class="product">
                            <div class="thumb">
                                <a href="/product/<?= $item['alias'] ?>" class="image">
                                    <img src="public/assets/images/product-image/<?= $item['img'] ?>" alt="Product"/>
                                    <img class="hover-image" src="public/assets/images/product-image/<?= $item['img'] ?>"
                                         alt="Product"/>
                                </a>
                                <span class="badges">
                                <?php if ($item['label_id'] == 3): ?>
                                    <span class="new">New</span>
                                <?php endif ?>
                                    <?php if ($item['label_id'] == 2): ?>
                                        <span class="new">Best</span>
                                    <?php endif ?>
                                    <?php if ($item['old_price'] > 0) : ?>
                                        <span class="sale"><?= round(($item['price'] / ($item['old_price'] / 100)) - 100) . '%' ?></span>
                                    <?php endif ?>
                             </span>
                                <div class="actions">
                                    <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                class="pe-7s-like"></i></a>
                                    <a href="#" class="action quickview" data-link-action="quickview"
                                       title="Quick view" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                    <a href="compare.html" class="action compare" title="Compare"><i
                                                class="pe-7s-refresh-2"></i></a>
                                </div>
                                <a title="Add To Cart" class=" add-to-cart add-to-cart-link"
                                   href="/cart/add?id=<?= $item['id'] ?>" data-id="<?= $item['id'] ?>">
                                    Add To Cart
                                </a>
                            </div>
                            <div class="content">
                                <span class="ratings">
                                    <span class="rating-wrap">
                                        <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">( 5 Review )</span>
                                </span>
                                <h5 class="title">
                                    <a href="/product/<?= $item['alias'] ?>">
                                        <?= $item['title'] ?>
                                    </a>
                                </h5>
                                <span class="price">
                                <?php if ($item['old_price'] > 0): ?>
                                    <span class="old"><?= $curr['symbol_left'] ?><?= round($item['old_price'] * $curr['value']) ?><?= $curr['symbol_right'] ?></span>
                                <?php endif ?>
                                <span class="new"><?= $curr['symbol_left'] ?><?= round($item['price'] * $curr['value']) ?><?= $curr['symbol_right'] ?></span>
                            </span>
                            </div>
                        </div>
                        <!-- Single Product -->
                    <?php endforeach ?>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recently product Area End -->
<?php endif; ?>
