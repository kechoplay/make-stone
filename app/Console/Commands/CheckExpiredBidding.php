<?php

namespace App\Console\Commands;

use App\Models\Bidding;
use App\Repositories\BiddingRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckExpiredBidding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-expired-bidding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(BiddingRepositoryInterface $biddingRepository)
    {
        $biddingList = $biddingRepository->getListBiddingRunning();
        if ($biddingList) {
            foreach ($biddingList as $bidding) {
                if (Carbon::now() <= $bidding->end_time_bidding) {
                    $biddingRepository->update([
                        'status' => Bidding::STATUS_BIDDING_CLOSE
                    ], $bidding->id);
                }
            }
        }
    }
}
