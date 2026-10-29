<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MemberController extends Controller {
    // The Clash Royale API key comes from .env (CLASH_ROYALE_API_KEY), never from the code.
    private $api_key;

    public function __construct() {
        $this->api_key = config( 'services.clash_royale.key' );
    }

    public function index() {
        $allCards = $this->getCardInfo();
        $clanInfo = $this->getClanInfo();
        return view( 'welcome', compact( ['allCards', 'clanInfo'] ) );
    }

    private function getCardInfo() {
        $getAllCards = Http::withHeaders( [
            'accept' => 'application/json'
        ] )
        ->withtoken( $this->api_key )
        ->get( 'https://api.clashroyale.com/v1/cards' )->body();
        $decodedCardInfo = ( json_decode( $getAllCards ) );
        return $decodedCardInfo;

    }

    public function getClanInfo() {
        $getClanInfo = Http::withHeaders( [
            'accept' => 'application/json'
        ] )
        ->withtoken( $this->api_key )
        ->get( 'https://api.clashroyale.com/v1/clans/%239CLU8C0R' )->body();
        $decodedClanInfo = ( json_decode( $getClanInfo ) );
        return $decodedClanInfo;
    }
}
