<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Underdog Nepal</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }


            div.item {
                vertical-align: top;
                display: inline-block;
                text-align: center;
                width: 120px;
            }

            img {
                width: 100px;
                height: 100px;
            }

            .caption {
                display: block;
            }
        </style>
    </head>

    <body>
        <center>
            <h1>ALL CARDS</h1>
        </center>
        @for($i=0;$i<count($allCards->items);$i++)
            <div class="item">
                <img src={{ $allCards->items[$i]->iconUrls->medium }} alt="img missing">
                <label class="caption">{{ $allCards->items[$i]->name }}</label>
                <label class="caption">{{ $allCards->items[$i]->maxLevel }}</label>
            </div> @endfor
            <center>
                <h1>Clan Info</h1>

            </center>

            <table class="table table-dark">
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Trophies</th>
                    <th>Donation</th>
                    <th>Donation Received</th>
                    <th>Experience Level</th>
                    <th>Arena</th>
                    <th>Last Online</th>
                </tr>
                @for($i=0;$i<count($clanInfo->memberList);$i++)
                    @php
                    $lastSeen=explode('.',$clanInfo->memberList[$i]->lastSeen);
                    $lastOnline[$i]= Carbon\Carbon::parse($lastSeen[0])->diffForHumans();
                    @endphp
                    <tr>
                        <td>{{ $clanInfo->memberList[$i]->name }}</td>
                        <td>{{ $clanInfo->memberList[$i]->role }}</td>
                        <td>{{ $clanInfo->memberList[$i]->trophies }}</td>
                        <td>{{ $clanInfo->memberList[$i]->donations }}</td>
                        <td>{{ $clanInfo->memberList[$i]->donationsReceived }}</td>
                        <td>{{ $clanInfo->memberList[$i]->expLevel }}</td>
                        <td>{{ $clanInfo->memberList[$i]->arena->name }}</td>
                        <td>{{ $lastOnline[$i] }}</td>
                    </tr>
                    @endfor
            </table>
    </body>
    <script src="/js/app.js"></script>

</html>
