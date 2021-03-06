<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [ 'password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // public function filterAll($request)
    // {
    //     $users = User::where('name', 'like', '%' . $request->get('keyword') . '%');

    //     if(!empty($request->get('email')))
    //         $users = User::where('email', 'like', '%' . $request->get('email') . '%');

    //     return $users->paginate(10);
    // }

    public function filterAll($request)
    {
        $users = User::where('name', 'like', '%' . $request->get('keyword') . '%')
                            ->where('email', '>=', $request->get('email') ?? 0);
    switch($request->get('order_by')){
        case 'name':
            $users = $users->orderBy('name', 'asc');
            break;
        case 'email':
            $users = $users->orderBy('email', 'asc');
            break;
    }

    $users = $users->paginate(10);

        return $users;
    }

}
