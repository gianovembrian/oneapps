<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FrameworksFixture
 */
class FrameworksFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'dd18f02c-4106-4975-afe2-928a017c10e7',
                'name' => 'Lorem ipsum dolor sit amet',
                'programming_language_id' => '26d2bdd8-beb0-465a-9b3f-c5ee743d19e3',
            ],
        ];
        parent::init();
    }
}
