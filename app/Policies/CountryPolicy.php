<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
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
            return auth()->user()->hasPermissionTo('Index Country')
             ?  $this->allow()
             : $this->deny(' can not open Index Country');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Country')
             ?  $this->allow()
             : $this->deny(' can not open Index Country');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Country')
            ?  $this->allow()
            : $this->deny(' can not open Index-Country');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Country')
        ?  $this->allow()
        : $this->deny(' can not open Index-Country');
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
            return auth()->user()->hasPermissionTo('Show Country')
             ?  $this->allow()
             : $this->deny(' can not open Show Country');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Country')
             ?  $this->allow()
             : $this->deny(' can not open Show Country');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Country')
            ?  $this->allow()
            : $this->deny(' can not open Show-Country');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Country')
        ?  $this->allow()
        : $this->deny(' can not open Show-Country');
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
            return auth()->user()->hasPermissionTo('Create Country')
             ?  $this->allow()
             : $this->deny(' can not open Create Country');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Country')
             ?  $this->allow()
             : $this->deny(' can not open Create Country');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Country')
            ?  $this->allow()
            : $this->deny(' can not open Create-Country');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Country')
        ?  $this->allow()
        : $this->deny(' can not open Create-Country');
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
            return auth()->user()->hasPermissionTo('Edit Country')
             ?  $this->allow()
             : $this->deny(' can not open Edit Country');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Country')
             ?  $this->allow()
             : $this->deny(' can not open Edit Country');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit Country')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Country');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Country')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Country');
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
            return auth()->user()->hasPermissionTo('Delete Country')
             ?  $this->allow()
             : $this->deny(' can not open Delete Country');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Country')
             ?  $this->allow()
             : $this->deny(' can not open Delete Country');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Country')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Country');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Country')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Country');
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