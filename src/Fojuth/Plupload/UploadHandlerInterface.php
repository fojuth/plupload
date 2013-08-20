<?php namespace Fojuth\Plupload;

/**
 * The upload handler interface.
 */
interface UploadHandlerInterface {
  
  /**
   * The main upload method.
   * 
   * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file Uploaded file instance.
   */
  public function upload(\Symfony\Component\HttpFoundation\File\UploadedFile $file);
  
  /**
   * Method returning the response.
   * 
   * @param array $response The response to be returned.
   */
  public function respond(array $response);
  
  /**
   * Register the parameters passed to the gate controller.
   * 
   * @param array $params
   */
  public function registerParams(array $params);
  
}
