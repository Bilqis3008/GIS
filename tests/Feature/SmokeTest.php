<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\ContactSubmission;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SmokeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /** @return array<int, array<int, string>> */
    public static function publicRoutes(): array
    {
        return [
            ['/'],
            ['/tentang'],
            ['/program'],
            ['/program/green-urban-tani'],
            ['/berita'],
            ['/berita/seminar-sdgs-carbon-credit'],
            ['/dampak'],
            ['/publikasi'],
            ['/kemitraan'],
            ['/kontak'],
        ];
    }

    #[DataProvider('publicRoutes')]
    public function test_public_pages_load(string $url): void
    {
        $this->get($url)->assertOk();
    }

    /** @return array<int, array<int, string>> */
    public static function adminRoutes(): array
    {
        return [
            ['/admin'],
            ['/admin/programs'],
            ['/admin/programs/create'],
            ['/admin/activities'],
            ['/admin/activities/create'],
            ['/admin/publications'],
            ['/admin/team-members'],
            ['/admin/partners'],
            ['/admin/impact-stats'],
            ['/admin/impact-stats/create'],
            ['/admin/pages'],
            ['/admin/contact-submissions'],
            ['/admin/manage-site-settings'],
        ];
    }

    #[DataProvider('adminRoutes')]
    public function test_admin_pages_load(string $url): void
    {
        $this->actingAs(User::where('email', 'admin@gis.test')->first());
        $this->get($url)->assertOk();
    }

    public function test_admin_panel_requires_auth(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_contact_form_saves_valid_submission(): void
    {
        $this->post('/kontak', [
            'name' => 'Budi',
            'email' => 'budi@example.com',
            'subject' => 'kemitraan_csr',
            'message' => 'Halo, kami tertarik kerja sama.',
        ])->assertSessionHas('contact_success');

        $this->assertDatabaseHas('contact_submissions', ['email' => 'budi@example.com']);
    }

    public function test_contact_form_honeypot_blocks_spam(): void
    {
        $this->post('/kontak', [
            'name' => 'Bot',
            'email' => 'bot@example.com',
            'subject' => 'umum',
            'message' => 'spam',
            'website' => 'http://spam.example',
        ]);

        $this->assertSame(0, ContactSubmission::count());
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $this->post('/kontak', [])->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }
}
