<?php

namespace TestAlpari\Entity;

use Imagine\Gd\Imagine as GdImagine;
use Imagine\Imagick\Imagine as ImagickImagine;

abstract class DrawingElement implements \JsonSerializable
{
    const DRIVER_GD = 'gd';
    const DRIVER_IMAGICK = 'imagick';

    protected $data;
    protected $params = array();
    protected $imagine;

    /**
     * DrawingElement constructor.
     * @param string $driverName
     */
    public function __construct($driverName = self::DRIVER_GD)
    {
        switch ($driverName) {
            case self::DRIVER_GD:
                $this->imagine = new GdImagine();
                break;

            case self::DRIVER_IMAGICK:
                $this->imagine = new ImagickImagine();
                break;

            default:
                throw new \InvalidArgumentException(
                    sprintf('Incorrect graphic driver "%s".', $driverName)
                );
                break;
        }
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * make data
     * @return void
     */
    abstract public function makeData();

    /**
     * @return string
     */
    public function jsonSerialize()
    {
        return \base64_encode($this->data);
    }
}
