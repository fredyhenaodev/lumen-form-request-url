<?php

namespace Fredyhenaodev\Requests;

abstract class FormRequestUrl extends FormRequest
{
    /**
     * Modify the any user input before applying the validation rules.
     *
     * @param Null $dataValidation
     * @return Array
     */
    public function all($dataValidation = null)
    {
        $requestData = parent::all($dataValidation);
        $requestData = $this->mergeUrlParameterWithRequestDataValidation($requestData);
        return $requestData;
    }

    /**
     * apply validation rules to the parameters in the URL
     *
     * @param Array $dataValidation
     * @return Array
     */
    public function mergeUrlParameterWithRequestDataValidation(Array $dataValidation)
    {
        if (property_exists($this, 'urlParameters'))
        {
            if (!empty($this->urlParameters) && isset($this->urlParameters))
            {
                foreach ($this->urlParameters as $param)
                {
                    $dataValidation[$param] = $this->findParam($this->route(), $param);
                }
            }
        }
        return $dataValidation;
    }

    /**
     * Search for the variable in the route
     *
     * @param Array $params
     * @param String $name
     * @return String
     */
    public function findParam($params, $name)
    {
        foreach ($params as $data)
        {
            if (is_array($data) && key_exists($name, $data))
            {
                return $data[$name];
            }
        }
        return null;
    }
}