<?php

namespace AleksandrIgnatov\SitemapGenerator;

use AleksandrIgnatov\SitemapGenerator\Exception\MkdirException;
use AleksandrIgnatov\SitemapGenerator\Exception\ValidationException;
use AleksandrIgnatov\SitemapGenerator\Exception\XmlBuildException;
use AleksandrIgnatov\SitemapGenerator\Factory\GeneratorFactory;
use AleksandrIgnatov\SitemapGenerator\ValueObject\FileType;

class SitemapGenerator
{
    /**
     * @throws MkdirException
     * @throws ValidationException
     * @throws XmlBuildException
     */
    public function __construct(array $pages, FileType $type, string $resultFilePath)
    {
        $generator = (new GeneratorFactory())->getGenerator($type);
        $fileContent = $generator->generate($pages);

        if (!$this->generateDirIfNotExists($resultFilePath))
            throw new MkdirException("Directory creation failed");

        $path = realpath($resultFilePath) . '/' . $generator->getFileName();
        return file_put_contents($path, $fileContent);
    }

    private function generateDirIfNotExists($filePath): bool
    {
        if (!$this->isDirExists($filePath))
            return mkdir($filePath, 0777, true);

        return true;
    }

    private function isDirExists($filePath): bool
    {
        $path = realpath($filePath);

        return $path !== false AND is_dir($path);
    }
}