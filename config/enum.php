<?php

return [
    'language' => [
        'english'       => ['id' => 1, 'name' => 'English'],
        'hebrew'        => ['id' => 2, 'name' => 'Hebrew'],
        'french'        => ['id' => 3, 'name' => 'French'],
        'russian'       => ['id' => 4, 'name' => 'Russian']
    ],

    'sex' => [
        'male'          => ['id' => 1, 'name' => 'Male'],
        'female'        => ['id' => 2, 'name' => 'Female']
    ],

    'client_type' => [
        'legal'         => ['id' => 1, 'name' => 'Legal'],
        'individual'    => ['id' => 2, 'name' => 'Individual'],
        'lecsa'         => ['id' => 3, 'name' => 'LECSA'],
        'pinuy'         => ['id' => 4, 'name' => 'Pinuy']
    ],

    'role' => [
        'client'        => ['id' => 1, 'name' => 'Client'],
        'admin'         => ['id' => 2, 'name' => 'Admin']
    ],

    'country' => [
        'russia'        => ['id' => 1, 'name' => 'Russia'],
        'usa'           => ['id' => 2, 'name' => 'USA'],
        'france'        => ['id' => 3, 'name' => 'France'],
        'israel'        => ['id' => 4, 'name' => 'Israel'],
    ],

    'callback_request_status' => [
        'new'           => ['id' => 0, 'name' => 'New'],
        'processing'    => ['id' => 1, 'name' => 'Processing'],
        'completed'     => ['id' => 2, 'name' => 'Completed'],
    ],

    'task_manager_task_status' => [
        'processing'    => ['id' => 0, 'name' => 'Processing'],
        'completed'     => ['id' => 1, 'name' => 'Completed'],
        'canceled'      => ['id' => 2, 'name' => 'Canceled']
    ],

    'task_manager_task_type' => [
        'box_delivery'                      => ['id' => 1, 'name' => 'Box delivery'],
        'box_pickup'                        => ['id' => 2, 'name' => 'Box pickup'],
        'box_and_bulky_pickup'              => ['id' => 3, 'name' => 'Box and bulky items pickup'],
        'bulky_pickup'                      => ['id' => 4, 'name' => 'Bulky items pickup'],
        'partial_box_return'                => ['id' => 5, 'name' => 'Partial box return'],
        'partial_box_and_bulky_return'      => ['id' => 6, 'name' => 'Partial box and bulky items return'],
        'partial_bulky_return'              => ['id' => 7, 'name' => 'Partial bulky items return'],
        'complete_return_boxes'             => ['id' => 8, 'name' => 'Complete return of boxes'],
        'complete_return_boxes_and_bulky'   => ['id' => 9, 'name' => 'Complete return of boxes and bulky items'],
        'complete_return_bulky'             => ['id' => 10, 'name' => 'Complete return of bulky items'],
        'return_boxes_from_client'          => ['id' => 11, 'name' => 'Return of empty boxes from client'],
        'self_delivery_boxes_at_stock'      => ['id' => 12, 'name' => 'Self-delivery of boxes and/or bulky items at stock'],
        'pickup_boxes_from_stock_client'    => ['id' => 13, 'name' => 'Pickup of boxes and/or bulky items from stock by client'],
    ],

    'payment_status' => [
        'not_paid'      => ['id' => 1, 'name' => 'Not paid'],
        'part_paid'     => ['id' => 2, 'name' => 'Partially paid'],
        'paid'          => ['id' => 3, 'name' => 'Paid'],
        'declined'      => ['id' => 4, 'name' => 'Declined']
    ],

    'payment_type' => [
        'credit_card'       => ['id' => 1, 'name' => 'Credit card'],
        'cash'              => ['id' => 2, 'name' => 'Cash'],
        'check'             => ['id' => 3, 'name' => 'Check'],
        'bank_transfer'     => ['id' => 4, 'name' => 'Bank transfer'],
        'paypal'            => ['id' => 5, 'name' => 'PayPal']
    ],

    'order_status' => [
        'new'              => ['id' => 1, 'name' => 'New'],
        'confirmed'        => ['id' => 2, 'name' => 'Confirmed'],
        'active'           => ['id' => 3, 'name' => 'Active'],
        'finished'         => ['id' => 4, 'name' => 'Finished'],
        'canceled'         => ['id' => 5, 'name' => 'Canceled']
    ],

    'credit_type' => [
        'amex'              => ['id' => 1, 'name' => 'Аmex'],
        'master_card'       => ['id' => 2, 'name' => 'Master Card'],
        'visa'              => ['id' => 3, 'name' => 'Visa'],
        'isra_card'         => ['id' => 4, 'name' => 'Isracard'],
        'debit_card'        => ['id' => 5, 'name' => 'Debit Card'],
        'other_card'        => ['id' => 6, 'name' => 'Other Card']
    ],
];
