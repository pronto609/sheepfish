<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone'];
    protected $with = ['company'];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
