<?php

class FileApiTest extends TestCase
{

    // public function testGetExample()
    // {
    //     $token = Auth::guard('api')->tokenById(env('TESTING_ADMIN_USER_ID'));
    //     $response = $this->get(route('test'), [
    //         'Authorization' => 'Bearer' . $token,
    //     ]);
    // }

    public function testGetFileLink()
    {
        $token = Auth::guard('api')->tokenById(env('TESTING_ADMIN_USER_ID'));
        $response = $this->post(route('file.upload'), [

        ], [
            'Authorization' => 'Bearer' . $token,
        ]);
        dd($response);

        $response->assertStatus(200);
        $response->assertJsonStructure(['status', 'data']);
    }

    // public function testDownloadLink()
    // {
    //     $token = Auth::guard('api')->tokenById(env('TESTING_ADMIN_USER_ID'));
    //     $response = $this->get(route('file.download', [
    //         'file_id' => File::inRandomOrder()->where('flag', 'design')->first()->id,
    //     ]), [
    //         'Authorization' => 'Bearer' . $token,
    //     ]);
    //
    //     $response->assertStatus(200);
    //     $response->assertJsonStructure(['status', 'data']);
    // }


}
