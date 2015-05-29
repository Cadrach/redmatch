<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PestServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
        $this->app->singleton('Pest_LolEsports', function($app)
        {
            return new App\Pest\LolEsports();
        });
	}

}