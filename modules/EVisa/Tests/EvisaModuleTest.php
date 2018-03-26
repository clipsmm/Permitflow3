<?php

namespace Modules\Evisa\Tests;

use App\Models\Application;
use App\Models\User;
use App\Modules\BaseModule;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EvisaModuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testItInsertsVisaRecordOnApproval()
    {
    }
}
