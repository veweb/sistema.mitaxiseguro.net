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
 * @package    Zend_Validate
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Date.php 3376 2007-02-13 19:49:11Z darby $
 */


/**
 * @see Zend_Validate_Interface
 */
require_once 'Zend/Validate/Interface.php';


/**
 * @category   Zend
 * @package    Zend_Validate
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Validate_Date implements Zend_Validate_Interface
{
    /**
     * Array of validation failure messages
     *
     * @var array
     */
    protected $_messages = array();

    /**
     * Defined by Zend_Validate_Interface
     *
     * Returns true if and only if $value is a valid date of the format YYYY-MM-DD
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isValid($value)
    {
        $this->_messages = array();

        if (!preg_match('/\d{4}-\d{2}-\d{2}/', $value)) {
            $this->_messages[] = "'$value' is not of the format YYYY-MM-DD";
            return false;
        }

        list($year, $month, $day) = sscanf($value, '%d-%d-%d');

        if (!checkdate($month, $day, $year)) {
            $this->_messages[] = "'$value' does not appear to be a valid date";
            return false;
        }

        return true;
    }

    /**
     * Defined by Zend_Validate_Interface
     *
     * Returns array of validation failure messages
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->_messages;
    }
}
