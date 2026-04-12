<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projek;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PortoController extends Controller
{       

public function index(Request $request)
{
   $projek = Projek::all()->sortByDesc('created_at');
   return view('Porto.index', compact('projek'));
}

public function welcome(Request $request)
{
   $projek = Projek::all();
   return view('welcome', compact('projek'));
}

public function skripsi()
{
  return view('skripsi');
}

public function kerjaPraktek()
{
  return view('kerjapraktek');
}

public function customWeb()
{
  return view('customweb');
}

    public function stats()
    {
        return Cache::remember('github_stats', 3600, function () {

            $query = '
            query {
              user(login: "' . env('GITHUB_USERNAME') . '") {
                repositories(privacy: PUBLIC) {
                  totalCount
                }
                followers {
                  totalCount
                }
                contributionsCollection {
                  contributionCalendar {
                    totalContributions
                  }
                }
              }
            }';
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::withToken(env('GITHUB_TOKEN'))
                ->post('https://api.github.com/graphql', [
                    'query' => $query
                ]);

            $data = $response->json();

            return [
                'repos' => $data['data']['user']['repositories']['totalCount'],
                'followers' => $data['data']['user']['followers']['totalCount'],
                'contributions' => $data['data']['user']['contributionsCollection']['contributionCalendar']['totalContributions'],
            ];
        });
    }
}