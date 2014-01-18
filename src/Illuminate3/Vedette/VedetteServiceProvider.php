<?php namespace Illuminate3\Vedette;

use Illuminate\Support\ServiceProvider;
use Illuminate3\Vedette\Console\InstallCommand;
use Illuminate3\Vedette\Console\UserSeedCommand;

class VedetteServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('illuminate3/vedette', 'vedette');
		include __DIR__ .'/routes.php';
		include __DIR__ .'/filters.php';
		include __DIR__ .'/listeners.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerInstallCommands();
		$this->registerUserSeedCommands();
		$this->commands('command.vedette.install','command.vedette.user');
//		$this->app->singleton(
		$this->app->bind(
			'Illuminate3\Vedette\Repositories\User\UserRepository',
			'Illuminate3\Vedette\Repositories\User\EloquentUserRepository'
		);
/*
		$this->app->bind(
			'Illuminate3\Vedette\Services\Presenters\User\UserPresenter'
		);
*/
	}

	/**
	 * Register console commands vedette:install
	 *
	 * @return void
	 */
	public function registerInstallCommands()
	{
		$this->app['command.vedette.install'] = $this->app->share(function($app)
		{
			return new InstallCommand();
		});
	}

	/**
	 * Register console commands vedette:user
	 *
	 * @return void
	 */
	public function registerUserSeedCommands()
	{
		$this->app['command.vedette.user'] = $this->app->share(function($app)
		{
			return new UserSeedCommand();
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('vedette');
	}

}
