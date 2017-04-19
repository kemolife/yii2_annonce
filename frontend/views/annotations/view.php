<?php
/**
 * @var $annotation common\models\Annotations
 * @var integer $countComments
 * @var  $comments common\models\Comments
 * @var  $comment common\models\Comments
 */

use frontend\helpers\Text;
?>
<section id="blog" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="<?= $annotation->getThumbFileUrl('image') ?>" width="100%" alt="" />
                        <div class="blog-content">
                            <h3><?= $annotation->title ?></h3>
                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <?= $annotation->author ?></span>
                                <span><i class="icon-calendar"></i> <?= date('d M Y',$annotation->date_update) ?></span>
                                <span><i class="icon-comment"></i> <?= $countComments ?> Коментарі </span>
                            </div>
                            <?= $annotation->text ?>
                            <p>&nbsp;</p>

                            <div id="comments">
                                <div id="comments-list">
                                    <h3><?= $countComments ?> Коментарі</h3>
                                    <?php foreach ($comments as $comment){ ?>
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="well">
                                                <div class="media-heading">
                                                    <strong><?= $comment->author ?></strong>&nbsp; <small><?= date('d M Y',$comment->date_create) ?></small>
                                                </div>
                                                <p><?= Text::getShort($comment->text, 400) ?></p>
                                            </div>
                                        </div>
                                    </div><!--/.media-->
                                    <?php } ?>
                                </div><!--/#comments-list-->
                                <?php echo frontend\helpers\FormCommentWidget::widget(['annotation_id' => $annotation->id]); ?>
                            </div><!--/#comments-->
                        </div>
                    </div><!--/.blog-item-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->