<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'phone'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function filterAll($request)
    {
        $providers = Provider::where('name', 'like', '%' . $request->get('keyword') . '%');

        if(!empty($request->get('email')))
            $providers = Provider::where('email', 'like', '%' . $request->get('email') . '%');

        return $providers->paginate(10);
    }
}
