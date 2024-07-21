<?php

namespace App\RepositoryEloquent;

use App\Models\Setting;
use App\Repositories\SettingRepositoryInterface;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    public function model()
    {
        return Setting::class;
    }
}
