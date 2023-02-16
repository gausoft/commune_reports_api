<?php

namespace App\Http\Requests\Reports;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      required={"title", "description", "location", "category"},
 * )
 */
class CreateReportRequest extends FormRequest
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
     * @OA\Property(property="user_id", type="integer", example="1")
     * 
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location' => 'required|array|max:255',
            // 'category' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }
}
