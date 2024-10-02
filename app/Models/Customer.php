<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable=[
      "customer_name" ,
      "email",
      "mobile_no",
      "address",
      "zip_code",
      "country",
      "state",
      "city",
      "tax_identification_no",
      "account_type",
      "opening_balance" ,
      "document_type",
      "document_no",
      "date_of_birth" ,
      "anniversary_date",
      "credit_allowed",
      "credit_limit",
      "remark",
      "avatar",     
            ];
}
