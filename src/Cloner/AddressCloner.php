<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use Sylius\Component\Core\Model\AddressInterface;

final class AddressCloner implements AddressClonerInterface
{
    public function clone(AddressInterface $originalAddress, AddressInterface $newAddress): void
    {
        $newAddress->setCreatedAt($originalAddress->getCreatedAt());
        $newAddress->setFirstName($originalAddress->getFirstName());
        $newAddress->setLastName($originalAddress->getLastName());
        $newAddress->setCity($originalAddress->getCity());
        $newAddress->setStreet($originalAddress->getStreet());
        $newAddress->setCompany($originalAddress->getCompany());
        $newAddress->setPostcode($originalAddress->getPostcode());
        $newAddress->setCountryCode($originalAddress->getCountryCode());
        $newAddress->setProvinceCode($originalAddress->getProvinceCode());
        $newAddress->setProvinceName($originalAddress->getProvinceName());
    }
}
