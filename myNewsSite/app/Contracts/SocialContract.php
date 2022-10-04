<?php

declare(strict_types=1);

namespace App\Contracts;

use Laravel\Socialite\Contracts\User as SocialUser;

interface SocialContract

/**
 * @param SocialUser $socialUser
 * @return string
 */

{
    public function loginAndGetRedirectUrl(SocialUser $socialUser): string;
}
