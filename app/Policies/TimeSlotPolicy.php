<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimeSlotPolicy
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
            return auth()->user()->hasPermissionTo('Index TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Index TimeSlot');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Index TimeSlot');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index TimeSlot')
            ?  $this->allow()
            : $this->deny(' can not open Index-TimeSlot');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index TimeSlot')
        ?  $this->allow()
        : $this->deny(' can not open Index-TimeSlot');
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
            return auth()->user()->hasPermissionTo('Show TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Show TimeSlot');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Show TimeSlot');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show TimeSlot')
            ?  $this->allow()
            : $this->deny(' can not open Show-TimeSlot');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show TimeSlot')
        ?  $this->allow()
        : $this->deny(' can not open Show-TimeSlot');
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
            return auth()->user()->hasPermissionTo('Create TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Create TimeSlot');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open v TimeSlot');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create TimeSlot')
            ?  $this->allow()
            : $this->deny(' can not open Create-TimeSlot');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create TimeSlot')
        ?  $this->allow()
        : $this->deny(' can not open Create-TimeSlot');
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
            return auth()->user()->hasPermissionTo('Edit TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Edit TimeSlot');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Edit TimeSlot');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit TimeSlot')
            ?  $this->allow()
            : $this->deny(' can not open Edit-TimeSlot');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit TimeSlot')
        ?  $this->allow()
        : $this->deny(' can not open Edit-TimeSlot');
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
            return auth()->user()->hasPermissionTo('Delete TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Delete TimeSlot');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete TimeSlot')
             ?  $this->allow()
             : $this->deny(' can not open Delete TimeSlot');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete TimeSlot')
            ?  $this->allow()
            : $this->deny(' can not open Delete-TimeSlot');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete TimeSlot')
        ?  $this->allow()
        : $this->deny(' can not open Delete-TimeSlot');
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