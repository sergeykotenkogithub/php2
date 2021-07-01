<?php

namespace app\models\repositories;

use app\models\Registration;
use app\models\Repository;

class RegistrationRepository extends Repository
{
    protected function getTableName() {
        return 'registration';
    }

    protected function getEntityClass() {
        return Registration::class;
    }
}