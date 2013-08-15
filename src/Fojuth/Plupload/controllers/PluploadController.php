<?php namespace Fojuth\Plupload\Controllers;

/**
 * Plupload gate.
 * 
 * Works as a mediator initiating the upload process.
 */
class PluploadController extends \Illuminate\Routing\Controllers\Controller {
  
  protected $upload_handler;
  
  /**
   * Instantiate the upload handler and start the upload process.
   * 
   * @throws \LogicException
   */
  public function gate() {
    $class_name = \Config::get('plupload::plupload.upload_handler');
    $this->upload_handler = new $class_name;
    
    // The upload handler must implement a specific interface
    if (false === $this->upload_handler instanceof \Fojuth\Plupload\UploadHandlerInterface) {
      throw new \LogicException('The upload handler must implement the \Fojuth\Plupload\UploadHandlerInterface interface.');
    }
    
    // All looks fine, we start the upload
    return $this->upload_handler->upload(\Input::file('file'));
  }

}