<?php
/**
 * @var $annotations common\models\Annotations
 * @var $annotation common\models\Annotations
 */

use yii\helpers\Url;
use frontend\helpers\Text;

?>
<section id="blog" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="blog">
                <?php foreach($annotations as $annotation){?>
                <div class="blog-item">
                    <img class="img-responsive img-blog" src="<?= $annotation->getThumbFileUrl('image', 'thumb'); ?>" width="100%" alt="" />
                    <div class="blog-content">
                        <a href="<?=Url::to(['annotations/view','id'=>$annotation->id])?>"><h3><?= $annotation->title ?></h3></a>
                        <div class="entry-meta">
                            <span><i class="icon-user"></i> <?= $annotation->author ?> </span>
                            <span><i class="icon-calendar"></i> <?= date('d M Y',$annotation->date_update) ?></span>
                            <span><i class="icon-comment"></i> <?= count(\common\models\Comments::find()->with('annotation')->where(['annotation_id' => $annotation->id])->all()) ?> Коментарі </span>
                        </div>
                        <p><?= Text::getShort($annotation->text, 400) ?></p>
                        <a class="btn btn-default" href="<?=Url::to(['annotations/view','id'=>$annotation->id])?>">Читати більше <i class="icon-angle-right"></i></a>
                    </div>
                </div><!--/.blog-item-->
                <?php } ?>
                <!--<ul class="pagination pagination-lg">
                    <li><a href="#"><i class="icon-angle-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="icon-angle-right"></i></a></li>
                </ul><!--/.pagination-->
            </div>
        </div><!--/.col-md-8-->
    </div><!--/.row-->
</section><!--/#blog-->