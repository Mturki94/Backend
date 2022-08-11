<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Posts;
use App\Policies\PostPloicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // '\App\Models\Posts' => '\App\Policies\PostPolicy',
        Posts::class => PostPloicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
