<?php namespace Fojuth\Plupload;

/**
 * Base upload handler.
 */
class UploadHandler implements \Fojuth\Plupload\UploadHandlerInterface {
  
  /**
   * Parameters passed by the gate controller.
   *
   * @var type 
   */
  protected $params;
  
  /**
   * The main upload method.
   * 
   * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file Uploaded file instance.
   * @return string
   */
  public function upload(\Symfony\Component\HttpFoundation\File\UploadedFile $file) {
    
    // We simply move the uploaded file to the target directory
    $result = $file->move(\Config::get('plupload::plupload.upload_dir'), $file->getClientOriginalName());

    // Return the result of the upload
    return $this->respond(array('OK' => ($result) ? 1 : 0));
  }
  
  /**
   * Method returning the response.
   * 
   * @param array $response The response to be returned.
   * @return string
   * @throws \InvalidArgumentException Thrown when the response is empty.
   */
  public function respond(array $response) {
    
    // We have to return something
    if (true === empty($response)) {
      throw new \InvalidArgumentException('No response to return.');
    }
    
    return \Response::json($response);
  }
  
  /**
   * Register the params passed by the gate controller (like the GET params).
   * 
   * @param array $params
   */
  public function registerParams(array $params) {
    $this->params = $params;
  }
  
}
