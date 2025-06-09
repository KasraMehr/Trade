<?php

return [
    'plans' => [
        'basic' => [
            'name' => 'Basic',
            'minimum_investment' => 70,
            'daily_profit_min' => 2.3,
            'daily_profit_max' => 2.8,
            'duration_days' => 25,
            'features' => ['Capital Return'],
        ],
        'gold' => [
            'name' => 'Gold',
            'minimum_investment' => 500,
            'daily_profit_min' => 2.8,
            'daily_profit_max' => 3.4,
            'duration_days' => 28,
            'features' => ['Capital Return', 'Personal Manager'],
        ],
        'platinum' => [
            'name' => 'Platinum',
            'minimum_investment' => 2000,
            'daily_profit_min' => 3.4,
            'daily_profit_max' => 3.9,
            'duration_days' => 33,
            'features' => ['Capital Return', 'Personal Manager', 'Weekly Reports'],
        ],
        'professional' => [
            'name' => 'Professional',
            'minimum_investment' => 10000,
            'daily_profit_min' => 3.9,
            'daily_profit_max' => 4.5,
            'duration_days' => 39,
            'features' => ['Capital Return', 'Dedicated Team', 'Daily Reports', 'Priority Support'],
        ],
    ],
];
