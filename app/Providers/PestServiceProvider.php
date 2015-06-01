<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PestServiceProvider extends ServiceProvider {

    protected $defer = true;

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
            return new \App\Pest\LolEsports();
        });

        $this->app->singleton('Pest_Reddit', function($app)
        {
            return new \App\Pest\Reddit();
        });

        $this->app->singleton('Pest_Youtube', function($app)
        {
            return new \App\Pest\Youtube();
        });
	}

    public function provides(){
        return [
            'Pest_LolEsports',
            'Pest_Reddit',
            'Pest_Youtube',
        ];
    }

}
