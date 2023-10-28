<?php

namespace App\Http\Resources;

use App\Models\TestRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class TestListResource extends ResourceCollection
{
    /**
     * Create a new resource instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(TestRecord::query()->get()->toArray());
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $managers = User::query()->whereIn('id', $this->resource->pluck('responsible_manager_id'))->select('users.id', 'users.name', 'users.email')->get();
        $users = User::query()->whereIn('id', $this->resource->pluck('user_id'))->select('users.id', 'users.name', 'users.email')->get();
        $criterias = collect(DB::table('grade_criterias')->get()->toArray());

        return $this->resource->map(function ($item, $key) use ($managers, $users, $criterias) {
            $manager = $managers->where('id', $item['responsible_manager_id'])->first()->toArray();
            $user = $users->where('id', $item['user_id'])->first()->toArray();
            $criteria = 0;
            if (isset($item['grade'])) {
                $grade = $item['grade'];

                $criteria = $criterias->first(function ($item, int $key) use ($grade) {
                    if ($item->max === -1) {
                        return $item->min <= $grade;
                    } else {
                        return $item->min < $grade && $item->max > $grade;
                    }
                });
            }

            // grade is_gradable
            return collect($item)->except(['responsible_manager_id', 'user_id'])
                ->merge(['manager' => $manager, 'user' => $user,
                    'criteria' => isset($criteria) ? $criteria : 0])->toArray();
        })->toArray();
    }
}
