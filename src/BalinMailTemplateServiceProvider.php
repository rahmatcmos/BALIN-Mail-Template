<?php namespace ThunderID\BalinMailTemplate;

use Illuminate\Support\ServiceProvider;
use Blade;

class BalinMailTemplateServiceProvider extends ServiceProvider 
{

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
		//load view
		$this->loadViewsFrom(__DIR__.'/views', 'balin-mail');

		// blade extens money indonesia
		Blade::directive('balin_mail_money_indo', function($expression)
		{
			return "<?php echo 'IDR '.number_format($expression, 0, ',', '.'); ?>";
		});

		// blade extens money indonesia for email
        Blade::directive('balin_mail_money_indo_without_IDR', function($expression)
        {
            return "<?php echo number_format($expression, 0, ',', '.'); ?>";
        });
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
