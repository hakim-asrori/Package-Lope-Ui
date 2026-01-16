<?php

namespace HakimAsrori\Lopi\Resources;

use Illuminate\Support\Str;

abstract class Resource
{
    protected static ?string $model = null;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $slug = null;

    public static function getSlug(): string
    {
        return static::$slug ?? Str::slug(Str::plural(class_basename(static::class)));
    }

    public static function getNavigationLabel(): string
    {
        return Str::plural(class_basename(static::class));
    }
}
