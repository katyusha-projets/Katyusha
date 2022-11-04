<?php

namespace Katyusha\Clients\OAuth;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use DTO\User\UserDTO;
use DTO\OAuth\OauthDTO;
use Katyusha\Infrastructure\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Katyusha\Clients\OAuth\Exceptions\OauthModelHandleException;

/**
 * @property mixed   id
 * @property string  token
 * @property string  refresh_token
 * @property Carbon  token_expires_at
 * @property string  provider
 * @property mixed   provider_user_id
 * @property ?string avatar
 * @property ?string nickname
 * @property ?string name
 * @property ?string email
 * @property string user_id
 * @property User user
 */
class OAuthModel extends Model {
    protected $table    = 'oauth';
    protected $dates    = ['token_expires_at'];
    protected $fillable = ['user_id', 'token', 'provider', 'avatar', 'nickname', 'name', 'email', 'refresh_token', 'token_expires_at', 'provider_user_id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public static function getExisting(string $provider, mixed $providerUserId): ?self {
        return self::whereProvider($provider)->whereProviderUserId($providerUserId)->first();
    }

    /**
     * @throws OauthModelHandleException
     * @throws Throwable
     */
    public static function getOrCreate(OauthDTO $dto): self {
        $tokenExpiry = static::calculateExpiry($dto->expiresIn);

        if ($existing = static::getExisting($dto->provider, $dto->id)) {
            $existing->refresh_token    = $dto->refreshToken;
            $existing->token_expires_at = $tokenExpiry;
            $existing->token            = $dto->token;
            $existing->save();

            return $existing;
        }

        $userDTO = new UserDTO(username: $dto->nickname, email: $dto->email);

        try {
            $user = User::newUser($userDTO);
        } catch(Throwable $e) {
            throw new OauthModelHandleException($e->getMessage(), $e->getCode(), $e);
        }

        return static::make()->fill(
            array_merge($dto->toArray(), ['user_id' => $user->id, 'refresh_token' => $dto->refreshToken, 'token_expires_at' => $tokenExpiry, 'provider_user_id' => $dto->id])
        )->saveAndReturn();
    }

    /**
     * @throws OauthModelHandleException
     * @throws Throwable
     */
    public static function handle(OauthDTO $dto): User {
        return self::getOrCreate($dto)->user;
    }

    protected static function calculateExpiry(int $expiresIn): Carbon {
        return Carbon::now()->addSeconds($expiresIn - 60);
    }
}
