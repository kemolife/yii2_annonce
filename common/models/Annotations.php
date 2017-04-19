<?php

namespace common\models;

/**
 * This is the model class for table "annotations".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $author
 * @property string $image
 * @property integer $status
 * @property string $date_create
 * @property string $date_update
 */
class Annotations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'annotations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'author', 'status'], 'required'],
            [['text'], 'string'],
            [['status'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['title'], 'string', 'max' => 100],
            ['image', 'file', 'extensions' => 'jpg, jpeg, gif, png'],
            [['author'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'author' => 'Author',
            'image' => 'Image',
            'status' => 'Status',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => '\yiidreamteam\upload\ImageUploadBehavior',
                'attribute' => 'image',
                'thumbs' => [
                    'thumb' => ['width' => 600, 'height' => 400],
                ],
                'filePath' => '@frontend/web/upload/annotations/[[pk]].[[extension]]',
                'fileUrl' => '/upload/annotations/[[pk]].[[extension]]',
                'thumbPath' => '@frontend/web/upload/annotations/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/upload/annotations/[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

    public function beforeSave($insert) {
        if($this->isNewRecord){
            $this->date_create = time();
            $this->date_update = time();
        }
        $this->date_update = time();

        return parent::beforeSave($insert);
    }
}
