<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImportCSVTest extends TestCase
{
    public function testNoImportFile()
    {
        Storage::fake('products');

        $response = $this->json('POST', '/import', [
            'csv_file' => UploadedFile::fake()->create('emptyUpload', 0, null)
        ]);

        Storage::disk('products')->assertMissing('emptyUpload');
        $response->assertStatus(406);
    }

    public function testIncorrectHeaders()
    {
        Storage::fake('products');

        $header = 'Header 1,Header 2,Header 3';
        $row1 = 'value 1,value 2,value 3';
        $row2 = 'value 1,value 2,value 3';

        $content = implode("\n", [$header, $row1, $row2]);

        $inputs = [
            'csv_file' =>
                UploadedFile::
                    fake()->
                    createWithContent(
                        'test.csv',
                        $content
                    ),
        ];

        $response = $this->json('POST', '/import', [
            'file-upload',
            $content,
        ]);

        Storage::disk('products')->assertMissing('test.csv');
        $response->assertStatus(406);
    }

    public function testIncorrectFileTypeImport()
    {
        Storage::fake('products');

        $response = $this->json('POST', '/import', [
            'jpg_file' => UploadedFile::fake()->image('cat.jpg')
        ]);

        Storage::disk('products')->assertMissing('cat.jpg');
        $response->assertStatus(406);
    }

    public function testShowImportPage()
    {
        $response = $this->json('GET', '/import');
        $response->assertStatus(200);
    }
}
