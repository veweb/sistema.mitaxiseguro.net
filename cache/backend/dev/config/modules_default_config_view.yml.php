<?php
// auto-generated by sfViewConfigHandler
// date: 2015/11/25 00:49:13
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Sistema Mi Taxi Seguro', false, false);

  $response->addStylesheet('stye.css', '', array ());
  $response->addStylesheet('jquery-ui-1.7.3.custom.css', '', array ());
  $response->addStylesheet('alertify.core.css', '', array ());
  $response->addStylesheet('alertify.default.css', '', array ());
  $response->addStylesheet('jquery.fancybox.css', '', array ());
  $response->addStylesheet('jquery.fancybox-buttons.css?v=1.0.5', '', array ());
  $response->addStylesheet('jquery.dataTables.css', '', array ());
  $response->addJavascript('jquery.fancybox.css?v=2.1.5', '', array ());
  $response->addJavascript('alertify.js', '', array ());
  $response->addJavascript('jquery-1.3.2.min.js', '', array ());
  $response->addJavascript('jquery-1.10.2.min.js', '', array ());
  $response->addJavascript('ajax_mt.js', '', array ());
  $response->addJavascript('jquery.mousewheel-3.0.6.pack.js', '', array ());
  $response->addJavascript('jquery.fancybox.pack.js?v=2.1.5', '', array ());
  $response->addJavascript('jquery.dataTables.min.js', '', array ());


