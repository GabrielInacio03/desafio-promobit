<?php
    namespace App\Repositories\Eloquent;
    use App\Models\Product_Tag;
    use App\Repositories\Contracts\IProductTagRepository;

    class ProductTagRepository extends RepositoryBase implements IProductTagRepository
        {
            protected $model = Product_Tag::class;
        
        }