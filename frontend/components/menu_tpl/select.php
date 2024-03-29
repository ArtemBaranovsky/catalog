<li>
    <a href="<?php echo \yii\helpers\Url::to(['categories/view', 'id' => $category['id']]) ?>">
        <?php echo $category['title'] ?>
        <?php if ( isset($category['childs']) ) : ?>
            <span class="badge pull-right">
                <i class="fa fa-plus"></i>
            </span>
        <?php endif; ?>
    </a>
    <?php if ( isset($category['childs']) ) : ?>
        <ul>
            <?php echo $this->getMenuHtml($category['childs']) ?>
        </ul>
    <?php endif; ?>
</li>
