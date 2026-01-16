<?php

namespace HakimAsrori\Lopi;

use HakimAsrori\Lopi\Resources\Resource;
use Illuminate\Support\Facades\File;
use SplFileInfo;

class LopiManager
{
    protected array $resources = [];

    public function registerResource(string $resourceClass): void
    {
        $this->resources[] = $resourceClass;
    }

    public function discover(): void
    {
        $path = config('lopi.resources.path');
        $namespace = config('lopi.resources.namespace');

        if (!File::isDirectory($path)) {
            return;
        }

        $this->resources = collect(File::allFiles($path))
            ->map(function (SplFileInfo $splFile) use ($namespace) {
                $class = $namespace . '\\' . $splFile->getFilenameWithoutExtension();
                return $class;
            })
            ->filter(fn($class) => is_subclass_of($class, Resource::class))
            ->toArray();
    }

    public function getResources(): array
    {
        return $this->resources;
    }
}
