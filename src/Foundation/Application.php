<?php

namespace Jamasad\Crypt\Foundation;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Jamasad\Crypt\Exceptions\FailException;

/**
 * Class Application
 */
class Application extends \Illuminate\Foundation\Application
{
    /**
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
        $this->doSomething();

    }

    /**
     * Very smart solution ^___^
     *
     * @return void
     * @throws FailException|FileNotFoundException
     */
    protected function doSomething(): void
    {
        $value = env('APP_LICENSE_KEY');

        if (!Cache::has('40LLQtdGC')) {
            $lock = Cache::lock('cczMOy', 30);

            if ($lock->get()) {
                $this->doSomethingSomething($value);
                $lock->release();
            }
        }

        !defined('LSDFTE') && define('LSDFTE', Cache::get('40LLQtdGC'));
    }

    /**
     * @param string $value
     * @return void
     * @throws FailException
     */
    protected function doSomethingSomething(string $value): void
    {
         $now = new \DateTime('now', new \DateTimeZone('Europe/Moscow'));
         Cache::put('40LLQtdGC', date_format($now, 'Y-m-d H:i:s'), Carbon::now()->addMinutes(10));
    }
}
