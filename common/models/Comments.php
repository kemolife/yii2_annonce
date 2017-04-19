<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $annotation_id
 * @property string $author
 * @property string $email
 * @property string $text
 * @property integer $status
 * @property integer $date_create
 *
 * @property Annotations $annotation
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['annotation_id', 'author', 'text', 'email'], 'required'],
            [['annotation_id', 'status', 'date_create'], 'integer'],
            [['email'], 'email'],
            [['author'], 'string', 'max' => 100],
            [['text'], 'string', 'max' => 255],
            [['annotation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Annotations::className(), 'targetAttribute' => ['annotation_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'annotation_id' => 'Annotations',
            'email' => 'Email',
            'author' => 'Author',
            'text' => 'Text',
            'status' => 'Status',
            'date_create' => 'Date Create',
        ];
    }

    public function beforeSave($insert)
    {
        if($this->isNewRecord) {
            $this->date_create = time();
            $this->status = 0;
        }
        return parent::beforeSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnnotation()
    {
        return $this->hasOne(Annotations::className(), ['id' => 'annotation_id']);
    }
}
