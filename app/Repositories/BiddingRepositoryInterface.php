<?php

namespace App\Repositories;

interface BiddingRepositoryInterface extends RepositoryInterface
{
    public function getFirstIsBidding($id);
}
