<?php

namespace AtroposMental\GoogleWorkspace;

use Illuminate\Support\Arr;
use Laravel\Socialite\Two\User;
use Laravel\Socialite\Two\GoogleProvider;
use SocialiteProviders\Manager\ConfigTrait;
use SocialiteProviders\Manager\Contracts\OAuth2\ProviderInterface;

class Provider extends GoogleProvider implements ProviderInterface {
    use ConfigTrait;

    /**
     * Unique Provider Identifier.
     */
    public const IDENTIFIER = 'GOOGLE_WORKSPACE';

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user) {
        return (new User)->setRaw($user)->map([
            'id' => Arr::get($user, 'sub'),
            'nickname' => Arr::get($user, 'nickname'),
            'name' => Arr::get($user, 'name'),
            'email' => Arr::get($user, 'email'),
            'avatar' => $avatarUrl = Arr::get($user, 'picture'),
            'avatar_original' => $avatarUrl,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenFields($code) {
        $fields = parent::getTokenFields($code);

        return array_merge($fields, [
            'prompt' => 'select_account',
        ]);
    }
}
