<?php

namespace AleksandrIgnatov\SitemapGenerator\Classes;

use AleksandrIgnatov\SitemapGenerator\Exception\ValidationException;
use AleksandrIgnatov\SitemapGenerator\Exception\XmlBuildException;

interface SitemapInterface
{
    /**
     * @throws ValidationException
     * @throws XmlBuildException
     */
    public function generate(array $pages): string;
    public function getFileName(): string;
}