<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        return !is_null($user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $isManagerRole = auth()->user()->roles->pluck('name')->contains('manager');

        $rules = [];
        $rules['is_gradable'] = ['sometimes', 'required', 'boolean'];

        if ($isManagerRole) {
            $rules['grade'] = ['required', 'numeric'];

        } else {
            $rules['full_name'] = ['sometimes', 'required', 'string', 'unique:test_records', 'between:3,150'];

            $rules['location'] = ['sometimes', 'required', 'string', 'between:3,150'];

        }
        return $rules;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $isManagerRole = auth()->user()->roles->pluck('name')->contains('manager');

        $inputs = [];
        $data = $this->input('data', null);
        if (is_null($data)) {
            abort(203, 'data field required');
        }
        $data = collect($data);
        $fullName = $data->get('full_name', null);
        $location = $data->get('location', null);
        $responsibleManagerId = $data->get('responsible_manager_id', null);
        $grade = $data->get('grade', null);
        $isGradable = $data->get('is_gradable', null);


        if (!is_null($fullName)) {
            $inputs['full_name'] = $fullName;
        }
        if (!is_null($location)) {
            $inputs['location'] = $location;
        }
        if (!is_null($isGradable) && !$isManagerRole) {
            $inputs['is_gradable'] = $isGradable;
        }
        if (!is_null($grade) && $isManagerRole) {
            $inputs['grade'] = $grade;
        }
        if (!is_null($responsibleManagerId)) {
            $inputs['responsible_manager_id'] = $responsibleManagerId;
        }

        $this->replace($inputs);
    }
}
