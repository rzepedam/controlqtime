<?php

return [
    'pdf' => [
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltopdf',
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

    'image' => [
        'enabled' => true,
        'binary'  => base_path() . '/vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64',
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],
];
