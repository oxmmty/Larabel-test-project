<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Customer extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name',
        'customer_id',
        'password',
        'gender',
        'avatar',
        'job_type',
        'detail',
    ];
}