<?php namespace Fojuth\Plupload;

/**
 * Base upload handler.
 */
class UploadHandler implements \Fojuth\Plupload\UploadHandlerInterface {
  
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
    return $this->respond(array('OK' => (bool) $result));
  }
  
  /**
   * Method returning the response.
   * 
   * @param array $response The response to be returned.
   * @return string
   */
  public function respond(array $response) {
    
    // We have to return something
    if (true === empty($response)) {
      throw new \InvalidArgumentException('No response to return.');
    }
    
    return \Response::json($response);
  }
  
}