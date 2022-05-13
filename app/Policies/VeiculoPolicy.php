<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Auth\Access\HandlesAuthorization;

class VeiculoPolicy
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
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Veiculo $veiculo)
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
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Veiculo $veiculo)
    {
        return true;
    }
}
