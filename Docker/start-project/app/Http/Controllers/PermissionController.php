<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\ResourceRepository;
use App\Models\Permission;

class PermissionController extends Controller {

    protected $repository;

    public static function loadPermissions($role){ //ir na abela permissione  traz os dados do resource os papeis

       $sess = Array();

       $perm = Permission::with(['resource'])->where('role_id' ,$role)->get();
       foreach ($perm as $item) {
            $sess[$item->resource->name] = (boolean) $item->permissions;
       }
       session(['user_permissions' => $sess]);
    }

    public static function isAuthorized($resource){
        $permissions = session('user_permissions');
        return $permissions[$resource];
    }

    
}
