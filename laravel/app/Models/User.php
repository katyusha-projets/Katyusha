<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Katyusha\Infrastructure\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Katyusha\Infrastructure\Eloquent\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string id
 * @property string name
 * @property string email
 * @property int mobile_country_code
 * @property int mobile
 * @property int login_code
 * @property string username
 * @property string avatar
 * @property string banner
 * @property string name_first
 * @property string name_last
 * @property string tagline
 * @property ?string address
 * @property ?string city
 * @property ?string|int zip
 * @property ?string country
 */
class User extends Authenticatable {
    use HasApiTokens;
    use HasFactory;
    use Notifiable;


    protected  $hidden   = ['password', 'remember_token'];
    protected $table     = 'users';
    protected $fillable  = ['name', 'email', 'mobile_country_code', 'mobile', 'address', 'city', 'zip', 'country'];

    public static function loginOrRegister(int $mobileNumber, int $loginCode): static {
        if (!$user = static::where('mobile', $mobileNumber)->where('login_code', $loginCode)->first()) {
            $user             = new static();
            $user->mobile     = $mobileNumber;
            $user->login_code = $loginCode;
        }

        if ($session = Session::loadFromRequest()) {
            $session->customer_id = $user->id;
            $session->save();
        }

        return $user;
    }

    public static function me(): ?static {
        return Auth::user();
    }

    public function banner(): Attribute {
        return Attribute::make(get: static fn (?string $value) => self::mediaUrl($value));
    }

    public function avatar(): Attribute {
        return Attribute::make(get: static fn (?string $value) => self::mediaUrl($value));
    }

    public static function usernameQuery(string $username): Builder {
        return static::where('username', $username);
    }
}
