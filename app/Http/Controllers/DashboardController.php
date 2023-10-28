<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestListResource;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Response
     */

    public function __invoke(/*Request $request*/): Response
    {
        return Inertia::render('Dashboard', [
            'test_records' => (new TestListResource())->toArray(request()),
        ]);
    }
}
