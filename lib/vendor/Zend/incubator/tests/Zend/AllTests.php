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
 * @package    Zend
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: AllTests.php 3540 2007-02-21 00:43:27Z elazar $
 */


if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Zend_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

//require_once 'Zend/Currency/AllTests.php';
require_once 'Zend/Log/AllTests.php';
// require_once 'Zend/Session/AllTests.php';
require_once 'Zend/Service/SimpyTest.php';
require_once 'Zend/TimeSyncTest.php';
require_once 'Zend/TranslateTest.php';
require_once 'Zend/Translate/AllTests.php';

/**
 * @category   Zend
 * @package    Zend
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Zend Framework - Zend');

        // place other tests here for incubator suite

// Do not include Zend_Currency as empty testbeds can cause phpunit to crash
//        $suite->addTest(Zend_Currency_AllTests::suite());
        $suite->addTest(Zend_Log_AllTests::suite());
        /*
         * To run the unit tests for Zend_Session*:
         * $ cd zftrunk/incubator/tests/Zend/Session
         * $ php AllTests.php
         */
        // $suite->addTest(Zend_Session_AllTests::suite());
        $suite->addTestSuite('Zend_Service_SimpyTest');
        $suite->addTestSuite('Zend_TimeSyncTest');
        $suite->addTestSuite('Zend_TranslateTest');
        $suite->addTest(Zend_Translate_AllTests::suite());

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Zend_AllTests::main') {
    Zend_AllTests::main();
}
