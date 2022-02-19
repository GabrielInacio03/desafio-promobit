<?php
    namespace App\Repositories\Eloquent;
    use App\Models\Product;
    use App\Repositories\Contracts\IProductRepository;

    class ProductRepository extends RepositoryBase implements IProductRepository
        {
            protected $model = Product::class;
        
        }