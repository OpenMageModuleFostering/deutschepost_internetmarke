<?php

namespace DeutschePost\ProdWs\Soap;

class productValidity
{

    /**
     * @var timestampType $timestamp
     * @access public
     */
    public $timestamp = null;

    /**
     * @var numericOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var timestampType $timestamp1
     * @access public
     */
    public $timestamp1 = null;

    /**
     * @var timestampType $timestamp2
     * @access public
     */
    public $timestamp2 = null;

    /**
     * @param timestampType $timestamp
     * @param numericOperatorType $operator
     * @param timestampType $timestamp1
     * @param timestampType $timestamp2
     * @access public
     */
    public function __construct($timestamp, $operator, $timestamp1, $timestamp2)
    {
      $this->timestamp = $timestamp;
      $this->operator = $operator;
      $this->timestamp1 = $timestamp1;
      $this->timestamp2 = $timestamp2;
    }

}
