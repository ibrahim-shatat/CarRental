<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
            return auth()->user()->hasPermissionTo('Index Permission')
             ?  $this->allow()
             : $this->deny(' can not open Index Permission');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Permission')
             ?  $this->allow()
             : $this->deny(' can not open Index Permission');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Permission')
            ?  $this->allow()
            : $this->deny(' can not open Index-Permission');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Permission')
        ?  $this->allow()
        : $this->deny(' can not open Index-Permission');
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
            return auth()->user()->hasPermissionTo('Show Permission')
             ?  $this->allow()
             : $this->deny(' can not open Show Permission');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Permission')
             ?  $this->allow()
             : $this->deny(' can not open Show Permission');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Permission')
            ?  $this->allow()
            : $this->deny(' can not open Show-Permission');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Permission')
        ?  $this->allow()
        : $this->deny(' can not open Show-Permission');
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
            return auth()->user()->hasPermissionTo('Create Permission')
             ?  $this->allow()
             : $this->deny(' can not open Create Permission');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Permission')
             ?  $this->allow()
             : $this->deny(' can not open Create Permission');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Permission')
            ?  $this->allow()
            : $this->deny(' can not open Create-Permission');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Permission')
        ?  $this->allow()
        : $this->deny(' can not open Create-Permission');
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
            return auth()->user()->hasPermissionTo('Edit Permission')
             ?  $this->allow()
             : $this->deny(' can not open Edit Permission');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Permission')
             ?  $this->allow()
             : $this->deny(' can not open Edit Permission');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit Permission')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Permission');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Permission')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Permission');
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
            return auth()->user()->hasPermissionTo('Delete Permission')
             ?  $this->allow()
             : $this->deny(' can not open Delete Permission');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Permission')
             ?  $this->allow()
             : $this->deny(' can not open Delete Permission');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Permission')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Permission');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Permission')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Permission');
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