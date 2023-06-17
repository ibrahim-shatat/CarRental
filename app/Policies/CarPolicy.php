<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
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
            return auth()->user()->hasPermissionTo('Index Car')
             ?  $this->allow()
             : $this->deny(' can not open Index Car');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Car')
             ?  $this->allow()
             : $this->deny(' can not open Index Car');
        }
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Car')
            ?  $this->allow()
            : $this->deny(' can not open Index-Car');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Car')
        ?  $this->allow()
        : $this->deny(' can not open Index-Car');
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
            return auth()->user()->hasPermissionTo('Show Car')
             ?  $this->allow()
             : $this->deny(' can not open Show Car');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Car')
             ?  $this->allow()
             : $this->deny(' can not open Show Car');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Car')
            ?  $this->allow()
            : $this->deny(' can not open Show-Car');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Car')
        ?  $this->allow()
        : $this->deny(' can not open Show-Car');
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
            return auth()->user()->hasPermissionTo('Create Car')
             ?  $this->allow()
             : $this->deny(' can not open Create Car');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Car')
             ?  $this->allow()
             : $this->deny(' can not open Create Car');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Car')
            ?  $this->allow()
            : $this->deny(' can not open Create-Car');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Car')
        ?  $this->allow()
        : $this->deny(' can not open Create-Car');
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
            return auth()->user()->hasPermissionTo('Edit Car')
             ?  $this->allow()
             : $this->deny(' can not open Edit Car');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Car')
             ?  $this->allow()
             : $this->deny(' can not open Edit Car');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Car')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Car');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Car')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Car');
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
            return auth()->user()->hasPermissionTo('Delete Car')
             ?  $this->allow()
             : $this->deny(' can not open Delete Car');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Car')
             ?  $this->allow()
             : $this->deny(' can not open Delete Car');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Car')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Car');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Car')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Car');
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