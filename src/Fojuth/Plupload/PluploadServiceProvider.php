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
  }

}