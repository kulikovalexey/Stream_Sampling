<?php

class IteratorFactory
{
    /**
     * @var
     */
    protected $source;

    /**
     * IteratorFactory constructor.
     * @param $source
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * @return ArrayIterator|StreamIterator
     * @throws Exception
     */
    public function createIterator()
    {
        switch ($this->source) {
            case 'stdin':
                return new StreamIterator('php://stdin');
            case 'random':
                return new ArrayIterator($this->getRandomString());
            case 'url':
                return new StreamIterator(RANDOM_ORG_URL);
            default:
                throw new Exception('Undefined stream type');
        }
    }

    /**
     * generate random string
     * @return array
     */
    protected function getRandomString()
    {
        $str = '';
        $characters = range('A','Z');
        $max = count($characters) - 1;

        for ($i = 0; $i < DEFAULT_SOURCE_LENGTH; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        return str_split($str);

    }
}