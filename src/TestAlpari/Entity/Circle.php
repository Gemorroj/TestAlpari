<?php

namespace TestAlpari\Entity;

use Imagine\Image\Box;
use Imagine\Image\Palette\RGB;
use Imagine\Image\Point;

class Circle extends DrawingElement
{
    public function makeData($format = 'png', array $options = array('png_compression_level' => 9))
    {
        $this->params; // создаем картинку в зависимости от параметров

        $color = (new RGB())->color('#ffffff', 0);
        $size = new Box(
            mt_rand(250, 360),
            250
        );

        $image = $this->imagine->create($size, $color);

        $image->draw()
            ->ellipse(
                new Point(180, 125),
                $size,
                $image->palette()->color($this->params['color'] ?: '#000000'),
                true,
                $this->params['thickness']
            );

        $this->data = $image->get($format, $options);
    }
}
