<?php
class CartValidator extends CFormModel {
    public function __get($name) {
        return isset($_POST['CartValidator'][$name])?$_POST['CartValidator'][$name]:null;
    }

    static function validateValues( Array $rules ) {
        $dummy = new CartValidator();

        foreach($rules as $rule) {
            if( isset($rule[0],$rule[1]) ) {
                $validator = CValidator::createValidator(
                     $rule[1],
                     $dummy,
                     $rule[0],
                     array_slice($rule,2)
                );
                $validator->validate($dummy);
            }
            else { /* throw error; */ }
        }

        //print_r( $dummy->getErrors() );
        if ($dummy->hasErrors())
            return $dummy->getErrors();
        else
            return false;
        //return !$dummy->hasErrors();
    }
}
?>