<?php

namespace App\RepositoryEloquent;

use App\Models\Video;
use App\Repositories\VideoRepositoryInterface;

class VideoRepository extends BaseRepository implements VideoRepositoryInterface
{
    public function model()
    {
        return Video::class;
    }
}
