<?php

declare(strict_types=1);

namespace AleksandrIgnatov\SitemapGenerator\Classes;

use AleksandrIgnatov\SitemapGenerator\Dto\Page;
use AleksandrIgnatov\SitemapGenerator\Exception\ValidationException;
use AleksandrIgnatov\SitemapGenerator\Exception\XmlBuildException;
use SimpleXMLElement;

class XmlGenerator extends BaseSitemapGenerator implements SitemapInterface
{
    /**
     * @throws ValidationException
     * @throws XmlBuildException
     */
    public function generate(array $pages): string
    {
        $xml = new SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>');

        foreach ($pages as $page) {
            $page = new Page(...$page);
            $urlNode = $xml->addChild('url');
            $urlNode->addChild('loc', $page->loc);
            $urlNode->addChild('lastmod', $page->lastmod);
            $urlNode->addChild('priority', (string) $page->priority);
            $urlNode->addChild('changefreq', $page->changefreq);
        }

        if (is_bool($xml->asXML()))
            throw new XmlBuildException("XML sitemap build failed!");

        return $xml->asXML();
    }

    public function getFileName(): string
    {
        return "sitemap.xml";
    }
}