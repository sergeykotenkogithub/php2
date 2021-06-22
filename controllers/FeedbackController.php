<?php

namespace app\controllers;

final class FeedbackController extends Controller
{
    public function actionFeedback() {
        echo $this->render('feedback');
    }
}