<?php namespace Fojuth\Plupload;

use Twig_Extension;
use Twig_SimpleFunction;
use Illuminate\Foundation\Application;
use Twig_Environment;

class TwigExtension extends Twig_Extension {

    /**
     * Returns the name of the extension.
     *
     * @return string Extension's name.
     */
    public function getName() {
        return 'PluploadExtension';
    }

    /**
     * Registers the Twig functions.
     */
    public function getFunctions() {
        return [
            new Twig_SimpleFunction(
                'plupload',
                function($view = null, $browse_button = null, $prefix = null, $additional_data = array()){

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
                }
            )
        ];
    }
}