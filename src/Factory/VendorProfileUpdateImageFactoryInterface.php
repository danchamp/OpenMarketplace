<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Factory;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorImageInterface;
use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\VendorProfileInterface;
use Sylius\Component\Core\Model\ImageInterface;

interface VendorProfileUpdateImageFactoryInterface
{
    public function createNew(): VendorImageInterface;

    public function create(string $path): VendorImageInterface;

    public function createWithFileAndOwner(ImageInterface $uploadedImage, VendorProfileInterface $vendorProfile): VendorImageInterface;
}
