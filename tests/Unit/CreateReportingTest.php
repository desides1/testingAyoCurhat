<?php

namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;

class CreateReportingTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_save_data_pengaduan_and_success()
    {
        $mockReporting = Mockery('alias:' . Reposting::class);
        $mockReporting->shouldReceive('save')->once()->andReturn(true);

        $data = [
            'reporter_id' => '4',
            'reporter_as' => 'Korban',
            'case_type_id' => '',
            'case_description' => $data['case_description'],
            'chronology' => $data['chronology'],
            'reported_status_id' => $reportedStatus->id,
            'optional_phone_number' => $data['optional_phone_number'],
            'optional_email' => $data['optional_email'],
        ];
    }
}
