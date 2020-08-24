<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MemberController extends Controller {
    private $api_key = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImFkMDk5NjljLTJkN2ItNDc0Yi1iMjg3LTllOWI3NThiZGUwYyIsImlhdCI6MTU5ODEyMzc0MCwic3ViIjoiZGV2ZWxvcGVyLzVlMTdjMzA2LTM0MmEtZDdkOC0zODE0LTQ1OTNhMjllODUyYyIsInNjb3BlcyI6WyJyb3lhbGUiXSwibGltaXRzIjpbeyJ0aWVyIjoiZGV2ZWxvcGVyL3NpbHZlciIsInR5cGUiOiJ0aHJvdHRsaW5nIn0seyJjaWRycyI6WyIyNy4zNC4xNi4xOSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.PMlJYKEtMCvyzsn0ZmuR7b097kZmea9QegzPmxjpObcpiQEaWpywVLZnMAEkwQe8CIBVz2eTFYjbvmxq0CtBcw';

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
