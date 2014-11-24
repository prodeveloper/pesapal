<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 24/11/14
 * Time: 12:40
 */

namespace Pesapal\Values;


class IframeDimensions
{
    protected $height;
    protected $width;
    protected $scrolling;
    protected $frameBorder;

    function __construct($height="620px", $width="500px", $scrolling="no", $frameBorder="0")
    {
        $this->frameBorder = $frameBorder;
        $this->height = $height;
        $this->scrolling = $scrolling;
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getFrameBorder()
    {
        return $this->frameBorder;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getScrolling()
    {
        return $this->scrolling;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

} 