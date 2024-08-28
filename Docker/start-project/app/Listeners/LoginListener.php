<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PermissionController;

class LoginListener{

    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        PermissionController::loadPermissions(Auth::user()->role_id);
    }
}
