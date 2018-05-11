#!/usr/bin/php
<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

define('DEFAULT_SOURCE_LENGTH', 1000);
define('RANDOM_ORG_URL', 'https://www.random.org/strings/?num=10&len=10&upperalpha=on&unique=on&format=plain&rnd=new');

$options = getopt('', ['source:', 'length:']);
if (!isset($options['source']) || !isset($options['length'])) {
    echo 'Missed options: --source=(stdin, random, url) --length=5';
    exit;
}

$iterator = (new IteratorFactory($options["source"]))->createIterator();

$sampler = new Sampler($iterator);

$sample = $sampler->getSample($options['length']);

echo 'random sample: ' . $sample . "\n";
