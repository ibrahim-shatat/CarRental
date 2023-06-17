<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplierPolicy
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
            return auth()->user()->hasPermissionTo('Index Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Index Supplier');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Index Supplier');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Supplier')
            ?  $this->allow()
            : $this->deny(' can not open Index-Supplier');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Supplier')
        ?  $this->allow()
        : $this->deny(' can not open Index-Supplier');
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
            return auth()->user()->hasPermissionTo('Show Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Show Supplier');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Show Supplier');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Supplier')
            ?  $this->allow()
            : $this->deny(' can not open Show-Supplier');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Supplier')
        ?  $this->allow()
        : $this->deny(' can not open Show-Supplier');
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
            return auth()->user()->hasPermissionTo('Create Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Create Supplier');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Create Supplier');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Supplier')
            ?  $this->allow()
            : $this->deny(' can not open Create-Supplier');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Supplier')
        ?  $this->allow()
        : $this->deny(' can not open Create-Supplier');
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
            return auth()->user()->hasPermissionTo('Edit Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Edit Supplier');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Edit Supplier');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit Supplier')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Supplier');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Supplier')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Supplier');
         }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Admin $admin)
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Delete Supplier');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Supplier')
             ?  $this->allow()
             : $this->deny(' can not open Delete Supplier');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Supplier')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Supplier');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Supplier')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Supplier');
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
 
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
 
    }
}