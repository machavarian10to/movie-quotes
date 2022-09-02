<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'title_en'  => 'required',
			'title_ka'  => 'required',
			'movie_id'  => ['required', Rule::exists('movies', 'id')],
			'thumbnail' => 'required|image',
		];
	}
}
