<?php

namespace App\Domain\Entities;

use App\Models\User as ModelsUser;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends ModelsUser implements JWTSubject
{
    // JWTSubject methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
