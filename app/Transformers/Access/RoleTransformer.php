<?php

namespace App\Transformers\Access;

use App\Models\Access\Role;
use App\Transformers\Transformer;
use App\Transformers\User\UserTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\NullResource;

class RoleTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected array $availableIncludes = [
        'permissions', 'users'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            'id'           => $role->id,
            'slug'         => $role->slug,
            'name'         => $role->name,
            'description'  => $role->description,
            'all'          => $role->all,
            'locked'       => $role->locked,
        ];
    }

    /**
     * Include the permissions of the role.
     *
     * @param Role $role
     * @return Collection|NullResource
     */
    public function includePermissions(Role $role)
    {
        $permissions = $role->permissions;

        return $permissions
            ? $this->collection($permissions, new PermissionTransformer)
            : $this->null();
    }

    /**
     * Include the users associated with the role.
     *
     * @param Role $role
     * @return Collection|NullResource
     */
    public function includeUsers(Role $role)
    {
        $users = $role->users;

        return $users
            ? $this->collection($users, new UserTransformer)
            : $this->null();
    }
}
