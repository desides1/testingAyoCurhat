<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use App\Http\Controllers\ReportingController;
use App\Models\Reporting;
use Mockery;
use App\Models\User;
use App\Service;
use Mockery\MockInterface;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\ValidationException;

// use Illuminate\Validation\Validator;


class CreateReportingTest extends TestCase
{
    /**
     * Helper untuk membuat validator.
     */

    // cek reported as data masuk valid
    // DONE
    public function testReporterAsField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'reporter_as' => 'korban',
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    // DONE
    public function testReporterAsFieldRequired()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'reporter_as' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }
        $this->fail('Status pelapor wajib diisi');
    }

    // Done
    public function testCaseTypeIdField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'case_type_id' => 1,
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    //Done
    public function testCaseTypeIdFieldRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'case_type_id' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Jenis kasus wajib diisikan');
    }

    // DONE
    public function testCaseDescriptionField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'case_description' => str_repeat('A', 50),
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    // Done
    public function testCaseDescriptionFieldMinLength()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'case_description' => 'ABC',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Deskripsi kasus wajib diisi setidaknya 10 Karakter.');
    }

    // Done
    public function testCaseDescriptionRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'case_description' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Deskripsi harus diisikan');
    }

    // Done
    public function testChronologyField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'chronology' => str_repeat('B', 100),
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    //Done
    public function testChronologyFieldRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'chronology' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('kronologi kejadian harus diisikan');
    }

    //Done
    public function testReportedStatusIdField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'reported_status_id' => 1,
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    //Done
    public function testReportedStatusIdFieldRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'reported_status_id' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('status pelapor harus diisikan');
    }

    //Done
    public function testOptionalPhoneNumberField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'optional_phone_number' => '081234567890',
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true); // Jika sampai sini, berarti valid
    }

    // Done
    public function testOptionalPhoneNumberFieldRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'optional_phone_number' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->fail('Nomor korban harus diisikan');
        }
        $this->assertTrue(true);
    }

    // Done
    public function testOptionalEmailField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'optional_email' => 'example@example.com',
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    //Done
    public function testOptionalEmailFieldRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'optional_email' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->fail('Email harus diisikan');
        }

        $this->assertTrue(true);
    }

    //Done
    public function testReportingReasonsField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'reporting_reasons' => [1],
            [2],
            [3],
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    //Done
    public function testReportingReasonsFieldRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'reporting_reasons' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Alasan pengaduan harus diisikan');
    }

    //Done
    public function testVictimRequirementsField()
    {
        $controller = new ReportingController;

        $request = Request::create('/reportings', 'POST', [
            'victim_requirements' => [1],
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    // Done
    public function testVictimRequirementsFieldRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'victim_requirements' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Kebutuhan korban wajib dipilih setidaknya 1');
    }

    //Done
    public function testOptionalDisabilityTypeField()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'reporting_disability_type' => [3],
        ]);

        $response = $controller->store($request);
        $this->assertTrue(true);
    }

    // Done
    public function testOptionalDisabilityTypeFieldRequired()
    {
        $controller = new ReportingController;
        $request = Request::create('/reportings', 'POST', [
            'reporting_disability_type' => '',
        ]);

        try {
            $controller->store($request);
        } catch (ValidationException $e) {
            $this->fail('error');
        }

        $this->assertTrue(true);
    }
}
