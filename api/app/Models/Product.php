<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image_path', 'price', 'quantity'
    ];

    public function sales(): Relation
    {
        return $this->hasMany(Sale::class);
    }
}
