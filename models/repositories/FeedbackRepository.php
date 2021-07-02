<?php


namespace app\models\repositories;

use app\models\Repository;

class FeedbackRepository extends Repository
{
    protected function getTableName() {
        return 'feedback';
    }

    protected function getEntityClass() {
        return Feedback::class;
    }
}