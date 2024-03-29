<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<section id="advertisement">
    <div class="container">
        <?php echo \yii\helpers\Html::img('/images/shop/advertisement.jpg', ['alt' => 'advertisement', 'style' => ['width' => '60%', 'display' => 'block', 'margin' => 'auto']])  ?>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog category-products"><!--/category-products-->
                        <?php echo \frontend\components\MenuWidget::widget(['tpl' => 'menu']); ?>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Lenovo</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Xaomi</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Asus</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Apple</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Samsung</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>HP</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Dell</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <?php echo \yii\helpers\Html::img('/images/home/shipping.jpg', ['alt' => 'shipping', 'style' => ['width' => '100%']])  ?>
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <?php if (!empty($commodities)) : ?>
                        <h2 class="title text-center">You searched: <?php echo $q ?></h2>
                        <?php $cnt =0; ?>
                        <?php foreach ($commodities as $commodity ) : ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?php echo \yii\helpers\Html::img((!empty($commodity->lead_photo)) ?  '@web/' . $commodity->lead_photo : '@web/uploads/no-image.jpg', ['alt' => $commodity->title, 'style' => ['width' => '200px', 'height' => '200px']])  ?>
                                            <h2><?php echo $commodity->price ?> грн</h2>
                                            <p><a href="<?=\yii\helpers\Url::to(['commodities/view', 'id' => $commodity->id ])?>"><?php echo $commodity->title ?></a></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2><?php echo $commodity->price ?> грн</h2>
                                                <p><a href="<?=\yii\helpers\Url::to(['commodities/view', 'id' => $commodity->id ])?>"><?php echo $commodity->title ?></a></p>
                                                <a href="<?=\yii\helpers\Url::to(['commodities/view', 'id' => $commodity->id ])?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php $cnt++ ?>
                            <?php if ($cnt%3 == 0) : ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>

                        <?php
                        echo LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>

                    <?php else : ?>
                        <h2>There is nothing have found.</h2>
                    <?php endif; ?>

                    <div class="clearfix"></div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
