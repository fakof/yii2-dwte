<?php

use yii\db\Migration;

/**
 * Class m191113_215105_init
 */
class m191113_215105_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = '';
        if ($this->db->driverName === 'mysql') {
            $options = 'CHARACTER SET utf8mb4 COLLATE=utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(11)->unsigned()->comment('Идентификатор пользователя'),
            'email' => $this->string(255)->notNull()->comment('E-mail'),
            'password' => $this->string(255)->notNull()->comment('Пароль'),
            'auth_key' => $this->string(255)->notNull()->comment('Ключ авторизации'),
            'access_token' => $this->string(255)->notNull()->comment('Токен авторизации'),
        ], $options);

        $this->createTable('{{%videos}}', [
            'id' => $this->primaryKey(11)->unsigned()->comment('Идентификатор видео'),
            'is_sent' => $this->boolean()->notNull()->defaultValue(false)->comment('Видео отправлено'),
            'is_moderated' => $this->boolean()->notNull()->defaultValue(false)->comment('Пройдена модерация'),
            'user_id' => $this->integer(11)->unsigned()->comment('Пользователь'),
            'uploaded_at' => $this->integer(11)->unsigned()->comment('Дата загрузки'),
            'filename' => $this->string(32)->notNull()->comment('Название файла'),
            'filepath' => $this->string(255)->notNull()->comment('Путь к файлу'),
            'filetype_id' => $this->tinyInteger(1)->unsigned()->notNull()->comment('Расширение файла'),
            'name' => $this->string(255)->defaultValue('Без названия')->comment('Название видео'),
            'description' => $this->string(500)->comment('Описание видео'),
        ], $options);

        $this->createIndex('ui--users-email', '{{%users}}', 'email', true);
        $this->createIndex('ui--users-auth_key', '{{%users}}', 'auth_key', true);
        $this->createIndex('ui--users-access_token', '{{%users}}', 'access_token', true);
        $this->createIndex('index--users-email-auth_key-access_token', '{{%users}}', ['auth_key', 'email', 'access_token']);

        $this->addForeignKey('fk--videos-user_id--users-id', '{{%videos}}', 'user_id',
            '{{%users}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%videos}}');
        $this->dropTable('{{%users}}');
    }
}
