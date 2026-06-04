<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rolename',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sp_GetAllUsers($user_Id)
    {
        return DB::select(
            'SELECT id AS Id, name, email, rolename FROM users WHERE id != ?',
            [$user_Id]
        );
    }

    public function sp_GetUserById($user_Id)
    {
        return DB::selectOne(
            'SELECT id AS Id, name, email, rolename FROM users WHERE id = ?',
            [$user_Id]
        );
    }

    public function sp_GetAllUserroles()
    {
        return DB::select('SELECT DISTINCT rolename FROM users');
    }

    public function sp_UpdateUser($id, $name, $email, $rolename)
    {
        return DB::update(
            'UPDATE users SET name = ?, email = ?, rolename = ? WHERE id = ?',
            [$name, $email, $rolename, $id]
        );
    }

    public function sp_DeleteUser($userId)
    {
        return DB::delete('DELETE FROM users WHERE id = ?', [$userId]);
    }
}
