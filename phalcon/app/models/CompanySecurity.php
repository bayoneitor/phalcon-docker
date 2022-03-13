<?php

namespace Model;

class CompanySecurity extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $codeCompanySecurity;

    /**
     *
     * @var integer
     */
    public $codeCompany;

    /**
     *
     * @var integer
     */
    public $codeSecurity;

    /**
     *
     * @var string
     */
    public $dateTime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("app");
        $this->setSource("CompanySecurity");
        $this->belongsTo('CodeCompany', Company::class, 'CodeCompany', ['alias' => 'Company']);
        $this->belongsTo('CodeSecurity', Security::class, 'CodeSecurity', ['alias' => 'Security']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompanySecurity[]|CompanySecurity|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompanySecurity|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
}
