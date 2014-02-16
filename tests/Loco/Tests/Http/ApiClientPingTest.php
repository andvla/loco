<?php

namespace Loco\Tests\Http;

use Loco\Http\ApiClient;

/**
 * Test the live /ping API.
 * @group live
 * @group ping
 */
class ApiClientPingTest  extends ApiClientTest {
    
    
    /**
     * Live ping test via overloaded service method
     */
    public function testLivePing(){
        $client = $this->getClient();
        $sdk_version = $client->getVersion();
        $this->assertEquals( '1.0.2', $sdk_version, 'Service description is not expected version' );
        $api_version = $client->ping()->get('version');
        $this->assertEquals( $sdk_version, $api_version, 'Live API version does not match local SDK version' );
    }


    /**
     * Live 404 test via custom endpoint
     * @expectedException \Guzzle\Http\Exception\BadResponseException
     */    
    public function testLiveFail(){
        $client = $this->getClient();
        $client->get('ping/not-found.json')->send();
    }
    
    
}

