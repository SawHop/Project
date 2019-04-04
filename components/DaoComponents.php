<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 03.04.2019
 * Time: 20:36
 */

namespace app\components;


use app\base\BaseComponent;
use yii\db\Query;

class DaoComponents extends BaseComponent
{
    public function getDB()
    {
        return \Yii::$app->db;
    }

    /**
     * @throws \yii\db\Exception
     */
    public function getAllUsers()
    {
        $sql = 'select * from users;';

        return $this->getDB()->createCommand($sql)->queryAll();
    }

    public function getActivetyUsers($user_id)
    {
        $sql = 'select * from activity where user_id=:user;';
        return $this->getDB()->createCommand($sql, [':user' => $user_id])->queryAll();
    }

    public function getUser($user)
    {
        $query = new Query();
        return $query->select('*')
            ->from('users')
            ->andWhere(['id' => $user])->
            one();
    }

    public function getCountActivity()
    {
        $query = new Query();
        return $query->from('activity')->select('count(id) as cnt')
            ->scalar();
    }

    public function getReaderActivity()
    {
        $query = new Query();
        return $query->from('activity')
            ->createCommand()->query();
    }

    public function insertAndUpdate()
    {
        $trans = $this->getDb()->beginTransaction();
        try {
            $this->getDB()->createCommand()->insert('activity', ['title' => 'title',
                'date' => date('Y_m-d'), 'user_id' => 1])->execute();

            $this->getDB()->createCommand()->update('users', ['email' => mt_rand(1, 100) . '@test.ru'], ['id' => 1])->execute();
            $trans->commit();
        }catch (\Exception $e){
            \Yii::getLogger()->log($e->getMessage(), Logger::LEVEL_ERROR);
            $trans->rollBack();
        }
    }
}