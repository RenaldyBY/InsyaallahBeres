<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(Request $req): void
    {
        $this->registerPolicies();

        $roles = Role::all();

        foreach ($roles as $key => $value) {
            $namaRole = $value['nama_role'];
            Gate::define($namaRole, static function (User $user) use ($namaRole) {
                return $user->role->nama_role === $namaRole;
            });
        }

        
    }
}
