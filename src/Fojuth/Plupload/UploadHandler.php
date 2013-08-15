<?php namespace Fojuth\Plupload;

/**
 * Base upload handler.
 */
class UploadHandler implements \Fojuth\Plupload\UploadHandlerInterface {
  
  /**
   * The main upload method.
   * 
   * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
   * @return string
   */
  public function upload(\Symfony\Component\HttpFoundation\File\UploadedFile $file) {
    $result = $file->move(\Config::get('plupload::plupload.upload_dir'), $file->getClientOriginalName());

    if ($result) {
      return \Response::json(array('OK' => 1));
    }
    else {
      return \Response::json(array('OK' => 0));
    }
  }
  
}