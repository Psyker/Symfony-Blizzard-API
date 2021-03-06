<?php

namespace AppBundle\Service;

use Psr\Http\Message\ResponseInterface;

class CommunityOAuth extends Service
{
    // region Account API
    /**
     * Get user
     *
     * Returns the account information of a user
     *
     * @param null|string $accessToken Authorized user access token
     * @param array       $options     Options
     *
     * @return ResponseInterface
     */
    public function getUser($accessToken = null, array $options = [])
    {
        if (null === $accessToken) {
            $options['access_token'] = $this->blizzardClient->getAccessToken();
        } else {
            $options['access_token'] = $accessToken;
        }
        return $this->request('/account/user', $options);
    }

}
