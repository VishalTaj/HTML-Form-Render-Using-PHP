# HTML-Form-Render-Using-PHP
Rendering a html form using php and bootstrap
eg:

  <?php
  
          //this array is passed to $field_name and its is used to create a select tag array[key]
          refers to name attribute of select and inside array will be value of each option tag
          
          $status=array("status"=>array("On going","Completed","Partial","Intial Phase")); 
  
          //specify the type of fields you want it in a form
          
          $field_type = array("text","textarea","file","date","date","select"); 
          
           //specify name= " " of each field in it
  
          $field_name = array("ptitle","des","doc","sdate","edate",$status); 
          
          //label= ""
          
          $label_name = array("Project Title","Description","Upload Project","Start Date","End Date","Status"); 
          
           //class=" "
  
          $class_name = array("control-label","form-control"); 
          
          //id= " "
  
          $id =array("ptitle","des","doc","sdate","edate","status"); 
          
          //finally passing values to view.php
  
          $render_table = new render($field_type,$field_name,$label_name,$class_name,$id,$value); 
          
          
  
  ?>
