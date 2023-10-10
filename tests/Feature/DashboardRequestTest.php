<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardRequestTest extends TestCase
{
    public function testGuestNotSeeDashboard(): void
    {
        $this->assertGuest();

        $this->get(route('dashboard.index'))->assertStatus(302);
    }
}
