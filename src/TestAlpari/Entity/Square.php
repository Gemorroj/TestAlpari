<?php

namespace TestAlpari\Entity;

use Imagine\Image\Box;
use Imagine\Image\Palette\RGB;

class Square extends DrawingElement
{
    public function makeData($format = 'png', array $options = array('png_compression_level' => 9))
    {
        $this->params; // создаем картинку в зависимости от параметров

        $color = (new RGB())->color($this->params['color'] ?: '#000000');
        $size = new Box(
            mt_rand(250, 360),
            250
        );

        $image = $this->imagine->create($size, $color);

        $this->data = $image->get($format, $options);
    }
}
