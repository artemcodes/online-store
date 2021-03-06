<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?= $breadcrumbs ?>
            </ol>
        </div>
    </div>
</div>

<?php
    $curr = \shop\App::$app->getProperty('currency');
    $categories = \shop\App::$app->getProperty('categories');
?>

<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <?php if($products): ?>
            <div class="prdt-top">
                <div class="col-md-9 prdt-left">
                    <div class="product-one">
                        <?php foreach ($products as $k => $item): ?>
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="product/<?= $item->alias ?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $item->img ?>" alt="<?= $item->title ?>" /></a>
                                    <div class="product-bottom">
                                        <h3><a href="product/<?= $item->alias ?>"><?= $item->title ?></a></h3>
                                        <p>Категория: <a href="category/<?=$categories[$item->category_id]['alias'] ?>"><?=$categories[$item->category_id]['title'] ?></a></p>
                                        <h4>
                                            <a class="item_add add-to-cart-link" data-id="<?= $item['id'] ?>" href="cart/add?id=<?= $item->id ?>"><i></i></a> <span class=" item_price">
                                        <?= $curr['symbol_left'] ?> <?= $item['price'] * $curr['value']  ?> <?= $curr['symbol_right'] ?>
                                                <?php if( $item['old_price'] ): ?>
                                                    <del> <?= $curr['symbol_left']?> <?=$item['old_price'] * $curr['value'] ?> <?= $curr['symbol_right']?></del>
                                                <?php endif; ?>
                                    </span>
                                        </h4>
                                    </div>

                                    <?php if( $item['old_price'] ) :
                                        $sale = ( ($item['price'] - $item['old_price']  ) / $item['old_price'] ) * 100 ?>
                                        <div class="srch"><span><?= round($sale, 2) ?> %</span></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <div class="text-center">
                           <p>Просмотрено товаров <?= count($products) ?> из <?= $total ?></p>
                            <?php if($pagination->countPages > 1): ?>
                            <?= $pagination ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 prdt-right">
                    <div class="w_sidebar">
                        <?php new \app\widgets\Filter\Filter(); ?>
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>
        <?php else: ?>
            <div class="alert alert-info mb-3">В данной категории товары временно отсутствуют.</div>
        <?php endif; ?>
    </div>
</div>
<!--product-end-->