<?php

namespace App\ImportExport\Export\ExportHandler;

use App\ImportExport\Export\ExportStatus;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class CategoryRelationHandler extends AbstractExportHandler
{
    public function __construct(
        private readonly RequestStack       $requestStack,
        private readonly CategoryRepository $categoryRepository,
    ) {
        parent::__construct($this->requestStack);
    }

    public function getKey(): string
    {
        return 'category_relation';
    }

    public function getColumnCount(): int
    {
        return $this->categoryRepository->getRelationColumnCount();
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getData(ExportStatus $status): array
    {
        return $this->categoryRepository->getRelationExportList(self::EXPORT_LIMIT, $status->getExported());
    }
}