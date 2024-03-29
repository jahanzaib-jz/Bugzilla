<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerHomePolicies();

        //
    }
    public function registerHomePolicies()
    {
        Gate::define('isManager', function ($user) {

            return $user->isManager();

        });
         Gate::define('isDeveloper', function ($user) {
            
          
            return $user->isDeveloper();

        });
          Gate::define('isQA', function ($user) {
            return $user->isQA();
        });


        // Gate::define('update-post', function ($user, \App\Post $post) {
        //     return $user->hasAccess(['update-post']) or $user->id == $post->user_id;
        // });
        // Gate::define('publish-post', function ($user) {
        //     return $user->hasAccess(['publish-post']);
        // });
        // Gate::define('see-all-drafts', function ($user) {
        //     return $user->inRole('editor');
        // });
    }
}
