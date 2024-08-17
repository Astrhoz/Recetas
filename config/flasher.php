<?php // config/flasher.php

return [
    'plugins' => [
        'noty' => [
            'scripts' => [
                '/vendor/flasher/noty.min.js',
                '/vendor/flasher/flasher-noty.min.js'
            ],
            'styles' => [
                '/vendor/flasher/noty.css',
                '/vendor/flasher/mint.css'
            ],
            'options' => [
                // Optional: Add global options here
                'layout' => 'topRight'
            ],
        ],
    ],
];