<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Equipamento;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipamentoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Equipamento  $Equipamento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Equipamento $equipamento)
    {
        return true;
    }


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Equipamento  $Equipamento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Equipamento $equipamento)
    {
        return true;
    }
}
