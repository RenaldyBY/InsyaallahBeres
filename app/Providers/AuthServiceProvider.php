<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Schema;

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
    public function boot(): void
    {
        $this->registerPolicies();

        if (Schema::hasTable('roles')) {
            // Tabel ada
            $roles = Role::all(); 
        } else {
            // Tabel tidak ada
            $roles = [
                [
                    'nama_role' => 'admin',
                ],
                [
                    'nama_role' => 'user'
                ]
            ]; 
        }

        foreach ($roles as $key => $value) {
            $namaRole = $value['nama_role'];
            Gate::define($namaRole, static function (User $user) use ($namaRole) {
                return $user->role->nama_role === $namaRole;
            });
        }
        
    }
}
