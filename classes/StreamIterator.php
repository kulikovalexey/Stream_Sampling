<?php

class StreamIterator implements \IteratorAggregate
{
    /**
     * @var url
     */
    private $url;

    /**
     * StreamIterator constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return Generator
     */
    public function getIterator()
    {
        $stream = fopen($this->url, 'r');

        while ($char = fgetc($stream)) {
            if ($char != ' ')
            yield $char;
        }
        fclose($stream);
    }
}
