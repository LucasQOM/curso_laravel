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
    ];

    // public function filterAll($request)
    // {
    //     $providers = Provider::where('name', 'like', '%' . $request->get('keyword') . '%');

    //     if(!empty($request->get('email')))
    //         $providers = Provider::where('email', 'like', '%' . $request->get('email') . '%');

    //     if(!empty($request->get('phone')))
    //     $providers = Provider::where('phone', 'like', '%' . $request->get('phone') . '%');
    //     return $providers->paginate(10);
    // }

    public function filterAll($request)
    {
        $providers = Provider::where('name', 'like', '%' . $request->get('keyword') . '%')
                            ->where('email', 'like', '%' . $request->get('email') . '%')
                            ->where('phone',  'like', '%' . $request->get('phone') . '%');
    switch($request->get('order_by')){
        case 'name':
            $providers = $providers->orderBy('name', 'asc');
            break;
        case 'email':
            $providers = $providers->orderBy('email', 'asc');
            break;
        case 'phone':
            $providers = $providers->orderBy('phone', 'asc');
            break;
    }

    $providers = $providers->paginate(10);

        return $providers;
    }
}
