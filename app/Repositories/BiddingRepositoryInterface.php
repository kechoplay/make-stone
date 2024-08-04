<?php

namespace App\Repositories;

interface BiddingRepositoryInterface extends RepositoryInterface
{
    public function getFirstIsBidding($id);

    public function checkHasBiddingRunning($productId);

    public function getListBiddingRunning();
}
