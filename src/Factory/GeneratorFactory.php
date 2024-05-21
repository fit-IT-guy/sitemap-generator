<?php

namespace AleksandrIgnatov\SitemapGenerator\Factory;

use AleksandrIgnatov\SitemapGenerator\Classes\JsonGenerator;
use AleksandrIgnatov\SitemapGenerator\Classes\ScvGenerator;
use AleksandrIgnatov\SitemapGenerator\Classes\SitemapInterface;
use AleksandrIgnatov\SitemapGenerator\Classes\XmlGenerator;
use AleksandrIgnatov\SitemapGenerator\ValueObject\FileType;

class GeneratorFactory
{
    public function getGenerator(FileType $type): SitemapInterface
    {
        return match ($type) {
            FileType::CSV => new ScvGenerator(),
            FileType::JSON => new JsonGenerator(),
            FileType::XML => new XmlGenerator(),
        };
    }
}