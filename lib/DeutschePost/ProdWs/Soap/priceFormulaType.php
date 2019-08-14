<?php

namespace DeutschePost\ProdWs\Soap;

class priceFormulaType
{

    /**
     * @var string_maxLen100 $expression
     * @access public
     */
    public $expression = null;

    /**
     * @var string_maxLen250 $agenda
     * @access public
     */
    public $agenda = null;

    /**
     * @var formulaExpressionType[] $formulaExpression
     * @access public
     */
    public $formulaExpression = null;

    /**
     * @param string_maxLen100 $expression
     * @param string_maxLen250 $agenda
     * @param formulaExpressionType[] $formulaExpression
     * @access public
     */
    public function __construct($expression, $agenda, $formulaExpression)
    {
      $this->expression = $expression;
      $this->agenda = $agenda;
      $this->formulaExpression = $formulaExpression;
    }

}
