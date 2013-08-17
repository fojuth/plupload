<?php

/**
 * The main Plupload configuration.
 */
return array(

  /**
   * Class handling the uploads.
   */
  'upload_handler' => '\Fojuth\Plupload\UploadHandler',
   
   /**
    * Path to the uploader's gate.
    */
  'upload_handler_gate' => \URL::to('plupload/gate'),
  
  /**
   * Uploader view.
   */
  'view' => 'plupload::uploader_base',
  
  /**
   * Target upload directory.
   */
  'upload_dir' => 'uploads',
   
   /**
    * Max upload size.
    */
  'max_file_size' => '5mb',

);