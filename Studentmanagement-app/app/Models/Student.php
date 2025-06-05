<?php

namespace App\Models;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request; 
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Student extends Model
{
    use HasFactory;

    protected $table = 'Students';
    protected $primaryKey = 'id';
 protected $fillable = ['name', 'address', 'mobile'];
}
