<?php

namespace app\controllers;

use app\engine\App;

final class FeedbackController extends Controller
{

    public function actionAll() {

       $feedback_product =  App::call()->feedbackRepository->getAllFeedbackProduct();
       $feedback_site = App::call()->feedbackRepository->getAllFeedbackSite();

       // Поле формы добавить отзыв

       $feedback_answer =  App::call()->request->getParams()['feedback_answer'];
       $name =  App::call()->request->getParams()['name'];
       $textarea =  App::call()->request->getParams()['textarea'];



        // Если выбран сайт или товар

        if ($feedback_answer == 'site') {
            App::call()->feedbackRepository->feedback_site($name, $textarea);
            App::call()->session->set('message', 'Ваш отзыв добавлен');
            $message = App::call()->session->get('message');
            $unset = App::call()->session->get('message');
            unset($unset);
        }

        if  ($feedback_answer != 'site' & isset($name)) {
            App::call()->feedbackRepository->feedback_goods($name, $textarea, $feedback_answer);
            App::call()->session->set('message', 'Ваш отзыв добавлен');
            $message = App::call()->session->get('message');
            $unset = App::call()->session->get('message');
            unset($unset);
        }



        echo $this->render('feedback', [
            'feedback_product' => $feedback_product,
            'feedback_site' => $feedback_site,
            'message' => $message
        ]);
    }
}