<?php

namespace Workplace\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /*
    public function toJson($error = null, $data = null, $code = Response::HTTP_OK):Response
    {
        $code = $error == null ? $code : $error['code'] ?? Response::HTTP_INTERNAL_SERVER_ERROR;
        $result = json_encode(['error' => $error['message'] ?? null, 'data' => $data]);
        $headers = ['Content-Type' => 'application/json'];
        return new Response($result, $code, $headers);
    }
    */
}
