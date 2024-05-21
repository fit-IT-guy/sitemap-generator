<?php

use AleksandrIgnatov\SitemapGenerator\ValueObject\ChangeFreq;
use AleksandrIgnatov\SitemapGenerator\ValueObject\FileType;
use PHPUnit\Framework\TestCase;
use AleksandrIgnatov\SitemapGenerator\SitemapGenerator;

class SitemapGeneratorTest extends TestCase
{
    private const TEST_DATA = [
        [
            'loc' => 'http://examp.le/some-page',
            'lastmod' => '2024-05-20',
            'priority' => 0.7,
            'changefreq' => 'monthly'
        ],
        [
            'loc' => 'http://examp.le/another-page',
            'lastmod' => '2024-04-15',
            'priority' => 0.5,
            'changefreq' => 'weekly'
        ],
        [
            'loc' => 'http://examp.le/yet-another-page',
            'lastmod' => '2024-03-01',
            'priority' => 0.8,
            'changefreq' => 'daily'
        ],
        [
            'loc' => 'http://examp.le/one-more-page',
            'lastmod' => '2024-02-28',
            'priority' => 0.6,
            'changefreq' => 'yearly'
        ],
        [
            'loc' => 'http://examp.le/and-one-more',
            'lastmod' => '2024-01-31',
            'priority' => 0.9,
            'changefreq' => 'never'
        ],
        [
            'loc' => 'http://examp.le/another-example',
            'lastmod' => '2023-12-30',
            'priority' => 0.4,
            'changefreq' => 'hourly'
        ],
        [
            'loc' => 'http://examp.le/example-of-change',
            'lastmod' => '2023-11-29',
            'priority' => 0.3,
            'changefreq' => 'weekly'
        ],
        [
            'loc' => 'http://examp.le/change-freq-option',
            'lastmod' => '2023-10-28',
            'priority' => 0.2,
            'changefreq' => 'monthly'
        ],
        [
            'loc' => 'http://examp.le/priority-range',
            'lastmod' => '2023-09-27',
            'priority' => 0.1,
            'changefreq' => 'yearly'
        ],
        [
            'loc' => 'http://examp.le/unique-url',
            'lastmod' => '2023-08-26',
            'priority' => 0.7,
            'changefreq' => 'always'
        ],
        [
            'loc' => 'http://examp.le/another-unique',
            'lastmod' => '2023-07-25',
            'priority' => 0.5,
            'changefreq' => 'hourly'
        ],
        [
            'loc' => 'http://examp.le/unique-path',
            'lastmod' => '2023-06-24',
            'priority' => 0.8,
            'changefreq' => 'daily'
        ],
        [
            'loc' => 'http://examp.le/unique-content',
            'lastmod' => '2023-05-23',
            'priority' => 0.6,
            'changefreq' => 'weekly'
        ],
        [
            'loc' => 'http://examp.le/unique-feature',
            'lastmod' => '2023-04-22',
            'priority' => 0.9,
            'changefreq' => 'monthly'
        ],
        [
            'loc' => 'http://examp.le/unique-value',
            'lastmod' => '2023-03-21',
            'priority' => 0.4,
            'changefreq' => 'yearly'
        ],
        [
            'loc' => 'http://examp.le/unique-keyword',
            'lastmod' => '2023-02-20',
            'priority' => 0.3,
            'changefreq' => 'never'
        ],
        [
            'loc' => 'http://examp.le/new-page-1',
            'lastmod' => '2024-05-20',
            'priority' => 0.7,
            'changefreq' => 'monthly'
        ],
        [
            'loc' => 'http://examp.le/new-page-2',
            'lastmod' => '2024-05-20',
            'priority' => 0.5,
            'changefreq' => 'weekly'
        ],
        [
            'loc' => 'http://examp.le/new-page-3',
            'lastmod' => '2024-05-20',
            'priority' => 0.8,
            'changefreq' => 'daily'
        ],
        [
            'loc' => 'http://examp.le/new-page-4',
            'lastmod' => '2024-05-20',
            'priority' => 0.6,
            'changefreq' => 'yearly'
        ],
        [
            'loc' => 'http://examp.le/new-page-5',
            'lastmod' => '2024-05-20',
            'priority' => 0.9,
            'changefreq' => 'never'
        ],
        [
            'loc' => 'http://examp.le/new-page-6',
            'lastmod' => '2024-05-20',
            'priority' => 0.4,
            'changefreq' => 'hourly'
        ],
        [
            'loc' => 'http://examp.le/new-page-7',
            'lastmod' => '2024-05-20',
            'priority' => 0.3,
            'changefreq' => 'weekly'
        ],
        [
            'loc' => 'http://examp.le/new-page-8',
            'lastmod' => '2024-05-20',
            'priority' => 0.2,
            'changefreq' => 'monthly'
        ],
        [
            'loc' => 'http://examp.le/new-page-9',
            'lastmod' => '2024-05-20',
            'priority' => 0.1,
            'changefreq' => 'yearly'
        ],
        [
            'loc' => 'http://examp.le/new-page-10',
            'lastmod' => '2024-05-20',
            'priority' => 0.7,
            'changefreq' => 'always'
        ],
        [
            'loc' => 'http://examp.le/new-page-11',
            'lastmod' => '2024-05-20',
            'priority' => 0.5,
            'changefreq' => 'hourly'
        ],
        [
            'loc' => 'http://examp.le/new-page-12',
            'lastmod' => '2024-05-20',
            'priority' => 0.8,
            'changefreq' => 'daily'
        ],
        [
            'loc' => 'http://examp.le/new-page-13',
            'lastmod' => '2024-05-20',
            'priority' => 0.6,
            'changefreq' => 'weekly'
        ],
        [
            'loc' => 'http://examp.le/new-page-14',
            'lastmod' => '2024-05-20',
            'priority' => 0.9,
            'changefreq' => 'monthly'
        ],
        [
            'loc' => 'http://examp.le/new-page-15',
            'lastmod' => '2024-05-20',
            'priority' => 0.4,
            'changefreq' => 'yearly'
        ],
        [
            'loc' => 'http://examp.le/new-page-16',
            'lastmod' => '2024-05-20',
            'priority' => 0.3,
            'changefreq' => 'never'
        ],
        [
            'loc' => 'http://examp.le/new-page-17',
            'lastmod' => '2024-05-20',
            'priority' => 0.2,
            'changefreq' => 'hourly'
        ],
        [
            'loc' => 'http://examp.le/new-page-18',
            'lastmod' => '2024-05-20',
            'priority' => 0.1,
            'changefreq' => 'weekly'
        ],
        [
            'loc' => 'http://examp.le/new-page-19',
            'lastmod' => '2024-05-20',
            'priority' => 0.7,
            'changefreq' => 'monthly'
        ],
        [
            'loc' => 'http://examp.le/new-page-20',
            'lastmod' => '2024-05-20',
            'priority' => 0.5,
            'changefreq' => 'yearly'
        ]
    ];
    public function testGenerateSitemap()
    {
        $dir = getcwd() . "/tests/generations/"; //"/Users/aleksandrignatov/Desktop/www/sitemap-generator/"
        $generator1 = new SitemapGenerator(self::TEST_DATA, FileType::CSV, $dir);
        $generator2 = new SitemapGenerator(self::TEST_DATA, FileType::JSON, $dir);
        $generator3 = new SitemapGenerator(self::TEST_DATA, FileType::XML, $dir);

        
        $this->assertNotEmpty($generator1);
        $this->assertNotEmpty($generator2);
        $this->assertNotEmpty($generator3);
    }

}