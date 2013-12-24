<?php namespace Fojuth\Plupload\Controllers;

 use \Illuminate\Routing\Controller;

/**
 * Plupload gate.
 * 
 * Works as a mediator initiating the upload process.
 */
class PluploadController extends Controller {
  
  protected $upload_handler;
  
  /**
   * Instantiate the upload handler and start the upload process.
   * 
   * @throws \LogicException
   */
  public function gate() {
    
    // The upload handler class name can be set as a GET parameter, but it must exist in the config file
    if (true === isset($_GET['upload_handler'])) {
      $handler = (string) str_replace('::', '\\', $_GET['upload_handler']);
      
      $class_name = \Config::get('plupload::plupload.upload_handler_'.$handler);
    }
    else {
      $class_name = \Config::get('plupload::plupload.upload_handler');
    }

    $this->upload_handler = new $class_name;

    // The upload handler must implement a specific interface
    if (false === $this->upload_handler instanceof \Fojuth\Plupload\UploadHandlerInterface) {
      throw new \LogicException('The upload handler must implement the \Fojuth\Plupload\UploadHandlerInterface interface.');
    }
    
    // All looks fine, we start the upload
    return $this->upload_handler->upload(\Input::file('file'));
  }

}
