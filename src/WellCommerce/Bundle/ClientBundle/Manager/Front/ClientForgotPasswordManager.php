<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\ClientBundle\Manager\Front;

use WellCommerce\Bundle\ClientBundle\Entity\ClientInterface;
use WellCommerce\Bundle\ClientBundle\Exception\ResetPasswordException;
use WellCommerce\Bundle\CoreBundle\Manager\Front\AbstractFrontManager;

/**
 * Class ClientForgotPasswordManager
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ClientForgotPasswordManager extends AbstractFrontManager
{
    public function resetPassword($username)
    {
        if (false === filter_var($username, FILTER_VALIDATE_EMAIL)) {
            throw new ResetPasswordException('client.flash.reset_password.wrong_email');
        }

        if (null === $client = $this->findClient($username)) {
            throw new ResetPasswordException(sprintf('client.flash.reset_password.email_not_found', $username));
        }

        $this->setClientResetPasswordHash($client);
        $this->sendResetInstructions($client);
    }

    /**
     * @param ClientInterface $client
     *
     * @return int
     */
    protected function setClientResetPasswordHash(ClientInterface $client)
    {
        $hash = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36) . $client->getId();
        $client->getClientDetails()->setResetPasswordHash($hash);
        $this->updateResource($client);
    }

    /**
     * Sends the reset instructions to client
     *
     * @param ClientInterface $client
     *
     * @return int
     */
    protected function sendResetInstructions(ClientInterface $client)
    {
        $email      = $client->getContactDetails()->getEmail();
        $title      = $this->getTranslatorHelper()->trans('client.email.heading.reset_password');
        $template   = 'WellCommerceClientBundle:Email:reset_password.html.twig';
        $parameters = ['client' => $client];
        $shop       = $client->getShop();

        return $this->getMailerHelper()->sendEmail($email, $title, $template, $parameters, $shop->getMailerConfiguration());
    }

    /**
     * Returns the client's account or null if it was not found
     *
     * @param string $username
     *
     * @return null|ClientInterface
     */
    protected function findClient($username)
    {
        $resource = $this->getRepository()->findOneBy(['clientDetails.username' => $username]);

        return $resource;
    }
}
