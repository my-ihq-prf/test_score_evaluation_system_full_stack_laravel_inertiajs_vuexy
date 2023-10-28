<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ManagerRequest extends FormRequest
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
        return !is_null($user) && $user->roles->pluck('name')->contains('manager');
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
            'grade' => ['required', 'numeric', 'between:0,100'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $inputs = [];

        $score = $this->input('grade', null);

        if (!is_null($score)) {
            $inputs['grade'] = $score;
        }

        $this->replace($inputs);
    }
}
