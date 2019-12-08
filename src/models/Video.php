<?php

namespace fakof\dwte\models;

use fakof\dwte\queries\VideoQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%videos}}".
 *
 * @property int $id Идентификатор видео
 * @property int $is_sent Видео отправлено
 * @property int $is_moderated Пройдена модерация
 * @property int $user_id Пользователь
 * @property int $uploaded_at Дата загрузки
 * @property string $filename Название файла
 * @property string $filepath Путь к файлу
 * @property int $filetype_id Расширение файла
 * @property string $name Название видео
 * @property string $description Описание видео
 *
 * @property User $user
 */
class Video extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%videos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_sent', 'is_moderated', 'user_id', 'uploaded_at', 'filetype_id'], 'integer'],
            [['filename', 'filepath', 'filetype_id'], 'required'],
            [['filename'], 'string', 'max' => 32],
            [['filepath', 'name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор видео',
            'is_sent' => 'Видео отправлено',
            'is_moderated' => 'Пройдена модерация',
            'user_id' => 'Пользователь',
            'uploaded_at' => 'Дата загрузки',
            'filename' => 'Название файла',
            'filepath' => 'Путь к файлу',
            'filetype_id' => 'Расширение файла',
            'name' => 'Название видео',
            'description' => 'Описание видео',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoQuery(get_called_class());
    }
}
