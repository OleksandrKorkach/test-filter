<?php

namespace app\services;

use app\enums\OrderStatus;
use yii\db\Query;

class OrderService
{
    public function getReport($startDate, $endDate)
    {
        $query = $this->createBaseQuery();
        $this->filterQuery($query, $startDate, $endDate);

        return $query->all();
    }

    private function createBaseQuery()
    {
        return (new Query())
            ->select([
                'agent',
                'SUM(CASE WHEN category = "disconnect" THEN 1 ELSE 0 END) as disconnect',
                'SUM(CASE WHEN category = "check_discount" THEN 1 ELSE 0 END) as check_discount',
                'SUM(CASE WHEN category = "technical_issue" THEN 1 ELSE 0 END) as technical_issue',
                'SUM(CASE WHEN category = "other" THEN 1 ELSE 0 END) as other',
                'COUNT(*) as total'
            ])
            ->from('order')
            ->groupBy('agent');
    }

    private function filterQuery(Query $query, $startDate, $endDate): void
    {
        $query->andWhere(['status' => OrderStatus::RESOLVED]);

        if ($startDate !== null) {
            $query->andFilterWhere(['>=', 'resolved_at', $startDate]);
        }

        if ($endDate !== null) {
            $query->andFilterWhere(['<=', 'resolved_at', $endDate]);
        }
    }
}