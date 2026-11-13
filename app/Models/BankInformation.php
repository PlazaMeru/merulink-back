<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankInformation extends Model
{
    protected $fillable = [
        'employee_id',
        'bank_name',
        'account_number',
        'mobile_pay_number',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
