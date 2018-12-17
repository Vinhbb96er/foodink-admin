<?php

return [
    'store' => [
        'status' => [
            'pending' => 0,
            'accepted' => 1,
            'block' => 2,
        ],
    ],

    'shipper' => [
        'status' => [
            'offline' => 0,
            'online' => 1,
            'block' => 2,
        ],
    ],

    'role' => [
        'admin' => 1,
        'store_owner' => 2,
        'shipper' => 3,
        'customer' => 4,
    ]
];
