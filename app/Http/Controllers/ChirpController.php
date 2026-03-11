<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    // To enable auth usage
    use AuthorizesRequests;

    public function index()
    {
        $chirps = Chirp::with('user')->latest()->take(50)->get();

        return view('home', ['chirps' => $chirps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
                'message' => 'required|string|max:255',
            ], [
                'message.required' => 'Please write something to chirp!',
                'message.max' => 'Chirps must be 255 characters or less.',
            ]);

        auth()->user()->chirps()->create($validated);
        return redirect('/')->with('success', 'Chirp created!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        return view('chirps.edit', compact('chirp'));
    }

     public function update(Request $request, Chirp $chirp)
     {
         $this->authorize('update', $chirp);
         $validated = $request->validate([
             'message' => 'required|string|max:255',
         ]);

         $chirp->update($validated);
         return redirect('/')->with('success', 'Chirp updated!');
     }

    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();
        return redirect('/')->with('success', 'Chirp deleted!');
    }
}
