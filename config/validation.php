<?php

return [
    'api' => [
        'game' => [
            'type' => [
                'name' => 'Type',
                'rules' => 'required|boolean',
                'messages' => ['required' => 'Type is required', 'boolean' => 'Type must be 0 or 1']
            ]
        ]
    ]
];