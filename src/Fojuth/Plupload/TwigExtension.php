<?php namespace Fojuth\Plupload;

use TwigBridge\Extension as BaseExtension;
use Illuminate\Foundation\Application;
use Twig_Environment;

class TwigExtension extends BaseExtension {

  /**
   * Returns the name of the extension.
   *
   * @return string Extension's name.
   */
  public function getName() {
    return 'PluploadExtension';
  }

  /**
   * @param Illuminate\Foundation\Application $app
   * @param Twig_Environment                  $twig
   */
  public function __construct(Application $app, Twig_Environment $twig) {
    parent::__construct($app, $twig);
    
    $this->registerTwigFunctions();
  }

  /**
   * Registers the Twig functions.
   */
  private function registerTwigFunctions() {
    $this->twig->addFunction('plupload', new \Twig_SimpleFunction('plupload', function($view = null, $browse_button = null, $prefix = null, $additional_data = array()){
      $view = (true === is_null($view)) ? \Config::get('plupload::plupload.view') : $view;
      $prefix = (true === is_null($prefix)) ? 'plupload_'.uniqid() : $prefix;
      $browse_button = (true === is_null($browse_button)) ? $prefix.'_browse' : $browse_button;
      
      return \View::make($view, array(
        'upload_handler' => \Config::get('plupload::plupload.upload_handler'),
        'browse_button_id' => $browse_button,
        'prefix' => $prefix,
        'handler_gate' => \Config::get('plupload::plupload.upload_handler_gate'),
        'max_file_size' => \Config::get('plupload::plupload.max_file_size'),
        'additional_data' => $additional_data,
      ));
    }));
  }
}
