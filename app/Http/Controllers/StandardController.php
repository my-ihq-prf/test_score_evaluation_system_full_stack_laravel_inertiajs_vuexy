<?php

namespace App\Http\Controllers;

use App\Http\Requests\StandardRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\TestRecord;
use Illuminate\Support\Carbon;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StandardRequest $request)
    {
        //
        $testRecordData = array_merge((array)$request->input(), ['user_id' => $request->user()->id, 'date' => Carbon::now()]);
        TestRecord::query()->create($testRecordData);
        return to_route('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
    public function update(UpdateRequest $request, string $id)
    {
        //
        if (TestRecord::query()->where('id', $id)->update($request->input())) {
            return back()->with(['success' => true]);
        } else {
            return back()->with(['success' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if (TestRecord::query()->where('id', $id)->delete()) {
            return back()->with(['success' => true]);
        } else {
            return back()->with(['success' => false]);
        }
    }
}
