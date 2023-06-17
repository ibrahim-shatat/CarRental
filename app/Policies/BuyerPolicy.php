<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuyerPolicy
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
            return auth()->user()->hasPermissionTo('Index Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Index Buyer');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Index Buyer');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Buyer')
            ?  $this->allow()
            : $this->deny(' can not open Index-Buyer');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Buyer')
        ?  $this->allow()
        : $this->deny(' can not open Index-Buyer');
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
            return auth()->user()->hasPermissionTo('Show Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Show Buyer');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Show Buyer');
        }  
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Buyer')
            ?  $this->allow()
            : $this->deny(' can not open Show-Buyer');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Buyer')
        ?  $this->allow()
        : $this->deny(' can not open Show-Buyer');
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
            return auth()->user()->hasPermissionTo('Create Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Create Buyer');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Create Buyer');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Buyer')
            ?  $this->allow()
            : $this->deny(' can not open Create-Buyer');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Buyer')
        ?  $this->allow()
        : $this->deny(' can not open Create-Buyer');
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
            return auth()->user()->hasPermissionTo('Edit Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Edit Buyer');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Edit Buyer');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit Buyer')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Buyer');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Buyer')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Buyer');
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
            return auth()->user()->hasPermissionTo('Delete Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Delete Buyer');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Buyer')
             ?  $this->allow()
             : $this->deny(' can not open Delete Buyer');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Buyer')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Buyer');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Buyer')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Buyer');
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