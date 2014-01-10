<?php namespace Illuminate3\Vedette\Services\Validators;

 use Validator;
 use Input;

abstract class ValidatorService {

    /**
     * Data to validate
     * @var array
     */
    protected $input;

    /**
     * Validation Errors
     * @var \Illuminate\Support\MessageBag
     */
    public $errors;

    /**
     * Validation rules
     * @var array
     */
    public static $rules;

    /**
     * custom error messages
     * @var array
     */
    public static $messages = array();

    /**
     * [__construct description]
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @param  array $data
     */
    public function __construct(array $input = array())
    {
        $this->input = $input ?: Input::all();
    }

    /**
     * Do the validation
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return Bool
     */
    public function passes()
    {
        $validation = Validator::make($this->input, static::$rules, static::$messages);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }

    /**
     * Get the validation errors
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * get the validated data
     *
     * @author Steve Montambeault
     * @link   http://stevemo.ca
     *
     * @return array
     */
    public function getInput()
    {
        return $this->input;
    }

}
