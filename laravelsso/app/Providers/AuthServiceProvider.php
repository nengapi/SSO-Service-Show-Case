<?php

namespace App\Providers;

use App\Models\Passport as ModelsPassport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
				 /** @var CachesRoutes $app */
				 $app = $this->app;
				 if (!$app->routesAreCached()) {
						//  Passport::routes();
				 }
				Passport::tokensExpireIn(now()->addDays(1));
				Passport::refreshTokensExpireIn(now()->addDays(30));
				Passport::personalAccessTokensExpireIn(now()->addMonths(6));

				Passport::tokensCan([
					'view-user' => "View user information"
				]);

				Passport::useClientModel(ModelsPassport::class);
    }
}
