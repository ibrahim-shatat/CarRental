<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Index Role')
             ?  $this->allow()
             : $this->deny(' can not open Index Role');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Role')
             ?  $this->allow()
             : $this->deny(' can not open Index Role');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Role')
            ?  $this->allow()
            : $this->deny(' can not open Index-Role');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Role')
        ?  $this->allow()
        : $this->deny(' can not open Index-Role');
         }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Show Role')
             ?  $this->allow()
             : $this->deny(' can not open Show Role');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Role')
             ?  $this->allow()
             : $this->deny(' can not open Show Role');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Role')
            ?  $this->allow()
            : $this->deny(' can not open Show-Role');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Role')
        ?  $this->allow()
        : $this->deny(' can not open Show-Role');
         }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Create Role')
             ?  $this->allow()
             : $this->deny(' can not open Create Role');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Role')
             ?  $this->allow()
             : $this->deny(' can not open Create Role');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Role')
            ?  $this->allow()
            : $this->deny(' can not open Create-Role');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Role')
        ?  $this->allow()
        : $this->deny(' can not open Create-Role');
         }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit Role')
             ?  $this->allow()
             : $this->deny(' can not open Edit Role');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Role')
             ?  $this->allow()
             : $this->deny(' can not open Edit Role');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit Role')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Role');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Role')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Role');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete Role')
             ?  $this->allow()
             : $this->deny(' can not open Delete Role');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Role')
             ?  $this->allow()
             : $this->deny(' can not open Delete Role');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Role')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Role');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Role')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Role');
         }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Admin $admin)
    {
        //
    }
}