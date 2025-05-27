<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Models\Link;
use App\Services\LinkService;

class LinkController extends Controller
{
    public function __construct(protected LinkService $linkService)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::latest()->paginate(10);
        return view('home', ['links' => $links]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        $this->linkService->createLink($request->validated());
        return redirect()->route('home')->with([
            'success' => 'Ссылка успешно добавлена',
        ]);
    }

    /**
     * Redirect to full link url
     */
    public function goaway(string $token)
    {
        $link = Link::where('token', $token)->firstOrFail();
        $link->count++;
        $link->save();
        return redirect($link->link);
    }
}
