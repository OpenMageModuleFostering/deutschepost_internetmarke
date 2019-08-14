<?php

namespace DeutschePost\ProdWs\Soap;

class branch
{

    /**
     * @var logicalOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var branchType $branch_number
     * @access public
     */
    public $branch_number = null;

    /**
     * @param logicalOperatorType $operator
     * @param branchType $branch_number
     * @access public
     */
    public function __construct($operator, $branch_number)
    {
      $this->operator = $operator;
      $this->branch_number = $branch_number;
    }

}
