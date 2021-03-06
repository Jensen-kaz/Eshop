<?php include ROOT . '/views/layouts/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach($categories as $categoryItem):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php foreach($latestProducts as $latestProductsItem):?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                 <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/template/images/home/product1.jpg" alt="" />
                                            <h2><?=$latestProductsItem['price'];?>$</h2>
                                        <p>
                                            <a href="/product/<?=$latestProductsItem['id'];?>">
                                                <?=$latestProductsItem['name'];?>
                                            </a>
                                        </p>
                                        <a href="#" class="btn btn-default add-to-cart " data_id="<?=$latestProductsItem['id']?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php if($latestProductsItem['is_new']): ?>
                                        <img src="/template/images/home/new.png" class="new" alt=""/>
                                    <?php endif; ?>
                                 </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div><!--features_items-->


                <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Рекомендуемые товары</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <div class="cycle-slideshow"
                         data-cycle-fx=carousel
                         data-cycle-timeout=5000
                         data-cycle-carousel-visible=3
                         data-cycle-carousel-fluid=true
                         data-cycle-slides="div.item"
                         data-cycle-prev="#prev"
                         data-cycle-next="#next"
                        >

                            <?php foreach ($recomendedProduct as $recomendedProductItem): ?>
                                <div class="item">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/recommend1.jpg" alt="" />
                                                <h2><?=$recomendedProductItem['price']?>$</h2>
                                                <p>
                                                    <a href="/product/<?=$recomendedProductItem['id']?>">
                                                    <?=$recomendedProductItem['name']?>
                                                    </a>
                                                </p>
                                                <a href="#" class="btn btn-default add-to-cart" data_id="<?=$recomendedProductItem['id']?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if($recomendedProductItem['is_new']): ?>
                                                <img src="/template/images/home/new.png" class="new" alt=""/>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        </div>

                    <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                        <!--/recommended_items-->
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>
