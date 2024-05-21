<?php

declare(strict_types=1);

namespace AleksandrIgnatov\SitemapGenerator\Classes;

use AleksandrIgnatov\SitemapGenerator\Dto\Page;
use AleksandrIgnatov\SitemapGenerator\Exception\ValidationException;
use AleksandrIgnatov\SitemapGenerator\SitemapGenerator;

class JsonGenerator extends BaseSitemapGenerator implements SitemapInterface
{

    /**
     * @throws ValidationException
     */
    public function generate(array $pages): string
    {
        $json = [];

        foreach ($pages as $page) {
            $page = new Page(...$page);
            $json[] = $page;
        }

        return json_encode($json);
    }

    public function getFileName(): string
    {
        return "sitemap.json";
    }
}