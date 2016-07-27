<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Zend_Mail_AllTests::main');
}

if (!defined('TESTS_ZEND_MAIL_POP3_ENABLED')) {
    if (is_readable('TestConfiguration.php')) {
        require_once 'TestConfiguration.php';
    } else {
        require_once 'TestConfiguration.php.dist';
    }
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

require_once 'Zend/Mail/MboxTest.php';
require_once 'Zend/Mail/MboxFolderTest.php';
require_once 'Zend/Mail/MaildirTest.php';
require_once 'Zend/Mail/MaildirFolderTest.php';
require_once 'Zend/Mail/Pop3Test.php';
require_once 'Zend/Mail/ImapTest.php';
require_once 'Zend/Mail/InterfaceTest.php';
require_once 'Zend/Mail/MessageTest.php';
require_once 'Zend/Mail/SmtpTest.php';

class Zend_Mail_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Zend Framework - Zend_Mail');

        $suite->addTestSuite('Zend_Mail_MessageTest');
        $suite->addTestSuite('Zend_Mail_InterfaceTest');
        $suite->addTestSuite('Zend_Mail_MboxTest');
        $suite->addTestSuite('Zend_Mail_MboxFolderTest');
        if (defined('TESTS_ZEND_MAIL_POP3_ENABLED') && constant('TESTS_ZEND_MAIL_POP3_ENABLED') == true) {
            $suite->addTestSuite('Zend_Mail_Pop3Test');
        }
        if (defined('TESTS_ZEND_MAIL_IMAP_ENABLED') && constant('TESTS_ZEND_MAIL_IMAP_ENABLED') == true) {
            $suite->addTestSuite('Zend_Mail_ImapTest');
        }
        if (defined('TESTS_ZEND_MAIL_MAILDIR_ENABLED') && constant('TESTS_ZEND_MAIL_MAILDIR_ENABLED')) {
            if (file_exists(dirname(__FILE__) . '/_files/test.maildir/maildir.tar')) {
                // TODO: I couldn't find a method to add an error or warning in TestSuite. But
                // I also don't like throwing this simple exception and make the whole suite fail.
                throw new Exception('You have to unpack and remove maildir.tar in the maildir '.
                                    'directory before enabling the maildir tests');
            }
            $suite->addTestSuite('Zend_Mail_MaildirTest');
            $suite->addTestSuite('Zend_Mail_MaildirFolderTest');
        }
        if (defined('TESTS_ZEND_MAIL_SMTP_ENABLED') && constant('TESTS_ZEND_MAIL_SMTP_ENABLED') == true) {
            $suite->addTestSuite('Zend_Mail_SmtpTest');
        }

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Zend_Mail_AllTests::main') {
    Zend_Mail_AllTests::main();
}
