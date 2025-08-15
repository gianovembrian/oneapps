<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OverseasTripFixture
 */
class OverseasTripFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'overseas_trip';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '99fe0279-518b-4610-a444-8648bafd2bba',
                'user_id' => 'Lorem ipsum dolor sit amet',
                'country_id' => 'Lorem ipsum dolor sit amet',
                'actvity_notes' => 'Lorem ipsum dolor sit amet',
                'organizer' => 'Lorem ipsum dolor sit amet',
                'event_date_start' => '2024-09-06',
                'event_date_finnish' => '2024-09-06',
                'departure_date' => '2024-09-06',
                'arrival_date' => '2024-09-06',
                'source_fund' => 'Lorem ipsum dolor sit amet',
                'other_notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            ],
        ];
        parent::init();
    }
}
