<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
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
            return auth()->user()->hasPermissionTo('Index Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Index Reservation');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Index Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Index Reservation');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Index Reservation')
            ?  $this->allow()
            : $this->deny(' can not open Index-Reservation');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Index Reservation')
        ?  $this->allow()
        : $this->deny(' can not open Index-Reservation');
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
            return auth()->user()->hasPermissionTo('Show Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Show Reservation');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Show Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Show Reservation');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Show Reservation')
            ?  $this->allow()
            : $this->deny(' can not open Show-Reservation');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Show Reservation')
        ?  $this->allow()
        : $this->deny(' can not open Show-Reservation');
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
            return auth()->user()->hasPermissionTo('Create Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Create Reservation');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Create Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Create Reservation');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Create Reservation')
            ?  $this->allow()
            : $this->deny(' can not open Create-Reservation');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Create Reservation')
        ?  $this->allow()
        : $this->deny(' can not open Create-Reservation');
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
            return auth()->user()->hasPermissionTo('Edit Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Edit Reservation');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Edit Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Edit Reservation');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Edit Reservation')
            ?  $this->allow()
            : $this->deny(' can not open Edit-Reservation');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Edit Reservation')
        ?  $this->allow()
        : $this->deny(' can not open Edit-Reservation');
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
            return auth()->user()->hasPermissionTo('Delete Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Delete Reservation');
         }
         elseif(auth('supplier')->check()){
            return auth()->user()->hasPermissionTo('Delete Reservation')
             ?  $this->allow()
             : $this->deny(' can not open Delete Reservation');
        } 
        elseif(auth('renter')->check()){
            return auth()->user()->hasPermissionTo('Delete Reservation')
            ?  $this->allow()
            : $this->deny(' can not open Delete-Reservation');
       } 
       elseif(auth('buyer')->check()){
        return auth()->user()->hasPermissionTo('Delete Reservation')
        ?  $this->allow()
        : $this->deny(' can not open Delete-Reservation');
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