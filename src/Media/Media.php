<?php

namespace Okipa\LaravelBootstrapComponents\Media;

use Okipa\LaravelBootstrapComponents\Component;

abstract class Media extends Component
{
    /**
     * The image src.
     *
     * @property string $src
     */
    protected $src;

    /**
     * Set the image src.
     *
     * @param string $src
     *
     * @return \Okipa\LaravelBootstrapComponents\Media\Media
     */
    public function src(string $src): Media
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Set the image values.
     *
     * @return array
     */
    protected function values(): array
    {
        return array_merge(parent::values(), [
            'src' => $this->src,
        ]);
    }

    /**
     * Check the component values validity
     */
    protected function checkValuesValidity(): void
    {
        //
    }
}
