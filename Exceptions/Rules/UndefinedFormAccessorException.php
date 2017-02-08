<?php


namespace Barbieswimcrew\Bundle\DynamicFormBundle\Exceptions\Rules;


class UndefinedFormAccessorException extends \Exception
{
    public function __construct($cssId , $code = 0, \Exception $previous = null) {
        $message = sprintf("You defined a form accessor within a RuleSetInterface Object which could not be resolved to the given Form structure. ID = %s", $cssId);
        parent::__construct($message, $code, $previous);
    }
}