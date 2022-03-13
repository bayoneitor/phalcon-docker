<?php

namespace Model;

class Company extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $codeCompany;

    /**
     *
     * @var string
     */
    public $nameCompany;

    /**
     *
     * @var string
     */
    public $country;

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
        $this->setSource("Company");
        $this->hasMany('CodeCompany', CompanySecurity::class, 'CodeCompany', ['alias' => 'Companysecurity']);
        $this->hasManyToMany(
            'CodeCompany',
            CompanySecurity::class,
            'CodeCompany',
            'CodeSecurity',
            Security::class,
            'CodeSecurity',
            [
                'reusable' => true,
                'alias'    => 'securities',
            ]
        );
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Company[]|Company|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Company|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
}
