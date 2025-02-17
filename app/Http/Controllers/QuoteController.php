<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return QuoteResource::collection(Quote::paginate(5));

    }

    /**
     * Store a newly created resource in storage.
     */
    // return dari storeQuoteRequest ini adalah
    // klau sudah true nanti akan masuk ke function body store yang dibawah ini
    // function body yang ada di store hanya akan dijalankan kalau validasinya lolos
    // berarti datanya sudah bersih sesuia dg yg kita inginkan
    // klau mau ngesave kita tinggal ngereturn hasil save saveannya saja
    public function store(StoreQuoteRequest $request)
    {
        //
        // return new QuoteResource(Quote::create($request->validated()));
        return new QuoteResource(Quote::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        //
        return new QuoteResource($quote);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        //
        // $quote->update($request->validated());
        // return new QuoteResource($quote);
        return new QuoteResource(tap($quote)->update($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        //
        $quote->delete();
        return response()->noContent();
    }
}
