<?php

namespace AtroposMental\GoogleWorkspace;

use SocialiteProviders\Manager\SocialiteWasCalled;

class GoogleWorkspaceExtendSocialite {
    /**
     * Register the provider.
     *
     * @param \SocialiteProviders\Manager\SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled) {
        $socialiteWasCalled->extendSocialite('google-workspace', Provider::class);
    }
}
