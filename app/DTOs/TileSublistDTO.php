<?php

namespace App\DTOs;

class TileSublistDTO
{
    public function __construct(
        public string $tile_categ,
        public string $tile_size,

       
        public float $sq_ft,
        public float $rate,
        public float $amount,

        public ?float $width = null,
        public ?float $height = null,

       
        public ?int $dark_box = null,
        public ?int $light_box = null,
        public ?int $highligter_box = null,

          public ?int $dark_line = null,
        public ?int $light_line = null,
        public ?string $highlighter_line = null,



    ) {}
}
