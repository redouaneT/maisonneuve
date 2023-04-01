<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Article;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Gate::define('isAdmin', function ($user) {
            return $user !== null && $user->role !== null && $user->role->name === 'admin';
        });
    
        Gate::define('isStudent', function ($user) {
            return $user !== null && $user->role !== null && $user->role->name === 'student';
        });

        Gate::define('update-article', function ($user, Article $article) {
            return $user->id === $article->user_id;
        });
    }
}
