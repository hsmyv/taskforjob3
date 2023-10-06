<?php

namespace App\Http\Controllers;

use App\Http\Requests\EssayRequest;
use App\Models\Essay;
use App\Models\EssayDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EssayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $essays = Essay::where('expire_date', '>=', Carbon::now())
            ->where('status', true)
            ->get();
        return view("essays", ["essays" => $essays]);
    }
    public function published_essay($token)
    {

        $essay = Essay::where('token', $token)->firstOrFail();
        $essay->increment('view');
        EssayDetail::create([
            'essay_id' => $essay->id,
            'show_date' => Carbon::now(),
            'user_ip' => request()->ip()

        ]);
        return view('published_essay', [
            'essay' => $essay
        ]);
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
    public function store(EssayRequest $request)
    {
        $essay = Essay::create(array_merge($request->validated(), ['user_id' => auth()->user()->id, 'token' => uniqid()]));
        $essays = Essay::where('expire_date', '>=', Carbon::now())
            ->where('status', true)
            ->get();
        return redirect()->route('essay.index', ['essays' => $essays]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $token)
    {
        $essay = Essay::where('token', $token)->firstOrFail();
        return view("essay", ["essay" => $essay]);
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
}
