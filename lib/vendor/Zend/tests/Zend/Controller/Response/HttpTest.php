<?php
require_once 'Zend/Controller/Response/Http.php';
require_once 'PHPUnit/Framework/TestCase.php';

class Zend_Controller_Response_HttpTest extends PHPUnit_Framework_TestCase 
{
    /**
     * @var Zend_Http_Response
     */
    protected $_response;

    public function setUp()
    {
        $this->_response = new Zend_Controller_Response_Http();
        $this->_response->headersSentThrowsException = false;
    }

    public function tearDown()
    {
        unset($this->_response);
    }

    public function testSetHeader()
    {
        $expected = array(array('name' => 'Content-Type', 'value' => 'text/xml'));
        $this->_response->setHeader('Content-Type', 'text/xml');
        $this->assertSame($expected, $this->_response->getHeaders());

        $expected[] =array('name' => 'Content-Type', 'value' => 'text/html');
        $this->_response->setHeader('Content-Type', 'text/html');
        $this->assertSame($expected, $this->_response->getHeaders());

        $expected = array(array('name' => 'Content-Type', 'value' => 'text/plain'));
        $this->_response->setHeader('Content-Type', 'text/plain', true);
        $count = 0;
        foreach ($this->_response->getHeaders() as $header) {
            if ('Content-Type' == $header['name']) {
                if ('text/plain' == $header['value']) {
                    ++$count;
                } else {
                    $this->fail('Found header, but incorrect value');
                }
            }
        }
        $this->assertEquals(1, $count);
    }

    public function testNoDuplicateLocationHeader()
    {
        $this->_response->setRedirect('http://www.example.com/foo/bar');
        $this->_response->setRedirect('http://www.example.com/bar/baz');
        $headers  = $this->_response->getHeaders();
        $location = 0;
        foreach ($headers as $header) {
            if ('Location' == $header['name']) {
                ++$location;
            }
        }
        $this->assertEquals(1, $location);
    }

    public function testClearHeaders()
    {
        $this->_response->setHeader('Content-Type', 'text/xml');
        $headers = $this->_response->getHeaders();
        $this->assertEquals(1, count($headers));

        $this->_response->clearHeaders();
        $headers = $this->_response->getHeaders();
        $this->assertEquals(0, count($headers));
    }

    public function testSetRawHeader()
    {
        $this->_response->setRawHeader('HTTP/1.0 404 Not Found');
        $headers = $this->_response->getRawHeaders();
        $this->assertContains('HTTP/1.0 404 Not Found', $headers);
    }

    public function testClearRawHeaders()
    {
        $this->_response->setRawHeader('HTTP/1.0 404 Not Found');
        $headers = $this->_response->getRawHeaders();
        $this->assertContains('HTTP/1.0 404 Not Found', $headers);

        $this->_response->clearRawHeaders();
        $headers = $this->_response->getRawHeaders();
        $this->assertTrue(empty($headers));
    }

    public function testClearAllHeaders()
    {
        $this->_response->setRawHeader('HTTP/1.0 404 Not Found');
        $this->_response->setHeader('Content-Type', 'text/xml');

        $headers = $this->_response->getHeaders();
        $this->assertFalse(empty($headers));

        $headers = $this->_response->getRawHeaders();
        $this->assertFalse(empty($headers));

        $this->_response->clearAllHeaders();
        $headers = $this->_response->getHeaders();
        $this->assertTrue(empty($headers));
        $headers = $this->_response->getRawHeaders();
        $this->assertTrue(empty($headers));
    }

    public function testSetHttpResponseCode()
    {
        $this->assertEquals(200, $this->_response->getHttpResponseCode());
        $this->_response->setHttpResponseCode(302);
        $this->assertEquals(302, $this->_response->getHttpResponseCode());
    }

    public function testSetBody()
    {
        $expected = 'content for the response body';
        $this->_response->setBody($expected);
        $this->assertEquals($expected, $this->_response->getBody());

        $expected = 'new content';
        $this->_response->setBody($expected);
        $this->assertEquals($expected, $this->_response->getBody());
    }

    public function testAppendBody()
    {
        $expected = 'content for the response body';
        $this->_response->setBody($expected);

        $additional = '; and then there was more';
        $this->_response->appendBody($additional);
        $this->assertEquals($expected . $additional, $this->_response->getBody());
    }

    public function test__toString()
    {
        $skipHeadersTest = headers_sent();

        $this->_response->setHeader('Content-Type', 'text/plain');
        $this->_response->setBody('Content');
        $this->_response->appendBody('; and more content.');

        $expected = 'Content; and more content.';
        $result = $this->_response->__toString();

        if (!$skipHeadersTest) {
            $this->assertTrue(headers_sent());
            $headers = headers_list();
            $found = false;
            foreach ($headers as $header) {
                if ('Content-Type: text/plain' == $header) {
                    $found = true;
                }
            }
            $this->assertTrue($found, var_export($headers, 1));
        }
    }

    public function testGetBodyAsArray()
    {
        $string1 = 'content for the response body';
        $string2 = 'more content for the response body';
        $string3 = 'even more content for the response body';
        $this->_response->appendBody($string1);
        $this->_response->appendBody($string2);
        $this->_response->appendBody($string3);

        $expected = array($string1, $string2, $string3);
        $this->assertEquals($expected, $this->_response->getBody(true));
    }

    public function testRenderExceptions()
    {
        $this->assertFalse($this->_response->renderExceptions());
        $this->assertTrue($this->_response->renderExceptions(true));
        $this->assertTrue($this->_response->renderExceptions());
        $this->assertFalse($this->_response->renderExceptions(false));
        $this->assertFalse($this->_response->renderExceptions());
    }

    public function testGetException()
    {
        $e = new Exception('Test');
        $this->_response->setException($e);

        $test  = $this->_response->getException();
        $found = false;
        foreach ($test as $t) {
            if ($t === $e) {
                $found = true;
            }
        }
        $this->assertTrue($found);
    }

    public function testSendResponseWithExceptions()
    {
        $e = new Exception('Test exception rendering');
        $this->_response->setException($e);
        $this->_response->renderExceptions(true);

        ob_start();
        $this->_response->sendResponse();
        $string = ob_get_clean();
        $this->assertContains('Test exception rendering', $string);
    }

    public function testSetResponseCodeThrowsExceptionWithBadCode()
    {
        try {
            $this->_response->setHttpResponseCode(99);
            $this->fail('Should not accept response codes < 100');
        } catch (Exception $e) {
        }

        try {
            $this->_response->setHttpResponseCode(600);
            $this->fail('Should not accept response codes > 599');
        } catch (Exception $e) {
        }

        try {
            $this->_response->setHttpResponseCode('bogus');
            $this->fail('Should not accept non-integer response codes');
        } catch (Exception $e) {
        }
    }
}

require_once 'Zend/Controller/Action.php';
class Zend_Controller_Response_HttpTest_Action extends Zend_Controller_Action 
{}
