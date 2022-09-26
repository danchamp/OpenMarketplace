<?php

declare(strict_types=1);

namespace BitBag\SyliusMultiVendorMarketplacePlugin\Cloner;

use BitBag\SyliusMultiVendorMarketplacePlugin\Entity\ProductListing\DraftAttributeInterface;

interface AttributeTranslationClonerInterface
{
    public function clone(DraftAttributeInterface $draftAttribute): void;
}