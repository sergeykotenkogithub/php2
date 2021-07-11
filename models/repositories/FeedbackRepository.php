<?php


namespace app\models\repositories;

use app\engine\App;
use app\models\Repository;
use app\models\entities\Feedback;

class FeedbackRepository extends Repository
{
    protected function getTableName() {
        return 'feedback';
    }

    protected function getEntityClass() {
        return Feedback::class;
    }

    // Так как тут надо все с уловием where выводить
    public function getAllFeedbackSite() {
        $sql = "SELECT * FROM feedback WHERE it_is = 'site' ORDER BY id DESC";
        return App::call()->db->queryAll($sql, $this->getEntityClass());
    }

    public function getAllFeedbackProduct() {
        $sql = "SELECT * FROM feedback WHERE it_is = 'product' ORDER BY id DESC";
        return App::call()->db->queryAll($sql, $this->getEntityClass());
    }

    // Добавляет товар

    function feedback_site($name, $textarea) {
        $sql = "INSERT INTO feedback(`name`, feedback, it_is) VALUES ('$name', '$textarea', 'site')";
        return App::call()->db->executeSql($sql);
    }

    function feedback_goods($name, $textarea, $feedback_answer) {
        $sql = "INSERT INTO feedback(`name`, feedback, goods_id) VALUES ('$name', '$textarea', $feedback_answer)";
        return App::call()->db->executeSql($sql);
    }
}