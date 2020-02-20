<?php

namespace App;

use Image;

class _image
{

    public function __construct($type, $resolution, $imageName)
    {
        $path = public_path('uploads/' . $type . '/' . $resolution);
        if (!file_exists($path)) {
            mkdir($path);
        }
        $this->resolution        = $resolution;
        $this->allowedDimensions = config('imagesize');
        $this->original          = public_path('uploads/' . $type . '/' . $imageName);
        $this->newimage          = public_path('uploads/' . $type . '/' . $resolution . '/' . $imageName);
        $this->newimage_asset    = asset('uploads/' . $type . '/' . $resolution . '/' . $imageName);

        $this->generate();

    }

    public function generate()
    {
        if (!file_exists($this->original) || !$this->isValidResolution()) {
            return false;
        }

        list($width, $height) = $this->extractDimensions($this->resolution);
        $mage                 = Image::make($this->original);
        $mage->fit($width, $height);
        $mage->save($this->newimage);
    }

    /**
     * Is valid image resolution.
     *
     * @param string $resolution
     *
     * @return bool
     */
    protected function isValidResolution()
    {
        $resolution = $this->resolution;
        if ($this->allowedDimensions == '*') {
            return true;
        }

        if (strpos($resolution, 'x') === false) {
            return false;
        }

        list($width, $height) = $this->extractDimensions($resolution);

        if (!is_numeric($width) || !is_numeric($height)) {
            return false;
        }

        return $this->isAllowedDimensions($width, $height);
    }

    /**
     * Check for valid image dimension.
     *
     * @param int $width
     * @param int $height
     *
     * @return array
     */
    protected function isAllowedDimensions($width, $height)
    {
        return in_array([$width, $height], $this->allowedDimensions);
    }

    /**
     * Get Image Size
     *
     * @param string $size
     *
     * @return array
     */
    protected function extractDimensions($size)
    {
        $size = $this->resolution;

        list($width, $height) = explode('x', $size);

        return [(int) $width, (int) $height];
    }

    public function __toString()
    {
        return $this->newimage_asset;
    }

}
