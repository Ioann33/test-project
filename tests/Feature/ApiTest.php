<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use phpDocumentor\Reflection\Types\Object_;
use Tests\TestCase;

class ApiTest extends TestCase
{

//    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_save_notes()
    {

        $obj = [
            [
                'title'=>'some title',
                'body'=>'some body',
                'user'=>'Ioann',
                'button'=>'boss'
            ],
            [
                'title'=>'some title2',
                'body'=>'some body2',
                'user'=>'Ioann2',
                'button'=>'boss2'
            ]
        ];

        $response = $this->json('POST','/api/saveNotes', $obj);

        $response->assertStatus(200);

        $this->assertEquals('status ok', $response->getContent());
    }
}
