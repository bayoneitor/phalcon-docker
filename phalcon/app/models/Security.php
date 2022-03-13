<?php

namespace Model;

class Security extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $codeSecurity;

    /**
     *
     * @var string
     */
    public $instrument;

    /**
     *
     * @var string
     */
    public $bid;

    /**
     *
     * @var string
     */
    public $ask;

    /**
     *
     * @var string
     */
    public $yield;

    /**
     *
     * @var string
     */
    public $high;

    /**
     *
     * @var string
     */
    public $low;

    /**
     *
     * @var string
     */
    public $currency;

    /**
     *
     * @var string
     */
    public $dataPrice;

    /**
     *
     * @var string
     */
    public $timePrice;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("app");
        $this->setSource("Security");
        $this->hasMany('CodeSecurity', CompanySecurity::class, 'CodeSecurity', ['alias' => 'Companysecurity']);

        $this->hasManyToMany(
            'CodeSecurity',
            CompanySecurity::class,
            'CodeSecurity',
            'CodeCompany',
            Company::class,
            'CodeCompany',
            [
                'reusable' => true,
                'alias'    => 'company',
            ]
        );
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Security[]|Security|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Security|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
}
