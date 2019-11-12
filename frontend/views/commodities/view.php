<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

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
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
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
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <?php echo \yii\helpers\Html::img((!empty($commodity->lead_photo)) ?  '@web/' . $commodity->lead_photo : '@web/uploads/no-image.jpg', ['alt' => $commodity->title, 'style' => ['height' => '381px']])  ?>

                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php foreach ($similars as $key => $similar) : ?>
                                    <?php if ($key % 3 == 0) : ?>
                                        <div class="item<?php echo ($key == 0) ? ' active': '' ?>">
                                    <?php endif; ?>
                                    <a href="<?=\yii\helpers\Url::to(['commodities/view', 'id' => $similar->id ])?>"><img style="width: 85px; height: 84px" src="/<?=(!empty($similar->lead_photo)) ? $similar->lead_photo : 'uploads/no-image.jpg' ?>" alt="" /></a>
                                    <?php if (($key +1) % 3 == 0) : ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="/images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2><?php echo $commodity->title ?></h2>
                            <p>Web ID: <?php echo $commodity->id ?></p>
                            <img src="/images/product-details/rating.png" alt="" />
                            <span>
									<span><?php echo $commodity->price ?> грн.</span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                            <p><b>Availability:</b> <?=($commodity->quantity) ? 'In Stock' : 'Not available' ?></p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand: </b><a href="<?=\yii\helpers\Url::to(['categories/view', 'id' => $commodity->category_id ])?>"><?php echo $commodity->category->title ?></a></p>
                            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                            <li><a href="#tag" data-toggle="tab">Tag</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus autem consequatur eveniet exercitationem harum hic, nemo numquam odio! Ab aliquam dolorem earum et in natus nesciunt provident quasi, repellendus soluta?</span><span>A accusamus accusantium aperiam asperiores autem consequuntur deserunt, dignissimos doloribus eos eveniet, excepturi explicabo ipsam magnam nesciunt, nisi omnis optio porro praesentium quae quisquam velit veritatis vero. Et, provident, vel!</span><span>Blanditiis incidunt non porro quae, soluta velit? Aut consequuntur doloremque, dolorum ducimus eligendi, est eveniet, explicabo hic magni modi molestiae pariatur possimus qui quod reprehenderit soluta ut veritatis voluptate voluptatibus.</span><span>Adipisci at, blanditiis consequuntur dolorem doloribus eos iusto laborum minus modi pariatur quasi quisquam quod voluptates. Consequatur dolorum exercitationem illo iste libero minima placeat porro ratione, sint sit ullam, vitae.</span>
                            </p>
                        </div>

                        <div class="tab-pane fade" id="companyprofile" >
                            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus autem consequatur eveniet exercitationem harum hic, nemo numquam odio! Ab aliquam dolorem earum et in natus nesciunt provident quasi, repellendus soluta?</span><span>A accusamus accusantium aperiam asperiores autem consequuntur deserunt, dignissimos doloribus eos eveniet, excepturi explicabo ipsam magnam nesciunt, nisi omnis optio porro praesentium quae quisquam velit veritatis vero. Et, provident, vel!</span><span>Blanditiis incidunt non porro quae, soluta velit? Aut consequuntur doloremque, dolorum ducimus eligendi, est eveniet, explicabo hic magni modi molestiae pariatur possimus qui quod reprehenderit soluta ut veritatis voluptate voluptatibus.</span><span>Adipisci at, blanditiis consequuntur dolorem doloribus eos iusto laborum minus modi pariatur quasi quisquam quod voluptates. Consequatur dolorum exercitationem illo iste libero minima placeat porro ratione, sint sit ullam, vitae.</span>
                            </p>
                        </div>

                        <div class="tab-pane fade" id="tag" >
                            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus autem consequatur eveniet exercitationem harum hic, nemo numquam odio! Ab aliquam dolorem earum et in natus nesciunt provident quasi, repellendus soluta?</span><span>A accusamus accusantium aperiam asperiores autem consequuntur deserunt, dignissimos doloribus eos eveniet, excepturi explicabo ipsam magnam nesciunt, nisi omnis optio porro praesentium quae quisquam velit veritatis vero. Et, provident, vel!</span><span>Blanditiis incidunt non porro quae, soluta velit? Aut consequuntur doloremque, dolorum ducimus eligendi, est eveniet, explicabo hic magni modi molestiae pariatur possimus qui quod reprehenderit soluta ut veritatis voluptate voluptatibus.</span><span>Adipisci at, blanditiis consequuntur dolorem doloribus eos iusto laborum minus modi pariatur quasi quisquam quod voluptates. Consequatur dolorum exercitationem illo iste libero minima placeat porro ratione, sint sit ullam, vitae.</span>
                            </p>
                        </div>

                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>NICK</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>10:11 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 OCT 2019</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>

                                <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="/images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($similars as $key => $similar) : ?>
                                <?php if ($key % 3 == 0) : ?>
                                    <div class="item<?php echo ($key == 0) ? ' active': '' ?>">
                                <?php endif; ?>

                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href=""><?=\yii\helpers\Html::img( (!empty($similar->lead_photo)) ? '/' .$similar->lead_photo : '/uploads/no-image.jpg', ['alt' => $similar->title, 'style' => ['max-height' => '134px', 'width' => 'auto']])?></a>

                                                <h2><?=$similar->price?> грн</h2>
                                                <p><?=$similar->title?></p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (($key +1) % 3 == 0) : ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
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