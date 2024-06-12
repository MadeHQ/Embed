<?php
declare(strict_types = 1);

namespace Embed;

use JsonSerializable;
use ReturnTypeWillChange;

class EmbedCode implements JsonSerializable
{
    public $html;
    public $width;
    public $height;
    public $ratio = null;

    public function __construct(string $html, int $width = null, int $height = null)
    {
        $this->html = $html;
        $this->width = $width;
        $this->height = $height;

        if ($width && $height) {
            $this->ratio = round(($height / $width) * 100, 3);
        }
    }

    public function __toString(): string
    {
        return $this->html;
    }

    #[ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'html' => $this->html,
            'width' => $this->width,
            'height' => $this->height,
            'ratio' => $this->ratio,
        ];
    }
}
