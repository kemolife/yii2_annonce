<?php

namespace frontend\controllers;

use common\models\Comments;
use Yii;
use common\models\Annotations;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class AnnotationsController extends Controller
{

    public function actionIndex()
    {
        $annotations = Annotations::find()->where(['status' => 1])->all();
        return $this->render('index',
        [
            'annotations' => $annotations
        ]);
    }

    public function actionView($id)
    {
        $model = new Comments();
        $annotation = Annotations::find()->where(['id' => $id, 'status' => 1])->one();
        $comments = Comments::find()->with('annotation')->where(['annotation_id' => $id,'status' => 1])->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }

        return $this->render('view', [
            'annotation' => $annotation,
            'comments' => $comments,
            'countComments' => count($comments)
        ]);
    }


}