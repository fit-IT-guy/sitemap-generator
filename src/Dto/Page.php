<?php

declare(strict_types=1);

namespace AleksandrIgnatov\SitemapGenerator\Dto;

use AleksandrIgnatov\SitemapGenerator\Exception\ValidationException;
use AleksandrIgnatov\SitemapGenerator\ValueObject\ChangeFreq;

class Page
{
    /**
     * @throws ValidationException
     */
    public function __construct(public readonly string $loc,
                                public readonly string $lastmod,
                                public readonly float $priority,
                                public readonly string $changefreq,
    ) {
        if ($loc === "")
            throw new ValidationException("Page location must not be empty string");
        if ($lastmod === "")
            throw new ValidationException("Last modification of page must not be empty string");
        if ($priority < 0 || $priority > 1)
            throw new ValidationException("Priority must be between 0 and 1");
        if (!in_array($this->changefreq, array_column(ChangeFreq::cases(), 'value')))
            throw new ValidationException("Wrong changefreq");
    }
}