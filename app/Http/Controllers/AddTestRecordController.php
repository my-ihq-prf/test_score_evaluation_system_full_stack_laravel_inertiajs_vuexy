<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Inertia\Inertia;
use Inertia\Response;

class AddTestRecordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        $Managers = User::query()->whereIn('id', function (Builder $query) {
            $query->select('model_id')
                ->from(config('permission.table_names.model_has_roles'))
                ->where(config('permission.table_names.model_has_roles') . '.model_type', '=', User::class)
                ->where(
                    config('permission.table_names.model_has_roles') . '.role_id',
                    "=",
                    function (Builder $query) {
                        $query->select('id')
                            ->from(config('permission.table_names.roles'))
                            ->where(config('permission.table_names.roles') . '.name', '=', 'manager')
                            ->limit(1);
                    }
                )
                ->orderByDesc(config('permission.table_names.model_has_roles') . '.model_id');
        })->select('users.id', 'users.name', 'users.email')
            ->get();
        return Inertia::render('AddTestRecord', [
            'managers' => $Managers->toArray(request()),
        ]);
    }
}
