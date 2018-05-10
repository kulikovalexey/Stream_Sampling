<?php

class Sampler
{
    /**
     * @var Traversable
     */
    private $iterator;

    /**
     * Sampler constructor.
     * @param Traversable $iterator
     */
    public function __construct(\Traversable $iterator)
    {
        $this->iterator = $iterator;
    }

    /**
     * @param $length
     * @return string
     */
    public function getSample($length)
    {
        $reservoir = [];
        $i = 0;

        foreach ($this->iterator as $item) {
            if ($i < $length) {
                $reservoir[$i] = $item;
            } else {
                $random = (int)mt_rand(0, $i);
                if ($random < $length) {
                    $reservoir[$random] = $item;
                }
            }

            $i++;
        }
        return implode('', $reservoir);
    }
}
