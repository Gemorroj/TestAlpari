<?php

namespace TestAlpari\Model\DrawResponse;

use Symfony\Component\HttpFoundation\JsonResponse;

class ErrorResponse extends JsonResponse
{
    public function __construct($message, $status = 200, array $headers = array(), $json = false)
    {
        parent::__construct(
            array(
                'success' => false,
                'message' => $message
            ),
            $status,
            $headers,
            $json
        );
    }
}
