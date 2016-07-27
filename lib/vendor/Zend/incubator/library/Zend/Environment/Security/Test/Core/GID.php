<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Environment
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Exception.php 2794 2007-01-16 01:29:51Z bkarwin $
 */

/**
 * require the Zend_Environment_Security_Test_Core class
 */
require_once('Zend/Environment/Security/Test/Core.php');


/**
 * Test class for GID
 * 
 * @package Zend_Environment
 */
class Zend_Environment_Security_Test_Core_Gid extends Zend_Environment_Security_Test_Core
{

	/**
	 * This should be a <b>unique</b>, human-readable identifier for this test
	 *
	 * @var string
	 */
	protected $test_name = "group_id";
	
	protected $recommended_value = 100;
	
	protected function _retrieveCurrentValue() {
		$this->current_value =  getmygid();
	}
					
	/**
	 * Checks the GID of the PHP process to make sure it is above PHPSECINFO_MIN_SAFE_GID
	 *
	 * @see PHPSECINFO_MIN_SAFE_GID
	 */
	protected function _execTest() {
		
		if ($this->current_value >= $this->recommended_value) {
			return self::RESULT_OK;
		}
		
		return self::RESULT_WARN;
	}
		
	
	/**
	 * Set the messages specific to this test
	 *
	 */
	protected function _setMessages() {
		parent::_setMessages();
		
		$this->setMessageForResult(self::RESULT_OK, 'en', 'PHP is executing as what is probably a non-privileged group');
		$this->setMessageForResult(self::RESULT_WARN, 'en', 'PHP may be executing as a "privileged" group, which could be a serious security vulnerability.');
	}
	

}