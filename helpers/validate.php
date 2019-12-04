<?php


//echo $connection.;
 class Validate{
  private $_passed = false,
			$_errors = array(),
			$db = null;
 
  public function check ($source, $items = array())
	  {
		  foreach($items as $item => $rules){
		  foreach($rules as $rule => $rule_value){
		  
		  $value = trim($source[$item]);
			if($rule === 'required'&& empty($value)){
				$this->addError($item,"{$item} is required");
			}
			else if(!empty($value)){
				switch($rule){
					
					case 'numeric':
					if (!ctype_digit ($value)){
					$this->addError($item,"Invalid {$item} please enter a valid{$item}!");
					}
					break;
					case 'matches':
					if($value !=$source[$rule_value]){
					$this->addError($item,"{$rule_value} must  Match item {$item}");	
					}
					break;
					case 'isemail':
					if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
					$this->addError($item,"invalid email address.");
					}
					break;
					case 'alphabetic':
					if (!ctype_alpha($value)){
					$this->addError($item,"Only Alphabets are allwoed in{$item}");
					}
					break;

					case 'isprice':
					if (!is_numeric($value)){
					$this->addError($item,"You must enter a numeric value.");
					}
					break;

					case 'isname':
					if (!ctype_alpha(str_replace([' ','-'], '', $value))){
					$this->addError($item,"Only Alphabets & '. + & !-' are allwoed in{$item}");
					}
					break;
					case 'unique':
					
					$query = "SELECT * FROM $rule_value WHERE  $item = '$value'";
					$connection = mysqli_connect("localhost","root","","medimart");
					//$sql = "SELECT * FROM users WHERE email= '$value'";
			        
			        $result = mysqli_query($connection,$query);
			        
			         if ($result->num_rows == 1) {
			          $this->addError($item,"{$item} already exist! please try with a different {$item}.");
			         }
			         
					break;

					case 'password':
					if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$_POST['password'])){
					$this->addError($item,"{$item} must be a combination of Upper & Lower case, digit and special characters.");
					}

					break;
					case 'minvalue':
					if($value < $rule_value){
					$this->addError($item,"{$item} must not be less than {$rule_value}.");	
					}
					break;
					case 'maxvalue':
					if($value > $rule_value){
					$this->addError($item,"{$item} must not be more than {$rule_value}.");	
					}
					break;
					case 'min':
					if((strlen($value) < $rule_value)){
					$this->addError($item,"{$item} must be a minimum of {$rule_value} charter");	
					}
					break;
					case 'max':
					if((strlen($value) > $rule_value)){
					$this->addError($item,"{$item} must not be more than {$rule_value} charters.");	
					}
					break;
					case 'lengthmatch':
					if((strlen($value) != $rule_value)){
					$this->addError($item,"{$item} must  be {$rule_value} digit long!");	
					}
					break;
				}
				
			}
		  
		  }
		  }
		  if(empty($this->_errors)){
			  $this->_passed = true;
		  }
		  return $this;
	  }
	  private function addError($name,$error){
		  $this->_errors["error_".$name] = $error;
	  }
	  public function errors(){
		  
		  return $this->_errors;
	  }
	  public function passed(){
		  
		  return $this->_passed ;
	  }
  }
?>