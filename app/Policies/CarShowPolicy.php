<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarShowPolicy
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
            return auth()->user()->hasPermissionTo('Index CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Index CarShow');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Index CarShow');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index CarShow')
            ?  $this->allow()
            : $this->deny(' can not open Index-CarShow');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index CarShow')
        ?  $this->allow()
        : $this->deny(' can not open Index-CarShow');
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
            return auth()->user()->hasPermissionTo('Show CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Show CarShow');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Show CarShow');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show CarShow')
            ?  $this->allow()
            : $this->deny(' can not open Show-CarShow');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show CarShow')
        ?  $this->allow()
        : $this->deny(' can not open Show-CarShow');
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
            return auth()->user()->hasPermissionTo('Create CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Create CarShow');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Create CarShow');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create CarShow')
            ?  $this->allow()
            : $this->deny(' can not open Create-CarShow');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create CarShow')
        ?  $this->allow()
        : $this->deny(' can not open Create-CarShow');
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
            return auth()->user()->hasPermissionTo('Edit CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Edit CarShow');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Edit CarShow');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit CarShow')
            ?  $this->allow()
            : $this->deny(' can not open Edit-CarShow');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit CarShow')
        ?  $this->allow()
        : $this->deny(' can not open Edit-CarShow');
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
            return auth()->user()->hasPermissionTo('Delete CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Delete CarShow');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete CarShow')
             ?  $this->allow()
             : $this->deny(' can not open Delete CarShow');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete CarShow')
            ?  $this->allow()
            : $this->deny(' can not open Delete-CarShow');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete CarShow')
        ?  $this->allow()
        : $this->deny(' can not open Delete-CarShow');
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