<?php namespace Fojuth\Plupload;

/**
 * The upload handler interface.
 */
interface UploadHandlerInterface {
  
  public function upload(\Symfony\Component\HttpFoundation\File\UploadedFile $file);
  
}