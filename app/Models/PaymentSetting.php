<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    protected $fillable = [
        'provider',
        'client_id',
        'client_secret',
        'webhook_secret',
        'sandbox_mode',
        'is_active',
        'settings',
    ];

    protected $casts = [
        'sandbox_mode' => 'boolean',
        'is_active' => 'boolean',
        'settings' => 'array',
        'client_secret' => 'encrypted',
        'webhook_secret' => 'encrypted',
    ];

    public static function getActiveProvider($provider = 'paypal')
    {
        return self::where('provider', $provider)
                   ->where('is_active', true)
                   ->first();
    }

    public function getApiUrlAttribute()
    {
        if ($this->provider === 'paypal') {
            return $this->sandbox_mode
                ? 'https://api.sandbox.paypal.com'
                : 'https://api.paypal.com';
        }
        return null;
    }
}
