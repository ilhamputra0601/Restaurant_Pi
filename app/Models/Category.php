<?php

namespace App\Models;

use App\Models\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $load = ['category'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
