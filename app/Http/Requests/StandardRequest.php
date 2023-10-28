<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class StandardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /**
         * @var User $user
         */
        $user = auth()?->user();
        return !is_null($user) && $user->roles->pluck('name')->contains('standard');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'full_name' => ['required', 'string', 'unique:test_records', 'between:3,150'],
            'location' => ['required', 'string', 'between:3,350'],
            'responsible_manager_id' => ['required', 'numeric'],
            'is_gradable' => ['sometimes', 'required', 'boolean'],
            'date' => ['required', 'date'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $inputs = [];

        $fullName = $this->input('full_name', null);
        $location = $this->input('location', null);
        $responsibleManagerId = $this->input('responsible_manager_id', null);
        $isGradable = $this->input('is_gradable', null);
        $date = $this->input('date', null);


        if (!is_null($fullName)) {
            $inputs['full_name'] = $fullName;
        }
        if (!is_null($location)) {
            $inputs['location'] = $location;
        }
        if (!is_null($isGradable)) {
            $inputs['is_gradable'] = (bool)$isGradable;
        }
        if (!is_null($responsibleManagerId)) {
            $inputs['responsible_manager_id'] = $responsibleManagerId;
        }
        if (!is_null($date)) {
            $inputs['date'] = Carbon::parse($date);
        }

        $this->replace($inputs);
    }
}
