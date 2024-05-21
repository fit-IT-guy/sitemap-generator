<?php

declare(strict_types=1);

namespace AleksandrIgnatov\SitemapGenerator\Classes;

use AleksandrIgnatov\SitemapGenerator\Dto\Page;
use AleksandrIgnatov\SitemapGenerator\Exception\ValidationException;
use AleksandrIgnatov\SitemapGenerator\SitemapGenerator;

class ScvGenerator extends BaseSitemapGenerator implements SitemapInterface
{

    /**
     * @throws ValidationException
     */
    public function generate(array $pages): string
    {
        $scv = "loc;lastmod;priority;changefreq\n";

        foreach ($pages as $page) {
            $page = new Page(...$page);
            $scv .= sprintf("%s;%s;%.1f;%s\n",
                $page->loc,
                $page->lastmod,
                $page->priority,
                $page->changefreq,
            );
        }

        return $scv;
    }

    public function getFileName(): string
    {
        return "sitemap.scv";
    }
}