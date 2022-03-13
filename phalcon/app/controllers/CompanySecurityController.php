<?php

declare(strict_types=1);

use Model\CompanySecurity;
use Model\Company;
use Model\Security;

class CompanySecurityController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    }
    public function getAction($companySecurityID = null)
    {
        if ($companySecurityID == null) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message" => "You have to select the id of the companySecurity"], 400);
        }

        if (!is_numeric($companySecurityID)) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message" => "You have to select an INT id for the companySecurity code"], 400);
        }

        $companySecurity = CompanySecurity::findFirst($companySecurityID);
        if ($companySecurity == null) {
            return ControllerBase::returnJSONResponse(["Status" => "Error", "Message"  => "The companySecurity code doesn't exist"], 400);
        }

        $result = [
            'Company' => $companySecurity->company->jsonSerialize(),
            'CompanySecurity' => $companySecurity->jsonSerialize(),
            'Security' => $companySecurity->security->jsonSerialize()
        ];
        return ControllerBase::returnJSONResponse(["Status" => "OK", "Message" => $result], 200);
    }
}
