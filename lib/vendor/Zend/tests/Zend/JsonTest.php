<?php

/**
 * @package    Zend_Json
 * @subpackage UnitTests
 */


/**
 * Zend_Json
 */
require_once 'Zend/Json.php';

/**
 * Zend_Json_Encoder
 */
require_once 'Zend/Json/Encoder.php';

/**
 * Zend_Json_Decoder
 */
require_once 'Zend/Json/Decoder.php';

/**
 * PHPUnit Test Case
 */
require_once 'PHPUnit/Framework/TestCase.php';


/**
 * @package    Zend_Feed
 * @subpackage UnitTests
 *
 */
class Zend_JsonTest extends PHPUnit_Framework_TestCase
{
    /**
     * test null encoding/decoding
     * 
     * @access public
     * @return void
     */
	public function testNull()
	{
		$this->_testEncodeDecode(array(null));
	}

	
    /**
     * test boolean encoding/decoding
     * 
     * @access public
     * @return void
     */
    public function testBoolean()
    {
        $this->assertTrue(Zend_Json_Decoder::decode(Zend_Json_Encoder::encode(true)));
        $this->assertFalse(Zend_Json_Decoder::decode(Zend_Json_Encoder::encode(false)));
    }


    /**
     * test integer encoding/decoding
     * 
     * @access public
     * @return void
     */
	public function testInteger()
	{
		$this->_testEncodeDecode(array(-2));
		$this->_testEncodeDecode(array(-1));

        $zero = Zend_Json_Decoder::decode(Zend_Json_Encoder::encode(0));
		$this->assertEquals(0, $zero, 'Failed 0 integer test. Encoded: ' . serialize(Zend_Json_Encoder::encode(0)));
	}


    /**
     * test float encoding/decoding
     * 
     * @access public
     * @return void
     */
	public function testFloat()
	{
		$this->_testEncodeDecode(array(-2.1, 1.2));
	}
	
	
    /**
     * test string encoding/decoding
     * 
     * @access public
     * @return void
     */
	public function testString()
	{
		$this->_testEncodeDecode(array('string'));
		$this->assertEquals('', Zend_Json_Decoder::decode(Zend_Json_Encoder::encode('')), 'Empty string encoded: ' . serialize(Zend_Json_Encoder::encode('')));
	}

    /**
     * Test backslash escaping of string
     * 
     * @access public
     * @return void
     */
	public function testString2()
    {
        $string   = 'INFO: Path \\\\test\\123\\abc';
        $expected = '"INFO: Path \\\\\\\\test\\\\123\\\\abc"';
        $encoded = Zend_Json_Encoder::encode($string);
		$this->assertEquals($expected, $encoded, 'Backslash encoding incorrect: expected: ' . serialize($expected) . '; received: ' . serialize($encoded) . "\n");
        $this->assertEquals($string, Zend_Json_Decoder::decode($encoded));
    }
	
    /**
     * Test newline escaping of string
     * 
     * @access public
     * @return void
     */
	public function testString3()
    {
        $expected = '"INFO: Path\nSome more"';
        $string   = "INFO: Path\nSome more";
        $encoded  = Zend_Json_Encoder::encode($string);
		$this->assertEquals($expected, $encoded, 'Newline encoding incorrect: expected ' . serialize($expected) . '; received: ' . serialize($encoded) . "\n");
        $this->assertEquals($string, Zend_Json_Decoder::decode($encoded));
    }

    /**
     * Test tab/non-tab escaping of string
     * 
     * @access public
     * @return void
     */
	public function testString4()
    {
        $expected = '"INFO: Path\\t\\\\tSome more"';
        $string   = "INFO: Path\t\\tSome more";
        $encoded  = Zend_Json_Encoder::encode($string);
		$this->assertEquals($expected, $encoded, 'Tab encoding incorrect: expected ' . serialize($expected) . '; received: ' . serialize($encoded) . "\n");
        $this->assertEquals($string, Zend_Json_Decoder::decode($encoded));
    }

    /**
     * Test double-quote escaping of string
     * 
     * @access public
     * @return void
     */
	public function testString5()
    {
        $expected = '"INFO: Path \"Some more\""';
        $string   = 'INFO: Path "Some more"';
        $encoded  = Zend_Json_Encoder::encode($string);
		$this->assertEquals($expected, $encoded, 'Quote encoding incorrect: expected ' . serialize($expected) . '; received: ' . serialize($encoded) . "\n");
        $this->assertEquals($string, Zend_Json_Decoder::decode($encoded));
    }

