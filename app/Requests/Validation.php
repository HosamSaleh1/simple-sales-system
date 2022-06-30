<?php

namespace App\Requests\Validation;

/**
 * To Collect All Validations
 */

Trait Validation
{

    public function fieldRequired()
    {
        $errors = [];
        $fields = func_get_args();
        foreach ($fields as $key => $field) {
            if (!$field) {
                $errors['required'] = "<div class='alert alert-danger text-center'>All Fields Are Required</div>";
            }
        }
        return $errors;
    }

    public function fieldPattern($field, $name, $pattern = "/^([\w\-\.]+)@((\[([0-9]{1,3}\.){3}[0-9]{1,3}\])|(([\w\-]+\.)+)([a-zA-Z]{2,4}))$/")
    {
        $errors = [];
        if(!preg_match($pattern,$field)){
                $errors['pattern'] = "<div class='alert alert-danger text-center'> Wrong $name format</div>";
            }
        return $errors;
        // [] => no errors
        // array has values => errors
    }

}


