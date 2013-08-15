<?php namespace Fojuth\Plupload;

use Illuminate\Support\ServiceProvider;

class PluploadServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}
  
  /**
   * Boot the package.
   */
	public function boot() {
    $this->package('fojuth/plupload');
    
    // Load package routes
    include __DIR__.'/../../routes.php';
    
    // Extend Blade (sic!)
    \Blade::extend(function($view){
      $pattern = '/@plupload\((?:\s?[\'\"](.*)[\'\"]\s?(?:,\s?[\'\"](.*)[\'\"]\s?(?:,\s?[\'\"](.*)[\'\"])?)?)?\s?\)/U';
      $replacement = '<?php
        $view_var = (string) \'$1\';
        $prefix_var = (string) \'$2\';
        $browse_button_var = (string) \'$3\';
        
        $view = (true === empty($view_var)) ? \\Config::get(\'plupload::plupload.view\') : $view_var;
        $prefix = (true === empty($prefix_var)) ? \'plupload_\'.uniqid() : $prefix_var;
        $browse_button = (true === empty($browse_button_var)) ? $prefix.\'_browse\' : $browse_button_var;
        
      ?>
      
      @include($view, array(\'upload_handler\' => \\Config::get(\'plupload::plupload.upload_handler\'),\'browse_button_id\' => $browse_button,\'prefix\' => $prefix,\'handler_gate\' => \\Config::get(\'plupload::plupload.upload_handler_gate\'),\'max_file_size\' => \\Config::get(\'plupload::plupload.max_file_size\')))';
      
      return preg_replace($pattern, $replacement, $view);
    });
  }

}