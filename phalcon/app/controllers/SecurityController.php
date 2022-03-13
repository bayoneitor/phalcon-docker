<?php

declare(strict_types=1);

use Model\Company;
use Model\Security;
use Model\CompanySecurity;

class SecurityController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    }
    public function getAction($securityID)
    {
        if ($securityID == null) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message" => "You have to select the id of the Security"], 400);
        }

        if (!is_numeric($securityID)) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message" => "You have to select an INT id for the Security code"], 400);
        }

        $Security = Security::findFirst($securityID);
        if ($Security == null) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message"  => "The Security code doesn't exist"], 400);
        }

        $result = [
            'Security' => $Security->jsonSerialize(),
            // 'CompanySecurity' => $Company->CompanySecurity->jsonSerialize(),
            'Company' => $Security->company->jsonSerialize()[0],
        ];

        return ControllerBase::returnJSONResponse(["Status" => "OK", "Message" => $result], 200);
    }
}
