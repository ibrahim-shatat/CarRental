<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RenterPolicy
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
            return auth()->user()->hasPermissionTo('Index Renter')
             ?  $this->allow()
             : $this->deny(' can not open Index Renter');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Renter')
             ?  $this->allow()
             : $this->deny(' can not open Index Renter');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Renter')
            ?  $this->allow()
            : $this->deny(' can not open Index-Renter');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Renter')
        ?  $this->allow()
        : $this->deny(' can not open Index-Renter');
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
            return auth()->user()->hasPermissionTo('Show Renter')
             ?  $this->allow()
             : $this->deny(' can not open Show Renter');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Renter')
             ?  $this->allow()
             : $this->deny(' can not open Show Renter');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Renter')
            ?  $this->allow()
            : $this->deny(' can not open Show-Renter');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Renter')
        ?  $this->allow()
        : $this->deny(' can not open Show-Renter');
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
            return auth()->user()->hasPermissionTo('Create Renter')
             ?  $this->allow()
             : $this->deny(' can not open Create Renter');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Renter')
             ?  $this->allow()
             : $this->deny(' can not open Create Renter');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Renter')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Renter');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Renter')
        ?  $this->allow()
        : $this->deny(' can not open Create-Renter');
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
            return auth()->user()->hasPermissionTo('Edit Renter')
             ?  $this->allow()
             : $this->deny(' can not open Edit Renter');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Renter')
             ?  $this->allow()
             : $this->deny(' can not open Edit Renter');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit Renter')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Renter');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Renter')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Renter');
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
            return auth()->user()->hasPermissionTo('Delete Renter')
             ?  $this->allow()
             : $this->deny(' can not open Delete Renter');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Renter')
             ?  $this->allow()
             : $this->deny(' can not open Delete Renter');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Renter')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Renter');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Renter')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Renter');
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