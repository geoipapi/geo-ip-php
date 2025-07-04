<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace geoipapi\geoipapi\Models\Components;


class AsnInfo
{
    /**
     *
     * @var ?int $number
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('number')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $number = null;

    /**
     *
     * @var ?string $name
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('name')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $name = null;

    /**
     *
     * @var ?string $network
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('network')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $network = null;

    /**
     *
     * @var ?string $type
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('type')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $type = null;

    /**
     * @param  ?int  $number
     * @param  ?string  $name
     * @param  ?string  $network
     * @param  ?string  $type
     * @phpstan-pure
     */
    public function __construct(?int $number = null, ?string $name = null, ?string $network = null, ?string $type = null)
    {
        $this->number = $number;
        $this->name = $name;
        $this->network = $network;
        $this->type = $type;
    }
}