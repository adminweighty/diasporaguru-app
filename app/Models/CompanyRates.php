<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRates extends Model
{
    use HasFactory;
    protected $fillable = ['company_logo', 'company_rates_type', 'company_name', 'company_exchange_rate', 'company_charges_rate', 'company_mark_up', 'company_website',];
}
