<?php
    //$this->title = 'One Article';
?>
<?php $this->beginBlock('block1');  ?>
    <h1>Заголовок страницы</h1>
<?php $this->endBlock('block1') ?>

<h1>Show Action</h1>
<?
//    foreach ($cats as $cat){
//        echo $cat->title . '<br>';
//    }
//foreach ($cats as $cat){
//    echo $cat['title'] .  '<br>';
//}
debug($cats);

?>


<button class="btn btn-success" id="btn">Click me...</button>

<?php //$this->registerJsFile('@web/js/script.js', ['depends' => 'yii\web\YiiAsset']) ?>

<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');", \yii\web\View::POS_LOAD) ?>
<?php //$this->registerCss('.container{background: #ccc;}'); ?>
<?php
    $js = <<<JS
        $('#btn').on('click', function(){
            $.ajax({
                url: 'index.php?r=post/index',
                data: {test: '123'},
                type: 'POST',
                success: function(res){
                    console.log(res);
                },
                error: function (){
                    alert('Error!');
                }
            });
        });
JS;
$this->registerJs($js);


?>



