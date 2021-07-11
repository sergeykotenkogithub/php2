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
       $textarea_post =  App::call()->request->getParams()['textarea'];
       $textarea = trim($textarea_post); // обрезает пробелы в начале и в конце

        // Если выбран сайт или товар

        if (!empty($feedback_answer ) & !empty($name) & !empty($textarea)) {

            App::call()->session->set('message_feedback', 'Ваш отзыв добавлен');
            $message = App::call()->session->get('message_feedback');
            $unset = App::call()->session->get('message_feedback');
            unset($unset);

            if ($feedback_answer == 'site') {
                App::call()->feedbackRepository->feedback_site($name, $textarea);
            }

            if  ($feedback_answer != 'site' & isset($name)) {
                App::call()->feedbackRepository->feedback_goods($name, $textarea, $feedback_answer);
            }
        }


        echo $this->render('feedback', [
            'feedback_product' => $feedback_product,
            'feedback_site' => $feedback_site,
            'message' => $message
        ]);
    }
}