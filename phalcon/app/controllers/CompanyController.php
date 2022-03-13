<?php

declare(strict_types=1);

use Model\Company;
use Model\Security;
use Model\CompanySecurity;

class CompanyController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    }
    public function getAction($companyID = null)
    {
        if ($companyID == null) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message" => "You have to select the id of the Company"], 400);
        }

        if (!is_numeric($companyID)) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message" => "You have to select an INT id for the Company code"], 400);
        }

        $Company = Company::findFirst($companyID);
        if ($Company == null) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message"  => "The Company code doesn't exist"], 400);
        }

        $result = [
            'Company' => $Company->jsonSerialize(),
            // 'CompanySecurity' => $Company->CompanySecurity->jsonSerialize(),
            'Securities' => $Company->securities->jsonSerialize(),
        ];

        return ControllerBase::returnJSONResponse(["Status" => "OK", "Message" => $result], 200);
    }
}
