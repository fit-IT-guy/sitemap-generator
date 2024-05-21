<?php

namespace AleksandrIgnatov\SitemapGenerator\Classes;

interface SitemapInterface
{
    public function generate(array $pages): string;
    public function getFileName(): string;
}