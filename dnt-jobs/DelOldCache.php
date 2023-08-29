<?php

namespace DntJobs;

use DntLibrary\Base\Cache;

class DelOldCacheJob
{
    public function run()
    {
        $cache = new Cache();
        $cache->deleteOld('../dnt-cache/');
        print("\nCache was deleted\n");
    }
}
