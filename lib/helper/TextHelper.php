<?php
function substringTextByLenght($text,$lenght)
{
    $explodeArray = explode(' ', $text);
    $description = '';
    $dots = '';
    $wordCounter = 0;
    if(strlen($text) > $lenght){
        $dots = '...';
    }
    foreach ($explodeArray as $word) 
    {
        $description .= $word;

        if ($wordCounter >= $lenght) 
        {
            $description .= $dots; 
            break;
        }
        else{
            $description .= ' ';
        }
        $wordCounter++;
    }
    
    unset($explodeArray);
    
    return trim($description);
}

function prepareSlugForUrl($text){
    $text= trim($text);
    
    $text = html_entity_decode($text);
    
    $rules = array(           
            '?' => '',
            ' ' => '-',
            '!' => '',
            '.' => '',
            "&#039;" => '',
            ',' =>'',
            '%' =>'',
            '&' =>'',
            '*' =>'',
            '#' =>'',
            '(' =>'',
            ')' =>'',
            '/' =>'',
            '\\'=>'',
            '"' => '',
            '' => '',
            '„' =>'',
            '”' =>'',
            '"' =>'');
    
    foreach ($rules as $key => $value) {
        $text = str_ireplace($key, $value, $text);
    }
    $text = strtolower($text);

    return $text; 
}

function prepareTextForPageTitle($text){
    
}
?>
