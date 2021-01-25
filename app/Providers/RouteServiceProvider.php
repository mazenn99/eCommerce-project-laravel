<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    // admin controller
    protected $adminNamespace = 'App\Http\Controllers\Dashboard';
    // site controller
    protected $siteNamespace = 'App\Http\Controllers\Site';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';
    // admin dashboard home redirect if auth
    public const ADMIN_DASHBOARD = 'admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapSiteRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    // admin routes
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->prefix('admin')
            ->namespace($this->adminNamespace)
            ->group(base_path('routes/admin.php'));
    }
    // site routes
    protected function mapSiteRoutes()
    {
        Route::namespace($this->siteNamespace)
            ->group(base_path('routes/site.php'));
    }

}
