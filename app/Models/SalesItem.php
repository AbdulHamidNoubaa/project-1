<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;
    protected $fillable = ['id','prodid',"sales_id","qoun","descont","total","user_id","created_at"];
    protected $table = "sales_items";
}
