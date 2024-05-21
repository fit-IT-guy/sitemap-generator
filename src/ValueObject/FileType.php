<?php

namespace AleksandrIgnatov\SitemapGenerator\ValueObject;

enum FileType: string
{
    case XML = 'xml';
    case CSV = 'csv';
    case JSON = 'json';
}