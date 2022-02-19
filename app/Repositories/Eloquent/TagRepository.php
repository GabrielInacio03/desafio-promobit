<?php
    namespace App\Repositories\Eloquent;
    use App\Models\Tag;
    use App\Repositories\Contracts\ITagRepository;

    class TagRepository extends RepositoryBase implements ITagRepository
        {
            protected $model = Tag::class;
        
        }