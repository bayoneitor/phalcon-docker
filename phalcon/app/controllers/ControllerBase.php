<?php

declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class ControllerBase extends Controller
{
    static function getValueFromArrayWithOtherValue(array $arrayToBeSearched, $keySearch, $valueSearch, $keyGet)
    {
        $index = array_search($valueSearch, array_column($arrayToBeSearched, $keySearch));
        return ($index !== false) ? $arrayToBeSearched[$index][$keyGet] : NULL;
    }

    static function returnJSONResponse(array $content, Int $status)
    {
        $response = new Response();

        $response
            ->setStatusCode($status)
            ->setContentType('application/json', 'UTF-8')
            ->setJsonContent($content)
            ->send();
    }

    static function callToJSONAPI(String $url): array
    {
        try {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
                "Accept: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($curl);
            curl_close($curl);

            return json_decode($result, true);
        } catch (\Throwable $th) {
            return ['Error' => $th];
        }
    }
}
