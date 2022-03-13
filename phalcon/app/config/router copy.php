<?php

use Phalcon\Mvc\Micro;

$app = new Micro();

// Devolver datos en JSON
$app->get(
    '/check/status',
    function () {
        return $this
            ->response
            ->setJsonContent(
                [
                    'status' => 'important',
                ]
            );
    }
);

$app->handle();
