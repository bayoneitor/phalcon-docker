<?php

declare(strict_types=1);

use Phalcon\Mvc\Controller;

class APIController extends Controller
{

    public function indexAction()
    {
    }

    public function getAction()
    {
        $url1 = 'https://gdh2webfgapi.webfg.com/v1/gdh/marketdata/sab/?code_security=1829035&solution_symbol=SABWEB';
        $url2 = 'https://gdh2webfgapi.webfg.com/v1/gdh/codeconverter/sab/?code_security=1829035&solution_symbol=SABWEB';
        $content1 = ControllerBase::callToJSONAPI($url1);
        $content2 = ControllerBase::callToJSONAPI($url2);

        if ($content1['_meta']['status'] == 'ERROR' || array_key_exists('Error', $content1)) {
            return ControllerBase::returnJSONResponse(['Error' => 'Error url1'], 400);
        }
        if ($content2['_meta']['status'] == 'ERROR' || array_key_exists('Error', $content2)) {
            return ControllerBase::returnJSONResponse(['Error' => 'Error url2'], 400);
        }

        $contents = [];
        $count = 0;

        //Maybe we can have more than one record?
        foreach ($content1['records'] as $record) {
            $contents[$count]['codeSecurity'] = $record['codeSecurity'];
            $contents[$count]['nameAsset'] = $record['nameAsset'];
            $contents[$count]['trade'] = $record['trade'];

            $codeKey = ControllerBase::getValueFromArrayWithOtherValue($content2['records'], 'codeSecurity', $record['codeSecurity'], 'codeKey');
            $contents[$count]['codeKey'] = $codeKey;
            $count++;
        }

        return ControllerBase::returnJSONResponse($contents, 200);
    }
}
