<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CategoriaVeiculo;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriaVeiculoPolicy
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
     * @param  \App\Models\CategoriaVeiculo  $categoriaVeiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CategoriaVeiculo $categoriaVeiculo)
    {
        return $user->id == $categoriaVeiculo->user_id;
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
     * @param  \App\Models\CategoriaVeiculo  $categoriaVeiculo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CategoriaVeiculo $categoriaVeiculo)
    {
        return $user->id == $categoriaVeiculo->user_id;
    }
}
