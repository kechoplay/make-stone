<?php

namespace App\RepositoryEloquent;

use App\Models\Bidding;
use App\Repositories\BiddingRepositoryInterface;

class BiddingRepository extends BaseRepository implements BiddingRepositoryInterface
{
    public function model()
    {
        return Bidding::class;
    }

    public function getFirstIsBidding($id)
    {
        return $this->model
            ->where('product_id', $id)
            ->where('status', Bidding::STATUS_BIDDING_START)
            ->first();
    }
}
