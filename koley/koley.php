<?php

  require_once('../v2.0/src/lib/mpdf60/mpdf.php');
  $file_name = "report.pdf";
  $pdf = new mPDF('utf-8', 'A4', '10', 'Arial', 15, 15, 10, 0, 0, 0);
  $pdf->charset_in = 'utf-8';
  
  
  
  function deploy($string, $c){
    $mas = explode(" ", $string);
    $res = '<td style="border-bottom:1px solid #000; padding-left: 10px;">';
    for($i = 0; $i < $c; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';    
    $line = '';
    for($i = $c; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === $c + 23 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === $c + 46 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === $c + 69 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }    
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    if(count($mas) > 4 && count($mas) < 24){
       $res .= '
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    if(count($mas) > 24 && count($mas) < 69){
       $res .= '
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    
    return $res;
  }
  
  
  function deff($param){    
    $res = '
    <table width="100%">
      <tr>
        <td width="60%" height="60" style="border:1px solid #000;">
          <table>
            <tr>
              <td width="60" height="60" style="border:1px solid #000;"><img src="img/logo.png" width="60" height="60"></td>
              <td width="350" height="60" style="border:1px solid #000;">
                <table>
                  <tr>
                    <td width="350" align="center"><img height="22" src="img/logo1.png"></td>                  
                  </tr>
                  <tr>
                    <td width="350" align="center" style="font-size:10px; text-decoration: underline;">ГОСУДАРСТВЕННОЕ УНИТАРНОЕ ПРЕДПРИЯТИЕ ОРЛОВСКОЙ ОБЛАСТИ</td>                  
                  </tr>
                  <tr>
                    <td width="350" align="center" style="font-size:10px; text-decoration: underline;">302020 г. Орел, ул. Базовая, 6. т: (4862) 41-34-68. E-mail: aacrsu@bk.ru </td>                  
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
        <td width="40%" height="60"></td>
      </tr>
    </table>';  
    $res .= '
    <table width="100%" style="margin-top:25px;"><tr><td width="50%" align="left">СОГЛАСОВАНО:</td><td width="50%" align="right">УТВЕРЖДАЮ:</td></tr></table>
    <table width="100%" style="margin-top:10px;"><tr><td width="100">Главный врач</td><td style="border-bottom:1px solid #000;"></td><td width="350" align="right">Заместитель директора</td></tr></table>
    <table width="100%"><tr><td style="border-bottom:1px solid #000;" width="328"></td><td align="right">ГУП Орловской области «Медтехника»</td></tr></table>
    <table width="100%"><tr><td width="163" style="border-bottom:1px solid #000;"></td><td>/</td><td width="163" style="border-bottom:1px solid #000;"></td><td>/</td><td width="80"></td><td width="140" style="border-bottom:1px solid #000;"></td><td width="20"></td><td width="110" style="border-bottom:1px solid #000;" align="right">Г.А. Щербаков</td></tr></table>
    ';
    $res .= '<table width="100%" style="margin-top: 40px;"><tr><td style="font-weight: bold; font-size: 16px;">ДЕФЕКТНЫЙ   АКТ   №</td><td width="230"></td><td>от «&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;»</td><td width="120"></td><td width="70">2017</td></tr></table>';
    $res .= '<table width="100%" style="margin-top: 40px;"><tr><td width="250">Наименование лечебного учреждения</td><td style="border-bottom:1px solid #000; padding-left: 10px;">';
    $mas = explode(" ", $param['title']);
    for($i = 0; $i < 3; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';
    $line = '';
    for($i = 3; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 26 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 49 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    } 
    $res .= '<table width="100%"><tr><td width="195">Адрес лечебного учреждения</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['adres'].'</td></tr></table>';
    $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    $res .= '<table width="100%"><tr><td width="165">Наименование аппарата</td><td style="border-bottom:1px solid #000; padding-left: 10px;">';
    $mas = explode(" ", $param['name']);
    for($i = 0; $i < 5; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';
    $line = '';
    for($i = 5; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 26 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 49 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    $res .= '<table width="100%"><tr><td width="90">Изготовитель</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['manufacturer'].'</td></tr></table>';
    $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    $res .= '<table width="100%"><tr><td width="85">Год выпуска</td><td width="100" style="border-bottom:1px solid #000;">'.$param['date'].'</td><td width="118">Заводской номер</td><td style="border-bottom:1px solid #000;">'.$param['releazenum'].'</td></tr></table>';
    $res .= '<table width="100%"><tr><td width="170">Наличие договора на КТО</td><td style="border-bottom:1px solid #000;">'.$param['dogovor'].'</td></tr></table>';
    $res .= '<table width="100%"><tr><td width="200">Обнаруженная неисправность</td>';
    $mas = explode(" ", $param['check']);
    $res .= '<td style="border-bottom:1px solid #000; padding-left: 10px;">';
    for($i = 0; $i < 4; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';    
    $line = '';
    for($i = 4; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 13 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 22 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 31 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 40 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    if(count($mas) > 4 && count($mas) < 13){
       $res .= '
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    if(count($mas) > 24 && count($mas) < 22){
       $res .= '
      <div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    $res .= '<table width="100%"><tr><td width="270">Оборудование необходимое для ремонта</td><td style="border-bottom:1px solid #000;">';
    $mas = explode(" ", $param['device_list']);
    for($i = 0; $i < 4; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';    
    $line = '';
    for($i = 4; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 26 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 49 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    } 
    $res .= '<table width="100%"><tr><td width="240">Наличие технической документации</td><td style="border-bottom:1px solid #000;">'.$param['documentation'].'</td></tr></table>';   
    /*********************/
    $res .= '<table width="100%"><tr><td width="170">Техническое заключение</td><td style="border-bottom:1px solid #000; padding-left: 10px;">';
    $mas = explode(" ", $param['conclusion']);
    for($i = 0; $i < 6; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';    
    $line = '';
    for($i = 6; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 16 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 26 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 36 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    if(count($mas) && count($mas) > 4 && count($mas) < 24){
       $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }    
    /*****************************/
    /*****************************/
    $res .= '<table width="100%"><tr><td width="95">Предложение</td><td style="border-bottom:1px solid #000; padding-left: 10px;">';
    $mas = explode(" ", $param['sentence']);
    for($i = 0; $i < 7; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';    
    $line = '';
    for($i = 7; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 17 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 27 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 37 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    if(count($mas) && count($mas) > 4 && count($mas) < 24){
       $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    //$res .= '<table width="100%"><tr><td width="95">Предложение</td>'.deploy($param['sentence'], 8);
    $res .= '<div style="margin-top:25px; margin-left: 2px; border-bottom:1px solid #000; width:115px;">Состав комиссии:</div>';
    $res .= '<table width="100%" style="margin-top:15px;"><tr><td width="40%">Представитель лечебного учреждения</td><td width="10%"></td><td width="24%" style="border-bottom:1px solid #000;"></td><td>/</td><td width="24%" style="border-bottom:1px solid #000;"></td><td>/</td></tr></table>';
    $res .= '<table width="100%" style="margin-top:15px;"><tr><td width="40%" style="vertical-align: bottom;">Специалист РСУ ГУП Орловской области «Медтехника» проводивший технический осмотр</td><td width="10%"></td><td width="24%" style="border-bottom:1px solid #000;"></td><td style="vertical-align: bottom;">/</td><td width="24%" style="border-bottom:1px solid #000; vertical-align: bottom; text-align: center;">'.$param['fio'].'</td><td style="vertical-align: bottom;">/</td></tr></table>';
    $res .= '<table width="100%" style="margin-top:15px;"><tr><td width="40%">Начальник РСУ ГУП Орловской области «Медтехника»</td><td width="10%"></td><td width="24%" style="border-bottom:1px solid #000;"></td><td style="vertical-align: bottom;">/</td><td width="24%" style="border-bottom:1px solid #000; vertical-align: bottom; text-align:center;">А.Г. Шалимов</td><td style="vertical-align: bottom;">/</td></tr></table>';
    return $res;
  }
  
  
  
  
  
  
  
  
  
  
  
  function report($param){
    $res = '
    <table width="100%">
      <tr>
        <td width="60%" height="60" style="border:1px solid #000;">
          <table>
            <tr>
              <td width="60" height="60" style="border:1px solid #000;"><img src="img/logo.png" width="60" height="60"></td>
              <td width="350" height="60" style="border:1px solid #000;">
                <table>
                  <tr>
                    <td width="350" align="center"><img height="22" src="img/logo1.png"></td>                  
                  </tr>
                  <tr>
                    <td width="350" align="center" style="font-size:10px; text-decoration: underline;">ГОСУДАРСТВЕННОЕ УНИТАРНОЕ ПРЕДПРИЯТИЕ ОРЛОВСКОЙ ОБЛАСТИ</td>                  
                  </tr>
                  <tr>
                    <td width="350" align="center" style="font-size:10px; text-decoration: underline;">302020 г. Орел, ул. Базовая, 6. т: (4862) 41-34-68. E-mail: aacrsu@bk.ru </td>                  
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
        <td width="40%" height="60"></td>
      </tr>
    </table>';  
    $res .= '
    <table width="100%" style="margin-top:15px;"><tr><td width="50%" align="left">СОГЛАСОВАНО:</td><td width="50%" align="right">УТВЕРЖДАЮ:</td></tr></table>
    <table width="100%" style="margin-top:5px;"><tr><td width="100">Главный врач</td><td style="border-bottom:1px solid #000;"></td><td width="350" align="right">Заместитель директора</td></tr></table>
    <table width="100%"><tr><td style="border-bottom:1px solid #000;" width="328"></td><td align="right">ГУП Орловской области «Медтехника»</td></tr></table>
    <table width="100%"><tr><td width="163" style="border-bottom:1px solid #000;"></td><td>/</td><td width="163" style="border-bottom:1px solid #000;"></td><td>/</td><td width="80"></td><td width="140" style="border-bottom:1px solid #000;"></td><td width="20"></td><td width="110" style="border-bottom:1px solid #000;" align="right">Г.А. Щербаков</td></tr></table>
    ';
    $res .= '
    <table width="100%" style="margin-top: 15px;">
      <tr><td width="100%" align="center" style="font-weight: bold; font-size: 16px;">ВЕДОМОСТЬ   №</td></tr>
      <tr><td width="100%" align="center" style="font-weight: bold; font-size: 14px;">дефектов медицинского оборудования подлежащих списанию</td></tr>
      <tr><td width="100%" align="center" style="font-size: 12px; border-bottom: 2px solid #000;">(заполняется специалистом проводившим технический осмотр)</td></tr>
    </table>';
    $res .= '<table width="100%" style="margin-top: 15px;"><tr><td width="250">Наименование лечебного учреждения</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['title'].'</td></tr></table>';
    $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    $res .= '<table width="100%"><tr><td width="195">Адрес лечебного учреждения</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['adres'].'</td></tr></table>';
    $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    $res .= '<table width="100%"><tr><td width="165">Наименование аппарата</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['name'].'</td></tr></table>';
    $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    $res .= '<table width="100%"><tr><td width="90">Изготовитель</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['manufacturer'].'</td></tr></table>';
    $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    $res .= '<table width="100%"><tr><td width="85">Год выпуска</td><td width="100" style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['date'].'</td><td width="90">Заводской №</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['releaze_num'].'</td><td width="50">Инв. №</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['inv_num'].'</td></tr></table>';
    $res .= '<table width="100%"><tr><td width="260">Сколько лет находится в эксплуатации</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['year'].'</td></tr></table>';
    $res .= '<table width="100%"><tr><td width="410">Условия эксплуатации (сменность работы, загрузка аппарата)</td><td style="border-bottom:1px solid #000; padding-left: 10px;">';
    $mas = explode(" ", $param['conditions']);
    for($i = 0; $i < 3; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';    
    $line = '';
    for($i = 3; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 26 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 49 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    $res .= '<table width="100%"><tr><td width="150">Балансовая стоимость</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['price'].'</td></tr></table>';
    $res .= '<table width="100%"><tr><td width="275">Вид и количество проведенных ремонтов</td><td style="border-bottom:1px solid #000; padding-left: 10px;">'.$param['service'].'</td></tr></table>';    
     /****************/
    $res .= '<table width="100%"><tr><td width="365">Подробное описание технического состояния аппарата</td><td style="border-bottom:1px solid #000; padding-left: 10px;">';
    $mas = explode(" ", $param['description']);
    for($i = 0; $i < 4; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';    
    $line = '';
    for($i = 4; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 15 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 25 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 35 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    if(count($mas) && count($mas) > 4 && count($mas) < 24){
       $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    /****************/  
    $res .= '<table width="100%"><tr><td width="190">Причина списания аппарата</td><td style="border-bottom:1px solid #000; padding-left: 10px;">';
    $mas = explode(" ", $param['reason']);
    for($i = 0; $i < 5; $i++){
      $res .= $mas[$i].' ';
    }
    $res .= '</td></tr></table>';    
    $line = '';
    for($i = 5; $i < count($mas); $i++){
      $line .= $mas[$i].' ';      
      if($i === 15 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 25 || $i + 1 === count($mas)){        
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }elseif($i === 35 || $i + 1 === count($mas)){
        $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px; padding-left: 2px;">'.$line.'</div>';
        $line = '';
      }
    }
    if(count($mas) > 0 && count($mas) < 4){
      $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    if(count($mas) && count($mas) > 4 && count($mas) < 24){
       $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    }
    $res .= '<table width="100%" style="margin-top: 20px;"><tr><td width="40%">Специалист ГУП Орловской области «Медтехника» проводивший технический осмотр</td><td></td></tr></table>';
    $res .= '<table width="100%"><tr><td width="33%" align="center">'.$param['work'].'</td><td width="33%" align="center"></td><td width="33%" align="center">'.$param['fio'].'</td></tr></table>';
    $res .= '<table width="100%" style="border-bottom:1px solid #000;"><tr><td width="100%"></td></tr></table>';
    $res .= '<table width="100%"><tr><td width="33%" align="center" style="font-size:10px;">должность</td><td width="33%" align="center" style="font-size:10px;">подпись</td><td width="33%" align="center" style="font-size:10px;">Ф.И.О.</td></tr></table>';
    $res .= '<div style="margin-top:10px;">Заключение старшего инженера <br/> ГУП Орловской области «Медтехника»: <b>Подлежит списанию</b></div>';
    $res .= '<div style="border-bottom:1px solid #000; width:99.5%; margin-left:2px; height: 20px;"></div>';
    $res .= '<div style="margin-top:15px; margin-left:2px; border-bottom: 1px solid #000; width: 430px;">Утилизацию ГУП Орловской области «Медтехника» не производит.</div>';
    $res .= '<table width="100%" style="margin-top: 20px;"><tr><td width="60%">Начальник РСУ ГУП Орловской области «Медтехника»</td><td width="2%"></td><td width="20%" style="border-bottom:1px solid #000;"></td><td>/</td><td width="17%" align="center" style="border-bottom:1px solid #000;">А.Г. Шалимов</td></tr></table>';
    $res .= '<table width="100%"><tr><td width="60%"></td></td><td width="24%" align="center" style="font-size:10px;">подпись</td><td width="16%"></td></tr></table>';
    $res .= '<table width="100%" style="margin-top:15px;"><tr><td width="60%"></td></td><td width="24%" align="center">«&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;»</td><td width="16%" align="right">2017 г.</td></tr></table>';
    return $res;
  }
 
  
  
  $html = '<!DOCTYPE html><html><head></head><body>';  
  if($_POST['blank'] == "deff"){
    $html .= deff($_POST);
  }elseif($_POST['blank'] == "report"){
    $html .= report($_POST);
  }  
  $html .= '</body></html>';
  $pdf->writeHTML($html, 2);  
  $pdf->Output($file_name, 'I');
?>