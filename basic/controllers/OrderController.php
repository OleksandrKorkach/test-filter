<?php

namespace app\controllers;

use app\services\OrderService;
use app\utils\DateFilterForm;
use Yii;
use yii\web\Controller;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct($id, $module, OrderService $orderService, $config = [])
    {
        $this->orderService = $orderService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $dateFilter = new DateFilterForm();
        $report = [];

        if ($dateFilter->load(Yii::$app->request->get()) && $dateFilter->validate()) {
            $report = $this->orderService->getReport($dateFilter->startDate, $dateFilter->endDate);
        }

        return $this->render('index', ['dateFilter' => $dateFilter, 'report' => $report]);
    }
}