    /**
     * test indexed array encoding/decoding
     * 
     * @access public
     * @return void
     */
	public function testArray()
	{
        $array = array(1, 'one', 2, 'two');
        $encoded = Zend_Json_Encoder::encode($array);
        $this->assertSame($array, Zend_Json_Decoder::decode($encoded), 'Decoded array does not match: ' . serialize($encoded));
	}

    /**
     * test associative array encoding/decoding
     * 
     * @access public
     * @return void
     */
    public function testAssocArray() 
    {
        $this->_testEncodeDecode(array(array('one' => 1, 'two' => 2)));
    }

    /**
     * test associative array encoding/decoding, with mixed key types
     * 
     * @access public
     * @return void
     */
    public function testAssocArray2() 
    {
        $this->_testEncodeDecode(array(array('one' => 1, 2 => 2)));
    }
	
    /**
     * test associative array encoding/decoding, with integer keys not starting
     * at 0
     * 
     * @access public
     * @return void
     */
    public function testAssocArray3() 
    {
        $this->_testEncodeDecode(array(array(1 => 'one', 2 => 'two')));
    }
	    /**
     * test object encoding/decoding (decoding to array)
     * 
     * @access public
     * @return void
     */
	public function testObject()
	{
        $value = new stdClass();
        $value->one = 1;
        $value->two = 2;

        $array = array('__className' => 'stdClass', 'one' => 1, 'two' => 2);

        $encoded = Zend_Json_Encoder::encode($value);
        $this->assertSame($array, Zend_Json_Decoder::decode($encoded));
	}

    /**
     * test object encoding/decoding (decoding to stdClass)
     * 
     * @access public
     * @return void
     */
    public function testObjectAsObject()
    {
        $value = new stdClass();
        $value->one = 1;
        $value->two = 2;

        $encoded = Zend_Json_Encoder::encode($value);
        $decoded = Zend_Json_Decoder::decode($encoded, Zend_Json::TYPE_OBJECT);
        $this->assertTrue(is_object($decoded), 'Not decoded as an object');
        $this->assertTrue($decoded instanceof StdClass, 'Not a StdClass object');
        $this->assertTrue(isset($decoded->one), 'Expected property not set');
        $this->assertEquals($value->one, $decoded->one, 'Unexpected value');
    }

    /**
     * Test that arrays of objects decode properly; see issue #144
     * 
     * @access public
     * @return void
     */
    public function testDecodeArrayOfObjects()
    {
        $value = '[{"id":1},{"foo":2}]';
        $expect = array(array('id' => 1), array('foo' => 2));
        $this->assertEquals($expect, Zend_Json_Decoder::decode($value));
    }

    /**
     * Test that objects of arrays decode properly; see issue #107
     * 
     * @access public
     * @return void
     */
    public function testDecodeObjectOfArrays()
    {
        $value = '{"codeDbVar" : {"age" : ["int", 5], "prenom" : ["varchar", 50]}, "234" : [22, "jb"], "346" : [64, "francois"], "21" : [12, "paul"]}';
        $expect = array(
            'codeDbVar' => array(
                'age'   => array('int', 5),
                'prenom' => array('varchar', 50),
            ),
            234 => array(22, 'jb'),
            346 => array(64, 'francois'),
            21  => array(12, 'paul')
        );
        $this->assertEquals($expect, Zend_Json_Decoder::decode($value));
    }
	
	/**
     * Test encoding and decoding in a single step
     *
	 * @param array $values   array of values to test against encode/decode 
	 */
	protected function _testEncodeDecode($values) 
	{
		foreach ($values as $value) {
			$encoded = Zend_Json_Encoder::encode($value);
			$this->assertEquals($value, Zend_Json_Decoder::decode($encoded));
		}
	}

    /**
     * Test that version numbers such as 4.10 are encoded and decoded properly; 
     * See ZF-377
     */
    public function testEncodeReleaseNumber()
    {
        $value = '4.10';

        $this->_testEncodeDecode(array($value));
    }

