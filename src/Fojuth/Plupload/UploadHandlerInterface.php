<?php namespace Fojuth\Plupload;

/**
 * The upload handler interface.
 */
interface UploadHandlerInterface {
  
  /**
   * The main upload method.
   * 
   * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
   */
  public function upload(\Symfony\Component\HttpFoundation\File\UploadedFile $file);
  
}