<?php

declare(strict_types=1);

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Repository;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorInterface;
use Sylius\Component\Core\Model\ChannelInterface;

interface VendorShippingMethodRepositoryInterface
{
    public function findEnabledForChannel(VendorInterface $vendor, ChannelInterface $channel): array;
}
