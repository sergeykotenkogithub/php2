<?php

namespace app\controllers;

final class FeedbackController extends Controller
{
    public function actionAll() {
        echo $this->render('feedback');
    }
}