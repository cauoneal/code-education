<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeProject\Repositories\ProjecNoteRepository;
use CodeProject\Entities\ProjecNote;
use CodeProject\Validators\ProjecNoteValidator;

/**
 * Class ProjecNoteRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjecNoteRepositoryEloquent extends BaseRepository implements ProjecNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjecNote::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
