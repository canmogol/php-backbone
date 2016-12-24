<?php

/**
 * class ExtendedException
 */
interface ExtendedException
{

  /** Aggregations: */

  /** Compositions: */

  /**
   *
   * @param Exception exception
   * @return void
   * @access public
   */
  public function throwException(Exception $exception );

  /**
   *
   * @return void
   * @access public
   */
  public function throwLastException( );

  /**
   *
   * @param Exception exception
   * @return void
   * @access public
   */
  public function setException(Exception $exception );

  /**
   *
   * @return Exception
   * @access public
   */
  public function getException( );

  /**
   *
   * @param array $exceptionsArray
   * @return void
   * @access public
   */
  public function setExceptionsArray(array $exceptionsArray );

  /**
   *
   * @return array
   * @access public
   */
  public function getExceptionsArray( );



} // end of ExtendedException