    /**
     * Tests that spaces/linebreaks prior to a closing right bracket don't throw 
     * exceptions. See ZF-283.
     */
    public function testEarlyLineBreak()
    {
        $expected = array('data' => array(1, 2, 3, 4));

        $json = '{"data":[1,2,3,4' . "\n]}";
        $this->assertEquals($expected, Zend_Json_Decoder::decode($json));

        $json = '{"data":[1,2,3,4 ]}';
        $this->assertEquals($expected, Zend_Json_Decoder::decode($json));
    }

    /**
     * Tests for ZF-504
     *
     * Three confirmed issues reported:
     * - encoder improperly encoding empty arrays as structs
     * - decoder happily decoding clearly borked JSON
     * - decoder decoding octal values improperly (shouldn't decode them at all, as JSON does not support them)
     */
    public function testZf504()
    {
        $test = array();
        $this->assertSame('[]', Zend_Json_Encoder::encode($test));

        try {
            $json = '[a"],["a],[][]';
            $test = Zend_Json_Decoder::decode($json);
            $this->fail("Should not be able to decode '$json'");

            $json = '[a"],["a]';
            $test = Zend_Json_Decoder::decode($json);
            $this->fail("Should not be able to decode '$json'");
        } catch (Exception $e) {
            // success
        }

        try {
            $expected = 010;
            $test = Zend_Json_Decoder::decode('010');
            $this->fail('Octal values are not supported in JSON notation');
        } catch (Exception $e) {
            // sucess
        }
    }

    /**
     * Tests for ZF-461
     * 
     * Check to see that cycling detection works properly
     */
    public function testZf461()
    {
        $item1 = new Zend_JsonTest_Item() ;
        $item2 = new Zend_JsonTest_Item() ;
        $everything = array() ;
        $everything['allItems'] = array($item1, $item2) ;
        $everything['currentItem'] = $item1 ;

        try {
            $encoded = Zend_Json_Encoder::encode($everything);
        } catch (Exception $e) {
            $this->fail('Object cycling checks should check for recursion, not duplicate usage of an item');
        }

        try {
            $encoded = Zend_Json_Encoder::encode($everything, true);
            $this->fail('Object cycling not allowed when cycleCheck parameter is true');
        } catch (Exception $e) {
            // success
        }
    }

    public function testEncodeObject()
    {
        $actual  = new Zend_JsonTest_Object();
        $encoded = Zend_Json_Encoder::encode($actual);
        $decoded = Zend_Json_Decoder::decode($encoded, Zend_Json::TYPE_OBJECT);

        $this->assertTrue(isset($decoded->__className));
        $this->assertEquals('Zend_JsonTest_Object', $decoded->__className);
        $this->assertTrue(isset($decoded->foo));
        $this->assertEquals('bar', $decoded->foo);
        $this->assertTrue(isset($decoded->bar));
        $this->assertEquals('baz', $decoded->bar);
        $this->assertFalse(isset($decoded->_foo));
    }

    public function testEncodeClass()
    {
        $encoded = Zend_Json_Encoder::encodeClass('Zend_JsonTest_Object');

        $this->assertContains("Class.create('Zend_JsonTest_Object'", $encoded);
        $this->assertContains("ZAjaxEngine.invokeRemoteMethod(this, 'foo'", $encoded);
        $this->assertContains("ZAjaxEngine.invokeRemoteMethod(this, 'bar'", $encoded);
        $this->assertNotContains("ZAjaxEngine.invokeRemoteMethod(this, 'baz'", $encoded);

        $this->assertContains('variables:{foo:"bar",bar:"baz"}', $encoded);
        $this->assertContains('constants : {FOO: "bar"}', $encoded);
    }
    
    public function testEncodeClasses()
    {
        $encoded = Zend_Json_Encoder::encodeClasses(array('Zend_JsonTest_Object', 'Zend_JsonTest'));

        $this->assertContains("Class.create('Zend_JsonTest_Object'", $encoded);
        $this->assertContains("Class.create('Zend_JsonTest'", $encoded);
    }
}

/**
 * Zend_JsonTest_Item: test item for use with testZf461()
 */
class Zend_JsonTest_Item 
{ 
}

/**
 * Zend_JsonTest_Object: test class for encoding classes
 */
class Zend_JsonTest_Object
{
    const FOO = 'bar';

    public $foo = 'bar';
    public $bar = 'baz';

    protected $_foo = 'fooled you';

    public function foo($bar, $baz)
    {
    }

    public function bar($baz)
    {
    }

    protected function baz()
    {
    }
}
