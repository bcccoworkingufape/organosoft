<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Maquina;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaquinaPolicy
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
     * @param  \App\Models\Veiculo  $maquina
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Maquina $maquina)
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
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Maquina $veiculo)
    {
        return true;
    }
}
