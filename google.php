<?php
include_once 'simple_html_dom.php';

function google($searchQuery1,$searchQuery2)
{
   
    $searchQuery1=urlencode($searchQuery1);
    $searchQuery2=urlencode($searchQuery2);
    
    $searchUrl='https://www.google.co.in/?gws_rd=cr&ei=MT9aU6zHEsm3rgfF_YDgCw#q='.$searchQuery1.'+'.$searchQuery2;     
    echo $searchUrl;
    
    $html=file_get_html($searchUrl);
    //echo $html;
    
    
    $firstLink=$html->find('a.fk-button-blue', 0);
    //What comes here................?
    
    
    if($firstLink!="")  //if number of results is less then there will be no fk-button-blue
    {
        echo 'first if';
  //      $newLink='http://www.google.co.in'.$firstLink->href;
  //      $html=file_get_html($newLink);

       foreach($html->find('div.rc') as $result) 
       {
        //    $item['title']      = $result->find('h2.fk-srch-item-title', 0)->plaintext;
        //   $item['price']      = $result->find('b.final-price', 0);
        //    $item['image']      =$result->find('div.lastUnit img', 0)->src;
        //    $item['stock']      =$result->find('span.search-shipping', 0);
        //    $item['description']=$result->find('div.fk-item-specs-section', 0);
        //    $buyNowTemp     =$result->find('a.fk-srch-title-text', 0)->href;
        //    $item['buyNow']='http://www.flipkart.com'.$buyNowTemp;
        //    
        echo 'inside foreach';
       	$item['link'] =$result->find('a', 0)->href;
       	$item['site']="filpkart";
        $items[] = $item;
       }
    }
    else
    {
        foreach($html->find('div.fk-product-thumb') as $result) 
       {
        //    $item['title']      = $result->find('a.title', 0)->plaintext;
        //    $item['price']     = $result->find('span.final-price', 0);
        //    $item['image']      =$result->find('a.prd-img img', 0)->src;
        //    $item['stock']      ="Details not available";
        //    $item['description']=$result->find('ul.fk-extra-details', 0);
        //    $buyNowTemp     =$result->find('a.title', 0)->href;
        //    $item['buyNow']='http://www.flipkart.com'.$buyNowTemp;
        //    $item['site']="filpkart";
        //    $items[] = $item;
       }
    }

    
    // replace the code below with return $items;
echo '<table border ="1">';
foreach ($items as $item)
{
    
    echo '<tr><td>';
    
   // echo '<img src="'.$item['image'].'"/></td>';
   // echo '<td><a href="'.$item['buyNow'].'"><b>'.$item['title'].'</b></a> <br/>';
   // echo 'Price : '.$item['price'].'<br/>Stock : '.$item['stock'].' <td>';
   // echo $item['description'].$item['site'];
   
    echo 'inside table for display';
    echo $item['link'];
    echo $item['site'];
    
    echo" </td></tr>";   
    
}
echo "</table>";
 }

?>
