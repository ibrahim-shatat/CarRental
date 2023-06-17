<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReceiptPolicy
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
            return auth()->user()->hasPermissionTo('Index Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Index Receipt');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Index Receipt');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Receipt')
            ?  $this->allow()
            : $this->deny(' can not open Index-Receipt');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Receipt')
        ?  $this->allow()
        : $this->deny(' can not open Index-Receipt');
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
            return auth()->user()->hasPermissionTo('Show Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Show Receipt');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Show Receipt');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Receipt')
            ?  $this->allow()
            : $this->deny(' can not open Show-Receipt');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Receipt')
        ?  $this->allow()
        : $this->deny(' can not open Show-Receipt');
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
            return auth()->user()->hasPermissionTo('Create Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Create Receipt');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Create Receipt');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Receipt')
            ?  $this->allow()
            : $this->deny(' can not open Create-Receipt');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Receipt')
        ?  $this->allow()
        : $this->deny(' can not open Create-Receipt');
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
            return auth()->user()->hasPermissionTo('Edit Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Edit Receipt');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Edit Receipt');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit Receipt')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Receipt');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Receipt')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Receipt');
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
            return auth()->user()->hasPermissionTo('Delete Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Delete Receipt');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Receipt')
             ?  $this->allow()
             : $this->deny(' can not open Delete Receipt');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Receipt')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Receipt');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Receipt')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Receipt');
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