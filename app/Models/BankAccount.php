<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "first_name", "last_name", "date_of_birth", "address", "city", "province", "postcode", "country", "account_no", "transit_no", "institution_no", "currency", "term_condition"];
}
