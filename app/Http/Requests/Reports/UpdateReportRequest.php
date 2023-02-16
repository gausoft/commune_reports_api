<?php

namespace App\Http\Requests\Reports;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema()
 */
class UpdateReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * @OA\Property(property="title", type="string", example="Report title"),
     * @OA\Property(property="description", type="string", example="Report description"),
     * @OA\Property(property="location", type="string", example="Report location"),
     * @OA\Property(property="category", type="string", example="Report category")
     * 
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'string|max:255',
            'description' => 'string|max:255',
            'location' => 'array|max:255',
            'category' => 'string|max:255',
        ];
    }
}
