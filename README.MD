# SITEMAP GENERATOR

Library generate sitemap in different formats: xml, csv, json.

## To use library properly, define:
```php
new SitemapGenerator($pages, $fileType, $dir);
```

where:
* `$pages` - array:
```php
$pages = [[
    string $loc,
    string $lastmod, 
    float $priority,
    string $changefreq], ...]
```
* `$fileType` - is one of supported file types:
  * `FileType::CSV`
  * `FileType::XML`
  * `FileType::JSON`
* `$dir` - location, where your sitemap will be saved


##test:

```
vendor/bin/phpunit tests/SitemapGeneratorTest.php
```