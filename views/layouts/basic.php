<?php

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?>

    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><?= Html::a('Home', '/web/')?></li>
            <li role="presentation"><?= Html::a('Articles', ['post/index'])?></li>
            <li role="presentation"><?= Html::a('Article', ['post/show'])?></li>
        </ul>

        <? if (isset($this->blocks['block1'])): ?>
            <? echo $this->blocks['block1'] ?>
        <? endif; ?>

        <?=$content ?>

    </div>
</div>



<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>