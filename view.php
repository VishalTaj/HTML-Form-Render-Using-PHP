<?php
class form{
	public $data_array;
	protected function text($name,$class,$id,$label,$other){
		echo "<input type='text' name='".$name."' class='".$class."' id='".$id."' placeholder='".$label."' ".$other.">\n";
	}
	function password($name,$class,$id,$label,$other){
		echo "<input type='password' name='".$name."' class='".$class."' id='".$id."' placeholder='".$label."' ".$other.">\n";
	}
	function date($name,$class,$id,$label,$other){
		echo "<input type='date' name='".$name."' class='".$class."' id='".$id."' placeholder='".$label."' ".$other.">\n";
	}
	function email($name,$class,$id,$label,$other){
		echo "<input type='email' name='".$name."' class='".$class."' id='".$id."' placeholder='".$label."' ".$other.">\n";
	}
	function tel($name,$class,$id,$label,$other){
		echo "<input type='tel' name='".$name."' class='".$class."' id='".$id."' placeholder='".$label."' ".$other.">\n";
	}
	function radio($name,$class,$id,$label,$other){
		$key = key($name);
		foreach ($name as $value){

			foreach ($value as $value1) {
				echo "<input type='radio' name='".$key."' value='".$value1."'>".$value1."\n";	# code...
			}
				
		}
	}
	function file($name,$class,$id,$label,$other){
		echo "<div class='fileUpload btn btn-primary'>";
		echo "<span> Upload Your Doc</span>";
		echo "<input type='file' name='".$name."' class='".$class." upload btn btn-primary' id='".$id." uploadBtn' placeholder='".$label."' ".$other.">\n";
		echo "</div><br>";
	}
	function select($name,$class,$id,$label,$other){
		$key =key($name);
		echo "<select name=".$key." class='".$class."' id='".$id."'>\n"; 
		foreach ($name as &$value) {
			foreach ($value as &$value1) {
				if($value1[strlen($value1)-1]=='1'){
					$value1=substr_replace($value1, "", -1);
					echo "<option value='".$value1."'".$other." selected='selected'>".$value1."</option>\n";	
				}
				elseif($value1[strlen($value1)-1]=='0'){
					$value1=substr_replace($value1, "", -1);
					echo "<option value='".$value1."'".$other.">".$value1."</option>\n";
				}
					# code...
			}
		}
		echo "</select>\n";
	}
	function textarea($name,$class,$id,$label,$other){
		echo "<div class='selectpicker'>";
		echo "<textarea name='".$name."' id='".$id."' class='".$class."' placeholder='".$label."' ".$other."</textarea>\n";
		echo "</div>";
	}
	function tr($data_array,$name,$label,$class,$id,$other){
		$i=0;

		foreach ($data_array as $value) {
			echo "\t<label for='".$label[$i]."' class='".$class[0]."'>\n\t".$label[$i]."\n</label>";
			if($value=='text' || $value=='password' ||$value=='radio' ||$value=='select'||$value=='file'||$value=='email'||$value=='date'||$value=='tel'){
				echo call_user_func_array(__NAMESPACE__.'\form::'.$value.'', array($name[$i],$class[1],$id[$i],$label[$i],$other[$i]));
			}
			elseif($value=='textarea'){
				if($other[$i][strlen($other[$i])-1]=='>')
				{
					echo call_user_func_array(__NAMESPACE__.'\form::'.$value.'', array($name[$i],$class[1],$id[$i],$label[$i],$other[$i]));
				}
				else{
					$other[$i]=$other[$i].">";
					echo call_user_func_array(__NAMESPACE__.'\form::'.$value.'', array($name[$i],$class[1],$id[$i],$label[$i],$other[$i]));
				}
			}
			$i++;
		}
	}
}
class render{
			protected $field_type;
			protected $field_name;
			protected $label_name;
			protected $table_rows;
			protected $class_name;
			protected $id;
			protected $other;
			function __construct($field_type,$field_name,$label_name,$class_name,$id,$other)
			{
				$this->field_type = $field_type;
				$this->field_name = $field_name;
				$this->label_name = $label_name;
				$this->class_name = $class_name;
				$this->id = $id;
				$this->other = $other;
				$this->table_rows = new form();
				$this->table_rows->tr($this->field_type,$this->field_name,$this->label_name,$this->class_name,$this->id,$this->other);	
			}
			static function make_array(){
				for($i=0;$i<=4;$i++){
					$array[$i]= 2000 + $i;
				}
				return $array;
			}
			
		}
?>
