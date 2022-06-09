<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Task extends Model
{
    use HasFactory, FilterQueryString;
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'status',
        'user_id',
    ];

    protected $filters = [
        'sort',
        'in',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
