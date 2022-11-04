<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use Katyusha\Infrastructure\Eloquent\Model;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string key
 * @property ?string user_id
 * @property ?User user
 */
class Session extends Model {
    protected $table    = 'user.sessions';
    public $timestamps  = true;

    public static function boot() {
        parent::boot();

        static::creating(static function (self $model) {
            $model->key = Str::random(256);
        });
    }

    protected static string $sessionCookieName = '_s';

    public static function currentUser(): ?User {
        return User::where('username', 'katyusha')->first();
    }

    protected static function getSessionCookie(): ?string {
        $encrypted = Cookie::get(self::$sessionCookieName);

        if (!$encrypted) {
            return null;
        }

        return Crypt::decryptString($encrypted);
    }

    protected static function setSessionCookie(string $key): void {
        Cookie::queue(self::$sessionCookieName, Crypt::encryptString($key), Carbon::now()->addYears(10)->timestamp);
    }

    public function saveCookie(): self {
        self::setSessionCookie($this->key);

        return $this;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function loadFromRequest(): ?self {
        if (!$key = self::getSessionCookie()) {
            return null;
        }

        return self::getBykey($key);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public static function getBykey(string $key): ?static {
        return static::where('key', $key)->first();
    }
}
