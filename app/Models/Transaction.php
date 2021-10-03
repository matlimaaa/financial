<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'code',
        'description',
        'full_description',
        'date',
        'price',
        'current_account',
        'by_admin',
        'status',
        'document_number',
        'document_batch',
        'document_protocol', 
        'account_id'
    ];
}
