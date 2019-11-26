<?php

namespace Signifly\Travy\Test\Support;

use Signifly\Travy\Resource;

class Product extends Resource
{
    /** @var string */
    protected $model = 'Domain\Catalog\Models\Product';

    protected $searchable = [
        'title',
        'variants.sku',
    ];

    public function index($request): array
    {
        return [
            Tab::make('All products')
                ->fields([
                    Text::make('Title')
                        ->sortable()
                        ->searchable()
                        ->defaultSort(),
                ]),

            Tab::make('Table tab', [
                Text::make('Title')
                    ->sortable()
                    ->searchable()
                    ->defaultSort(),
            ]),

            Tab::make('Products', new ProductTable($request)),

            Tab::make('Products')
                ->table(new ProductTable($request)),

            new ReusableTab($request),
        ];
    }

    public function view($request): array
    {
        return [
        ];
    }
}
