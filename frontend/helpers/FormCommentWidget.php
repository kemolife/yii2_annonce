<?php

namespace frontend\helpers;

use common\models\Comments;
use yii\base\Widget;
class FormCommentWidget extends Widget
{
    public $annotation_id;

    public function run()
    {
        $model = new Comments();
        return $this->render('form',[
            'model' => $model,
            'annotation_id' => $this->annotation_id
        ]);
    }

}