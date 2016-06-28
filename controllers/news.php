<?php  

class News_Controller  
{  
    /** 
     * $template save "view"file name ，exclude ".php" 
     */  
    public $template = 'news';  
  
    
    public function main(array $getVars)  
    {  
       $newsModel=new News_Model;
       $article = $newsModel->get_article('test');  
      
       $view = new View_Model($this->template);   
        
       $view->assign('title' , $article['title']);   
       $view->assign('content' , $article['content']); 
         
       //print_r($article); 
    }  
}  