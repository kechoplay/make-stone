<?php

namespace App\RepositoryEloquent;

use App\Models\Affiliate;
use App\Repositories\AffiliateRepositoryInterface;

class AffiliateRepository extends BaseRepository implements AffiliateRepositoryInterface
{
    public function model()
    {
        return Affiliate::class;
    }
}
