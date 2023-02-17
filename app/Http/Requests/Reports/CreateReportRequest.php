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
     * @OA\Property(property="location", type="array", @OA\Items(type="number", format="float"), example={"-6.1753924", "106.827153"}),
     * @OA\Property(property="category", type="string", example="Report category")
     * @OA\Property(property="user_id", type="integer", example="1"),
     * @OA\Property(
     *   description="Report medias",
     *   property="medias",
     *   type="array",
     *   @OA\Items(type="file", format="binary")
     * )
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
            'user_id' => 'required|integer|exists:users,id',
            'medias' => 'nullable|array',
            'medias.*' => 'nullable|file|mimes:jpeg,png,gif,svg,webp,mp4,mov|max:5000',
        ];
    }
}
