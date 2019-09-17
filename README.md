# Lumen-Form-Request-URL

[![Total Downloads](https://poser.pugx.org/fredyhenaodev/lumen-form-request-url/downloads)](https://packagist.org/packages/fredyhenaodev/lumen-form-request-url)
[![Latest Unstable Version](https://poser.pugx.org/fredyhenaodev/lumen-form-request-url/v/unstable)](https://packagist.org/packages/fredyhenaodev/lumen-form-request-url)
[![License](https://poser.pugx.org/fredyhenaodev/lumen-form-request-url/license)](LICENSE.md)



Laravel Form Request for adaptation to the Lumen structure and validation of the parameters that come by URL.

## Install

Via Composer

``` bash
$ composer require fredyhenaodev/lumen-form-request-url
```
* Add the service provider in bootstrap/app.php
``` bash
$app->register(Fredyhenaodev\Providers\FormRequestServiceProvider::class);
```
## Usage

``` php
<?php

namespace App\Http\Request;

use Fredyhenaodev\Requests\FormRequestUrl;

class FindUserByIdRequest extends RequestUrl
{
    /**
     * Defining the URL parameters (`/stores/78/FredyHenao`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'id',
        'name'
    ];

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
        return [
            'id' => 'required|exists:users,id',
            'name' => 'required|string'
        ];
    }
}
```

## Security

If you discover any security related issues, please email fredyhenao45ygmail.com instead of using the issue tracker.

## Credits

- Fredy Henao [GitHub](https://github.com/fredyhenaodev)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
