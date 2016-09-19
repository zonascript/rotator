<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FaucetRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        $data = parent::all();
        $data['published'] = (isset($data['published'])) ? true : false;
        $data['register'] = (isset($data['register'])) ? true : false;
        $data['browser'] = (isset($data['browser'])) ? true : false;
        $data['paid'] = (isset($data['paid'])) ? true : false;
        $data['antibot'] = (empty($data['antibot'])) ? 0 : $data['antibot'];
        $this->request->replace($data);
        $segment = $this->segment(3);

        return  [
            'site' => 'required|min:3|unique:faucets,id,:id',
            'script_id' => 'required',
            'captcha_id' => 'required',
            'rewards' => 'required|numeric',
            'wait' => 'numeric',
            'published' => 'boolean',
            'paid' => 'boolean',
            'period' => 'required|numeric',
            'antibot' => 'numeric'
        ];

    }
}
