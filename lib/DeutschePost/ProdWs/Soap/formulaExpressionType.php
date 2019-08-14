<?php

namespace DeutschePost\ProdWs\Soap;

class formulaExpressionType
{

    /**
     * @var base64Binary $condition
     * @access public
     */
    public $condition = null;

    /**
     * @var base64Binary $formula
     * @access public
     */
    public $formula = null;

    /**
     * @var formulaComponentType[] $formulaComponent
     * @access public
     */
    public $formulaComponent = null;

    /**
     * @param base64Binary $condition
     * @param base64Binary $formula
     * @param formulaComponentType[] $formulaComponent
     * @access public
     */
    public function __construct($condition, $formula, $formulaComponent)
    {
      $this->condition = $condition;
      $this->formula = $formula;
      $this->formulaComponent = $formulaComponent;
    }

}
