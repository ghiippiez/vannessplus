<?php

namespace VannessPlus\Providers;

use VannessPlus\Role;
use VannessPlus\User;
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
        'VannessPlus\Model' => 'VannessPlus\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Appointments
        Gate::define('appointment_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('appointment_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('appointment_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('appointment_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('appointment_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Timeslots
        Gate::define('timeslot_access', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('timeslot_create', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('timeslot_edit', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('timeslot_view', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });
        Gate::define('timeslot_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

    }
}
