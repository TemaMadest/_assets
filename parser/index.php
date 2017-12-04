<?php
include_once("parser.class.php");
$parse = new JJtoJsonData();
$data = $parse->getData($_GET['username']);

?>

<!DOCTYPE html>
<html lang="ru">
<style>
  div#container{
    max-width: 1200px;
    width:1200px; 
    margin: 0 auto;
    padding: 0 1rem;
  }
  
  div.lenta-item{
    margin:1rem 0;
    border: 2px solid #413075;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    background: #0d051d1c;
  }
  
  div.lenta-item > .col{
    width: 100%;
    display: flex;
    margin: 1rem 0;
  }
  
  div.lenta-item > .col img{
    width: 100%;
  }
  
  div.lenta-item .title{
    font-size:1.3rem;
    font-weight: bold;
  }
  
  div.item-double-1{
    width: 30%;
    height: 2rem;
    line-height: 2rem;
    display: inline-block;
    margin-top: 1rem;
    vertical-align: top;
  }
  
  div.item-double-2{
    width: 70%;
    height: 2rem;
    line-height: 2rem;
    display: inline-block;
    margin-top: 1rem;
  }
  
  div.item-friend{
    display: flex;
    flex-direction: column;
    margin-top: 1rem;
    align-items: center;
    padding: 1rem;
    border: 2px solid #413075;
  }
  
  div.item-friend > .col{
    width: 100%;
    display: flex;
    align-items: center;
    margin: 1rem 0;
  }
</style>


<body>



<div id="container">
  
  <div style="border:1px solid #000; padding: 1rem;">
    <div style="text-align: center; font-size:2.3rem; font-weight: bold;">Лента</div>
    <?php 
      for($i = 0; $i < count($data['lenta']); $i++){
        $res = '<div class="lenta-item">';
        $res .= '<div class="title col"><div style="min-width:30%;">Заголовок</div><div style="max-width:70%;">'.$data['lenta'][$i]['title'].'</div></div>';
        $res .= '<div class="date col"><div style="min-width:30%;">Дата публикации</div><div style="max-width:70%;">'.$data['lenta'][$i]['date'].'</div></div>';
        $res .= '<div class="link col"><div style="min-width:30%;">Ссылка на пост</div><div style="max-width:70%;">'.$data['lenta'][$i]['link'].'</div></div>';
        $res .= '<div class="text col"><div style="min-width:30%;">Содержимое</div><div style="max-width:70%;">'.$data['lenta'][$i]['text'].'</div></div>';
        $res .= '</div>';
        echo $res;
      }
    ?>
  </div>
  
  <div style="border:1px solid #000; padding: 1rem;">
    <div style="text-align: center; font-size:2.3rem; font-weight: bold;">Интересы</div>
    <?php
      echo '<pre style="padding:1rem;">'.$data['interests'].'</pre>';
    ?>
  </div>

  <div style="border:1px solid #000; padding: 1rem;">
    <div style="text-align: center; font-size:2.3rem; font-weight: bold;">Инфо</div>
    <?php  
      for($i = 0; $i < count($data['foaf']['info']); $i++){
        $key = key($data['foaf']['info']);
        echo '<div class="item-double-1">'.$key.'</div><div class="item-double-2">'.$data['foaf']['info'][$key].'</div>';
        next($data['foaf']['info']);
      }  
    ?>
  </div>
  
  <div style="border:1px solid #000; padding: 1rem;">
    <div style="text-align: center; font-size:2.3rem; font-weight: bold; margin-top:2rem;">Друзья</div>
    <?php
      for($i = 0; $i < count($data['foaf']['person']); $i++){
        echo '<div class="item-friend">
          <div class="friend-photo col"><div style="width:30%;">Фото</div><img style="margin-right:1rem;" src="'.$data['foaf']['person'][$i]['image'].'"></div>
          <div class="friend-text col"><div style="width:30%;">Ник - Имя</div><div>'.$data['foaf']['person'][$i]['nick'].' - '.$data['foaf']['person'][$i]['name'].'</div></div>
          <div class="friend-desc col"><div style="width:30%;">Цитата</div><div>'.$data['foaf']['person'][$i]['tagLine'].'</div></div>
        </div>';
      }
    ?>
  </div>
</div>



</body>

</html>