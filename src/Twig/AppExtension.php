<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter("price", [$this, "priceFormat"])
        ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction("lorem", [$this, "loremGenerator"])
        ];
    }

    public function priceFormat(float $number, int $decimal = 0)
    {
        $price = number_format($number, $decimal);
        return "$price €";
    }

    public function loremGenerator()
    {
        return "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit veniam quasi maxime dolorum cumque consectetur officia aliquid tenetur voluptatibus quo repellat, animi fuga est expedita, nobis voluptates veritatis dolorem unde.";
    }
}
