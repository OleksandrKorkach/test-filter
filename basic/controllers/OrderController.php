<?php

namespace app\controllers;

use app\models\DateFilterForm;
use app\services\OrderService;
use Yii;
use yii\db\Query;
use yii\web\Controller;

class OrderController extends Controller
{

    public function actionIndex()
    {
        $dateFilter = new DateFilterForm();
        $orderService = new OrderService();

        $report = [];

        if ($dateFilter->load(Yii::$app->request->get()) && $dateFilter->validate()) {
            $report = $orderService->getReport($dateFilter->startDate, $dateFilter->endDate);
        }

        return $this->render('index', ['dateFilter' => $dateFilter, 'report' => $report]);
    }
}