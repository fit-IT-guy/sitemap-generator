<?php

namespace AleksandrIgnatov\SitemapGenerator\Factory;

use AleksandrIgnatov\SitemapGenerator\Classes\SitemapInterface;
use AleksandrIgnatov\SitemapGenerator\ValueObject\FileType;

interface GeneratorFactoryInterface
{
    public function getGenerator(FileType $type): SitemapInterface;
}