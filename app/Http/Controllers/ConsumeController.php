<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\consumeApiService;




class ConsumeController extends Controller
{
    protected $consumeApiService;
    public function __construct(consumeApiService $consumeApiService)
    {
        $this->consumeApiService = $consumeApiService;
    }

    /**
     * Display a listing of the resource.
     */

    public function getData($url)
    {
        $response = Http::get($url);
        $data = $response->json();
        return $data;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkGOTHouses()
    {

        $houses = $this->getData('https://api.gameofthronesquotes.xyz/v1/houses');

        return view('apipruebas.index', compact('houses'));
    }

    public function checkQuoteByLastName()
    {
        $characters = $this->consumeApiService->consumeApi('https://api.gameofthronesquotes.xyz/v1/characters');

        $quote_by_house = [];
        foreach ($characters as $character) {
            if (isset($character['house']['slug']) && $character['house']['slug'] == 'stark') {
                array_push($quote_by_house, $character);
            }
        }
        return $quote_by_house;

        return view('apipruebas.starkquotes', compact('characters'));
    }
}
