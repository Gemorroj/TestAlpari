<?php

namespace TestAlpari\Model\DrawResponse;

use Symfony\Component\HttpFoundation\JsonResponse;

class SuccessResponse extends JsonResponse
{
    public function __construct($data = null, $status = 200, array $headers = array(), $json = false)
    {
        parent::__construct(
            array(
                'success' => true,
                'data' => $data
            ),
            $status,
            $headers,
            $json
        );
    }
}
