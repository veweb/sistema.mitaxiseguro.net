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
 * @package    Zend_Db
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Common class is DB independant
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Common.php';


/**
 * @package    Zend_Db_Adapter_Pdo_MysqlTest
 * @subpackage UnitTests
 */
class Zend_Db_Adapter_Pdo_SqliteTest extends Zend_Db_Adapter_Pdo_Common
{

    public function getDriver()
    {
        return 'pdo_Sqlite';
    }

    public function getParams()
    {
        $params = array (
            'username' => TESTS_ZEND_DB_ADAPTER_PDO_SQLITE_USERNAME,
            'password' => TESTS_ZEND_DB_ADAPTER_PDO_SQLITE_PASSWORD,
            'dbname'   => TESTS_ZEND_DB_ADAPTER_PDO_SQLITE_DATABASE
        );
        return $params;
    }

    public function getCreateTableSQL()
    {
        return 'CREATE TABLE IF NOT EXISTS '. self::TABLE_NAME . " (
            id           INTEGER PRIMARY KEY,
            subtitle     {$this->_textDataType},
            title        {$this->_textDataType},
            body         {$this->_textDataType},
            date_created {$this->_textDataType}
        )";
    }

    public function getCreateTableSQL2()
    {
        return 'CREATE TABLE IF NOT EXISTS '. self::TABLE_NAME_2 . " (
            news_id       INTEGER,
            user_id       INTEGER,
            comment_title {$this->_textDataType},
            comment_body  {$this->_textDataType},
            date_posted   {$this->_textDataType}
        )";
    }

    public function getDropTableSQL()
    {
        $sql = 'DROP TABLE IF EXISTS ' . self::TABLE_NAME;
        return $sql;
    }

    public function getDropTableSQL2()
    {
        $sql = 'DROP TABLE IF EXISTS ' . self::TABLE_NAME_2;
        return $sql;
    }

    public function testQuote()
    {
        // test double quotes are fine
        $value = $this->_db->quote('St John"s Wort');
        $this->assertEquals("'St John\"s Wort'", $value);

        // test that single quotes are escaped with another single quote
        $value = $this->_db->quote("St John's Wort");
        $this->assertEquals("'St John''s Wort'", $value);

        // quote an array
        $value = $this->_db->quote(array("it's", 'all', 'right!'));
        $this->assertEquals("'it''s', 'all', 'right!'", $value);

        // test numeric
        $value = $this->_db->quote('1');
        $this->assertEquals("'1'", $value);

        $value = $this->_db->quote(1);
        $this->assertEquals("1", $value);

        $value = $this->_db->quote(array(1,'2',3));
        $this->assertEquals("1, '2', 3", $value);
    }

    public function testQuoteInto()
    {
        // test double quotes are fine
        $value = $this->_db->quoteInto('id=?', 'St John"s Wort');
        $this->assertEquals("id='St John\"s Wort'", $value);

        // test that single quotes are escaped with another single quote
        $value = $this->_db->quoteInto('id = ?', 'St John\'s Wort');
        $this->assertEquals("id = 'St John''s Wort'", $value);
    }

    public function testQuoteIdentifier()
    {
        $value = $this->_db->quoteIdentifier('table_name');
        $this->assertEquals('"table_name"', $value);
        $value = $this->_db->quoteIdentifier('table_`_name');
        $this->assertEquals('"table_`_name"', $value);
    }

    public function testExceptionInvalidLoginCredentials()
    {
        $params = $this->getParams();
        $params['password'] = 'xxxxxxxx'; // invalid password

        try {
            $db = new Zend_Db_Adapter_Pdo_Sqlite($params);
        } catch (Zend_Db_Adapter_Exception $e) {
            $this->assertThat($e, $this->isInstanceOf('Zend_Db_Adapter_Pdo_Exception'));
            echo $e->getMessage();
        }
    }

    public function testSelectJoinRightClause()
    {
        $this->markTestSkipped('SQLite does not support RIGHT OUTER JOIN');
    }

    public function testTableExceptionInvalidPrimaryKey()
    {
        $this->markTestIncomplete('SQLite is getting Warning, will resolve this later');
    }

}
