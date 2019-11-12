<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <?php for ($i=1; $i<4; $i++) : ?>
                        <div class="item <?=($i==1) ? 'active' : '' ?>">
                            <div class="col-sm-6">
                                <h1><span>E</span>-CATALOG</h1>
                                <h2>Products catalog prototype</h2>
                                <p>Простейший прототип каталога продуктов с базовой авторизацей. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/shop<?=$i ?>.jpg" class="shop img-responsive" alt="" />
<!--                                <img src="images/home/pricing.png"  class="pricing" alt="" />-->
                            </div>
                        </div>
                        <?php endfor; ?>
<!--                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-CATALOG</h1>
                                <h2>Products catalog prototype</h2>
                                <p>Простейший прототип каталога продуктов с базовой авторизацей. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/shop2.jpg" class="shop img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-CATALOG</h1>
                                <h2>Products catalog prototype</h2>
                                <p>Простейший прототип каталога продуктов с базовой авторизацей. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/shop3.jpg" class="shop img-responsive" alt="" />
                            </div>
                        </div>-->

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
<?php if (!Yii::$app->user->isGuest) : ?>
    <div class="container">
        <p><?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?></p>
    </div>
<?php endif; ?>
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
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <?php echo \yii\helpers\Html::img('/images/home/shipping.jpg', ['alt' => 'shipping', 'style' => ['width' => '100%']])  ?>
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <?php if ( !empty($items) ) : ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    <?php foreach($items as $item) : ?>

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php echo \yii\helpers\Html::img((!empty($item->lead_photo)) ?  '@web/' . $item->lead_photo : '@web/uploads/no-image.jpg', ['alt' => $item->title, 'style' => ['width' => '200px', 'height' => '200px']])  ?>
<!--                                    <h2>--><?php //echo $item->price ?><!-- грн</h2>-->
                                    <p><a href="<?=\yii\helpers\Url::to(['commodities/view', 'id' => $item->id ])?>"><?php echo $item->title ?></a></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
<!--                                        <h2>--><?php //echo $item->price ?><!-- грн</h2>-->
                                        <p><a href="<?=\yii\helpers\Url::to(['commodities/view', 'id' => $item->id ])?>"><?php echo $item->title ?></a></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>



                </div><!--features_items-->

                <?php endif; ?>

                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#notebooks" data-toggle="tab">Notebooks</a></li>
                            <li><a href="#smartphones" data-toggle="tab">Smartphones</a></li>
                            <li><a href="#hobby" data-toggle="tab">Hobby</a></li>
                            <li><a href="#tablets" data-toggle="tab">Tablets</a></li>
                            <li><a href="#gaming" data-toggle="tab">Gaming</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="notebooks" >
                            <?php foreach ($items as $item) : ?>
                            <?php if ($item->category_id == 1) :?>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?php echo \yii\helpers\Html::img((!empty($item->lead_photo)) ?   '/' .$item->lead_photo : '/uploads/no-image.jpg', ['alt' => $item->title, 'style' => ['height' => '85px', 'width' => 'auto']]) ?>
                                            <h2><?php echo $item['price']?> грн</h2>
                                            <p><?php echo $item['title']?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="tab-pane fade" id="smartphones" >
                            <?php foreach ($items as $item) : ?>
                                <?php if ($item->category_id == 8) :?>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php echo \yii\helpers\Html::img((!empty($item->lead_photo)) ?   '/' .$item->lead_photo : '/uploads/no-image.jpg', ['alt' => $item->title, 'style' => ['height' => '85px', 'width' => 'auto']]) ?>
                                                    <h2><?php echo $item['price']?> грн</h2>
                                                    <p><?php echo $item['title']?></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="tab-pane fade" id="hobby" >

                        <?php foreach ($items as $item) : ?>
                            <?php if ($item->category_id == 6) :?>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <?php echo \yii\helpers\Html::img((!empty($item->lead_photo)) ?   '/' .$item->lead_photo : '/uploads/no-image.jpg', ['alt' => $item->title, 'style' => ['height' => '85px', 'width' => 'auto']]) ?>
                                                <h2><?php echo $item['price']?> грн</h2>
                                                <p><?php echo $item['title']?></p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </div>

                        <div class="tab-pane fade" id="tablets" >
                            <?php foreach ($items as $item) : ?>
                                <?php if ($item->category_id == 10) :?>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php echo \yii\helpers\Html::img((!empty($item->lead_photo)) ?   '/' .$item->lead_photo : '/uploads/no-image.jpg', ['alt' => $item->title, 'style' => ['height' => '85px', 'width' => 'auto']]) ?>
                                                    <h2><?php echo $item['price']?> грн</h2>
                                                    <p><?php echo $item['title']?></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="tab-pane fade" id="gaming" >
                            <?php foreach ($items as $item) : ?>
                                <?php if ($item->category_id == 12) :?>
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php echo \yii\helpers\Html::img((!empty($item->lead_photo)) ?   '/' .$item->lead_photo : '/uploads/no-image.jpg', ['alt' => $item->title, 'style' => ['height' => '85px', 'width' => 'auto']]) ?>
                                                    <h2><?php echo $item['price']?> грн</h2>
                                                    <p><?php echo $item['title']?></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
<!--                        <div class="carousel-inner">
                            <?php /*foreach ($similars as $key => $similar) : */?>
                                <?php /*if ($key % 3 == 0) : */?>
                                    <div class="item<?php /*echo ($key == 0) ? ' active': '' */?>">
                                <?php /*endif; */?>

                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href=""><?/*=\yii\helpers\Html::img( (!empty($similar->lead_photo)) ? '/' .$similar->lead_photo : '/uploads/no-image.jpg', ['alt' => $similar->title, 'style' => ['max-height' => '134px', 'width' => 'auto']])*/?></a>

                                                <h2><?/*=$similar->price*/?> грн</h2>
                                                <p><?/*=$similar->title*/?></p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php /*if (($key +1) % 3 == 0) : */?>
                                    </div>
                                <?php /*endif; */?>
                            <?php /*endforeach; */?>

                        </div>-->
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

