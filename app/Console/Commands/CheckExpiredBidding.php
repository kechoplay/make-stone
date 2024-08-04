<?php

namespace App\Console\Commands;

use App\Models\Bidding;
use App\Repositories\BiddingRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckExpiredBidding extends Command
{
    private $biddingRepository;
    public function __construct(BiddingRepositoryInterface $biddingRepository)
    {
        $this->biddingRepository = $biddingRepository;
    }

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
    public function handle()
    {
        $biddingList = $this->biddingRepository->getListBiddingRunning();
        if ($biddingList) {
            foreach ($biddingList as $bidding) {
                if (Carbon::now() <= $bidding->end_time_bidding) {
                    $this->biddingRepository->update([
                        'status' => Bidding::STATUS_BIDDING_CLOSE
                    ], $bidding->id);
                }
            }
        }
    }
}
