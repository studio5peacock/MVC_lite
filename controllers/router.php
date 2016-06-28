<?php  
  

function __autoload($className)  
{  
     
    list($filename , $suffix) = split('_' , $className);  
  
     
    $file = SERVER_ROOT . '/models/' . strtolower($filename) . '.php';  
  
     
    if (file_exists($file))  
    {  
        
        include_once($file);          
    }  
    else  
    {  
        //文件不存在  
        die("File '$filename' containing class '$className' not found.");      
    }  
}  

$request = $_SERVER['QUERY_STRING'];  

$parsed = explode('&' , $request);  
  
 
$page = array_shift($parsed);  
  

$getVars = array();  
foreach ($parsed as $argument)  
{  
    
    list($variable , $value) = split('=' , $argument);  
    $getVars[$variable] = $value;  
}  
  

$target = SERVER_ROOT . '/controllers/' . $page . '.php';  
  
 
if (file_exists($target))  
{  
    include_once($target);  
  
  
    $class = ucfirst($page) . '_Controller';  
  
     
    if (class_exists($class))  
    {  
        $controller = new $class;  
    }  
    else  
    {  
         
        die('class does not exist!');  
    }  
}  
else  
{  
   
    die('page does not exist!');  
}  
  

$controller->main($getVars);

?>   


