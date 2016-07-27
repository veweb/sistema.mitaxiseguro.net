<?php
require_once 'Zend/Controller/Front.php';
require_once 'PHPUnit/Framework/TestCase.php';

require_once 'Zend/Controller/Request/Http.php';
require_once 'Zend/Controller/Response/Cli.php';
require_once 'Zend/Controller/Dispatcher/Standard.php';
require_once 'Zend/Controller/Router/Rewrite.php';

class Zend_Controller_FrontTest extends PHPUnit_Framework_TestCase
{
    protected $_controller = null;

    public function setUp()
    {
        $this->_controller = Zend_Controller_Front::getInstance();
        $this->_controller->resetInstance();
        $this->_controller->setControllerDirectory(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_files');
        $this->_controller->returnResponse(true);
        $this->_controller->throwExceptions(false);
    }

    public function tearDown()
    {
        unset($this->_controller);
    }

    public function testResetInstance()
    {
        $this->_controller->setParam('foo', 'bar');
        $this->assertEquals('bar', $this->_controller->getParam('foo'));

        $this->_controller->resetInstance();
        $this->assertNull($this->_controller->getParam('bar'));
        $this->assertSame(array(), $this->_controller->getParams());
        $this->assertSame(array(), $this->_controller->getControllerDirectory());
    }

    public function testSetGetRequest()
    {
        $request = new Zend_Controller_Request_Http();
        $this->_controller->setRequest($request);
        $this->assertTrue($request === $this->_controller->getRequest());

        $this->_controller->resetInstance();
        $this->_controller->setRequest('Zend_Controller_Request_Http');
        $request = $this->_controller->getRequest();
        $this->assertTrue($request instanceof Zend_Controller_Request_Http);
    }

    public function testSetRequestThrowsExceptionWithBadRequest()
    {
        try {
            $this->_controller->setRequest('Zend_Controller_Response_Cli');
            $this->fail('Should not be able to set invalid request class');
        } catch (Exception $e) {
            // success
        }
    }

    public function testSetGetResponse()
    {
        $response = new Zend_Controller_Response_Cli();
        $this->_controller->setResponse($response);
        $this->assertTrue($response === $this->_controller->getResponse());

        $this->_controller->resetInstance();
        $this->_controller->setResponse('Zend_Controller_Response_Cli');
        $response = $this->_controller->getResponse();
        $this->assertTrue($response instanceof Zend_Controller_Response_Cli);
    }

    public function testSetResponseThrowsExceptionWithBadResponse()
    {
        try {
            $this->_controller->setResponse('Zend_Controller_Request_Http');
            $this->fail('Should not be able to set invalid response class');
        } catch (Exception $e) {
            // success
        }
    }

    public function testSetGetRouter()
    {
        $router = new Zend_Controller_Router_Rewrite();
        $this->_controller->setRouter($router);
        $this->assertTrue($router === $this->_controller->getRouter());

        $this->_controller->resetInstance();
        $this->_controller->setRouter('Zend_Controller_Router_Rewrite');
        $router = $this->_controller->getRouter();
        $this->assertTrue($router instanceof Zend_Controller_Router_Rewrite);
    }

    public function testSetRouterThrowsExceptionWithBadRouter()
    {
        try {
            $this->_controller->setRouter('Zend_Controller_Request_Http');
            $this->fail('Should not be able to set invalid router class');
        } catch (Exception $e) {
            // success
        }
    }

    public function testSetGetDispatcher()
    {
        $dispatcher = new Zend_Controller_Dispatcher_Standard();
        $this->_controller->setDispatcher($dispatcher);

        $this->assertTrue($dispatcher === $this->_controller->getDispatcher());
    }

    public function testSetGetControllerDirectory()
    {
        $test = $this->_controller->getControllerDirectory();
        $expected = array('default' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '_files');
        $this->assertSame($expected, $test);
    }

    public function testGetSetParam()
    {
        $this->_controller->setParam('foo', 'bar');
        $this->assertEquals('bar', $this->_controller->getParam('foo'));

        $this->_controller->setParam('bar', 'baz');
        $this->assertEquals('baz', $this->_controller->getParam('bar'));
    }

    public function testGetSetParams()
    {
        $this->_controller->setParams(array('foo' => 'bar'));
        $this->assertSame(array('foo' => 'bar'), $this->_controller->getParams());

        $this->_controller->setParam('baz', 'bat');
        $this->assertSame(array('foo' => 'bar', 'baz' => 'bat'), $this->_controller->getParams());

        $this->_controller->setParams(array('foo' => 'bug'));
        $this->assertSame(array('foo' => 'bug', 'baz' => 'bat'), $this->_controller->getParams());
    }

    public function testClearParams()
    {
        $this->_controller->setParams(array('foo' => 'bar', 'baz' => 'bat'));
        $this->assertSame(array('foo' => 'bar', 'baz' => 'bat'), $this->_controller->getParams());

        $this->_controller->clearParams('foo');
        $this->assertSame(array('baz' => 'bat'), $this->_controller->getParams());

        $this->_controller->clearParams();
        $this->assertSame(array(), $this->_controller->getParams());

        $this->_controller->setParams(array('foo' => 'bar', 'bar' => 'baz', 'baz' => 'bat'));
        $this->assertSame(array('foo' => 'bar', 'bar' => 'baz', 'baz' => 'bat'), $this->_controller->getParams());
        $this->_controller->clearParams(array('foo', 'baz'));
        $this->assertSame(array('bar' => 'baz'), $this->_controller->getParams());
    }

    public function testSetGetDefaultControllerName()
    {
        $this->assertEquals('index', $this->_controller->getDefaultControllerName());

        $this->_controller->setDefaultControllerName('foo');
        $this->assertEquals('foo', $this->_controller->getDefaultControllerName());
    }

    public function testSetGetDefaultAction()
    {
        $this->assertEquals('index', $this->_controller->getDefaultAction());

        $this->_controller->setDefaultAction('bar');
        $this->assertEquals('bar', $this->_controller->getDefaultAction());
    }

    /**
     * Test default action on valid controller
     */
    public function testDispatch()
    {
        $request = new Zend_Controller_Request_Http('http://example.com/index');
        $this->_controller->setResponse(new Zend_Controller_Response_Cli());
        $response = $this->_controller->dispatch($request);

        $this->assertContains('Index action called', $response->getBody());
    }

    /**
     * Test valid action on valid controller
     */
    public function testDispatch1()
    {
        $request = new Zend_Controller_Request_Http('http://example.com/index/index');
        $this->_controller->setResponse(new Zend_Controller_Response_Cli());
        $response = $this->_controller->dispatch($request);

        $this->assertContains('Index action called', $response->getBody());
    }

    /**
     * Test invalid action on valid controller
     */
    public function testDispatch2()
    {
        $request = new Zend_Controller_Request_Http('http://example.com/index/foo');

        try {
            $this->_controller->dispatch($request);
            $this->fail('Exception should be raised by __call');
        } catch (Exception $e) {
            // success
        }
    }

    /**
     * Test invalid controller
     */
    public function testDispatch3()
    {
        $request = new Zend_Controller_Request_Http('http://example.com/baz');

        try {
            $this->_controller->dispatch($request);
            $this->fail('Exception should be raised; no such controller');
        } catch (Exception $e) {
            // success
        }
    }

    /**
     * Test valid action on valid controller; test pre/postDispatch
     */
    public function testDispatch4()
    {
        $request = new Zend_Controller_Request_Http('http://example.com/foo/bar');
        $this->_controller->setResponse(new Zend_Controller_Response_Cli());
        $response = $this->_controller->dispatch($request);

        $body = $response->getBody();
        $this->assertContains('Bar action called', $body, $body);
        $this->assertContains('preDispatch called', $body, $body);
        $this->assertContains('postDispatch called', $body, $body);
    }

    /**
     * Test that extra arguments get passed
     */
    public function testDispatch5()
    {
        $request = new Zend_Controller_Request_Http('http://example.com/index/args');
        $this->_controller->setResponse(new Zend_Controller_Response_Cli());
        $this->_controller->setParam('foo', 'bar');
        $this->_controller->setParam('baz', 'bat');
        $response = $this->_controller->dispatch($request);

        $body = $response->getBody();
        $this->assertContains('foo: bar', $body, $body);
        $this->assertContains('baz: bat', $body);
    }

    /**
     * Test using router
     */
    public function testDispatch6()
    {
        $request = new Zend_Controller_Request_Http('http://framework.zend.com/foo/bar/var1/baz');
        $this->_controller->setResponse(new Zend_Controller_Response_Cli());
        $this->_controller->setRouter(new Zend_Controller_Router_Rewrite());
        $response = $this->_controller->dispatch($request);

        $body = $response->getBody();
        $this->assertContains('Bar action called', $body);
        $params = $request->getParams();
        $this->assertTrue(isset($params['var1']));
        $this->assertEquals('baz', $params['var1']);
    }

    /**
     * Test without router, using GET params
     */
    public function testDispatch7()
    {
        if ('cli' == strtolower(php_sapi_name())) {
            $this->markTestSkipped('Issues with $_GET in CLI interface prevents test from passing');
        }
        $request = new Zend_Controller_Request_Http('http://framework.zend.com/index.php?controller=foo&action=bar');

        $response = new Zend_Controller_Response_Cli();
        $response = $this->_controller->dispatch($request, $response);

        $body = $response->getBody();
        $this->assertContains('Bar action called', $body);
    }

    /**
     * Test that run() throws exception when called from object instance
     */
    public function _testRunThrowsException()
    {
        try {
            $this->_controller->run(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_files');
            $this->fail('Should not be able to call run() from object instance');
        } catch (Exception $e) {
            // success
        }
    }

    /**
     * Test that set/getBaseUrl() functionality works
     */
    public function testSetGetBaseUrl()
    {
        $this->assertNull($this->_controller->getBaseUrl());
        $this->_controller->setBaseUrl('/index.php');
        $this->assertEquals('/index.php', $this->_controller->getBaseUrl());
    }

    public function testSetBaseUrlThrowsExceptionOnNonString()
    {
        try {
            $this->_controller->setBaseUrl(array());
            $this->fail('Should not be able to set non-string base URL');
        } catch (Exception $e) {
            // success
        }
    }

    /**
     * Test that a set base URL is pushed to the request during the dispatch 
     * process
     */
    public function testBaseUrlPushedToRequest()
    {
        $this->_controller->setBaseUrl('/index.php');
        $request  = new Zend_Controller_Request_Http('http://example.com/index');
        $response = new Zend_Controller_Response_Cli();
        $response = $this->_controller->dispatch($request, $response);

        $this->assertContains('index.php', $request->getBaseUrl());
    }

    /**
     * Test that throwExceptions() sets and returns value properly
     */
    public function testThrowExceptions()
    {
        $this->_controller->throwExceptions(true);
        $this->assertTrue($this->_controller->throwExceptions());
        $this->_controller->throwExceptions(false);
        $this->assertFalse($this->_controller->throwExceptions());
    }

    public function testThrowExceptionsFluentInterface()
    {
        $result = $this->_controller->throwExceptions(true);
        $this->assertSame($this->_controller, $result);
    }

    /**
     * Test that with throwExceptions() set, an exception is thrown
     */
    public function testThrowExceptionsThrows()
    {
        $this->_controller->throwExceptions(true);
        $this->_controller->setControllerDirectory(dirname(__FILE__));
        $request = new Zend_Controller_Request_Http('http://framework.zend.com/bogus/baz');
        $this->_controller->setResponse(new Zend_Controller_Response_Cli());
        $this->_controller->setRouter(new Zend_Controller_Router_Rewrite());

        try {
            $response = $this->_controller->dispatch($request);
            $this->fail('Invalid controller should throw exception');
        } catch (Exception $e) {
            // success
        }
    }

    /**
     * Test that returnResponse() sets and returns value properly
     */
    public function testReturnResponse()
    {
        $this->_controller->returnResponse(true);
        $this->assertTrue($this->_controller->returnResponse());
        $this->_controller->returnResponse(false);
        $this->assertFalse($this->_controller->returnResponse());
    }

    public function testReturnResponseFluentInterface()
    {
        $result = $this->_controller->returnResponse(true);
        $this->assertSame($this->_controller, $result);
    }

    /**
     * Test that with returnResponse set to false, output is echoed and equals that in the response
     */
    public function testReturnResponseReturnsResponse()
    {
        $request = new Zend_Controller_Request_Http('http://framework.zend.com/foo/bar/var1/baz');
        $this->_controller->setResponse(new Zend_Controller_Response_Cli());
        $this->_controller->setRouter(new Zend_Controller_Router_Rewrite());
        $this->_controller->returnResponse(false);

        ob_start();
        $this->_controller->dispatch($request);
        $body = ob_get_clean();

        $actual = $this->_controller->getResponse()->getBody();
        $this->assertContains($actual, $body);
    }

    public function testRunStatically()
    {
        $request = new Zend_Controller_Request_Http('http://example.com/index/index');
        $this->_controller->setRequest($request);
        Zend_Controller_Front::run(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_files');
    }

    public function testRunDynamically()
    {
        $request = new Zend_Controller_Request_Http('http://example.com/index/index');
        $this->_controller->setRequest($request);
        $this->_controller->run(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_files');
    }

    public function testModulePathDispatched()
    {
        $this->_controller->addControllerDirectory(dirname(__FILE__) . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR . '/Admin', 'admin');
        $request = new Zend_Controller_Request_Http('http://example.com/admin/foo/bar');
        $this->_controller->setResponse(new Zend_Controller_Response_Cli());
        $response = $this->_controller->dispatch($request);

        $body = $response->getBody();
        $this->assertContains('Admin_Foo::bar action called', $body, $body);
    }
}
