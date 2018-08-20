<?php

require_once '../vendor/autoload.php';

$data = [
    'Some address' => [
        'sum' => [
            'mw-10' => [
                'p' => 100,
                'q' => 5,
            ],
            'p-1' => [
                'p' => 5,
                'q' => 4,
            ]
        ],
        'disc' => [
            'p-1' => [
                'p' => 5,
                'q' => 3,
                'd' => 50
            ]
        ]
    ]
];

$calculator = new \App\Model\PriceCalculator();
echo $calculator->calculate($data['Some address']) . PHP_EOL;

$calculator->add(
    $data['Some address'],
    'sum',
    'p-1',
    ['p' => 5,'q' => 6]
);
echo $calculator->calculate($data['Some address']) . PHP_EOL;