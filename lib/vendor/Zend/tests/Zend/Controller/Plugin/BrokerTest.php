<?php
require_once 'Zend/Controller/Front.php';
require_once 'PHPUnit/Framework/TestCase.php';

require_once 'Zend/Controller/Request/Http.php';
require_once 'Zend/Controller/Response/Cli.php';

class Zend_Controller_Plugin_BrokerTest extends PHPUnit_Framework_TestCase
{
    public function testDuplicatePlugin()
    {
        $broker = new Zend_Controller_Plugin_Broker();
        $plugin = new Zend_Controller_Plugin_BrokerTest_TestPlugin();
        $broker->registerPlugin($plugin);
        try {
            $broker->registerPlugin($plugin);
            $this->fail('Duplicate registry of plugin object should be disallowed');
        } catch (Exception $expected) {
            $this->assertContains('already', $expected->getMessage());
        }
    }


    public function testUsingFrontController()
    {
        $controller = Zend_Controller_Front::getInstance();
        $controller->resetInstance();
        $controller->setControllerDirectory(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '_files');
        $request = new Zend_Controller_Request_Http('http://framework.zend.com/empty');
        $controller->setResponse(new Zend_Controller_Response_Cli());
        $plugin = new Zend_Controller_Plugin_BrokerTest_TestPlugin();
        $controller->registerPlugin($plugin);
        $controller->returnResponse(true);
        $response = $controller->dispatch($request);
        $this->assertEquals('123456', $response->getBody());
        $this->assertEquals('123456', $plugin->getResponse()->getBody());
    }

}

class Zend_Controller_Plugin_BrokerTest_TestPlugin extends Zend_Controller_Plugin_Abstract
{
    public function routeStartup(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()->appendBody('1');
    }

    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()->appendBody('2');
    }

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()->appendBody('3');
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()->appendBody('4');
    }

    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
        $this->getResponse()->appendBody('5');
    }

    public function dispatchLoopShutdown()
    {
        $this->getResponse()->appendBody('6');
    }
}
