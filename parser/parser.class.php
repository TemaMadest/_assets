<?
function GetXMLFirstVal($r,$t) {
  if(preg_match_all('/<('.$t.')[^>]{0,}>(.*)<\/\\1>/Usi',$r,$o)) return $o[2][0];
  return '';
}
 
function GetXMLAllVal($r,$t) {
  if(preg_match_all('/<('.$t.')[^>]{0,}?>(.*)<\/\\1>/Usi',$r,$o)) return $o[2];
  return array();
}

class JJtoJsonData{  
  public function getData($username){
    $res = array();
    
     //лента
    $file = "https://".$username.".livejournal.com/data/rss";
    $XML = file_get_contents($file);
    if(!$XML) continue;
    $ITEMS = GetXMLAllVal($XML, 'item');
    $lenta = array();
    foreach($ITEMS as $item){
      $post = array();
      $title = GetXMLFirstVal($item, 'title');
      $link = GetXMLFirstVal($item, 'link');
      $text = GetXMLFirstVal($item, 'description');
      $date = GetXMLFirstVal($item, 'pubDate');
      $title = html_entity_decode($title, ENT_QUOTES);
      $text = html_entity_decode($text, ENT_QUOTES);
      $post['title'] = $title;
      $post['text'] = strip_tags($text, "<img>,<br>");
      $post['date'] = date('d-m-Y, H:i', strtotime($date));
      $post['link'] = $link;     
      array_push($lenta, $post);
    }
    $res['lenta'] = $lenta;

    
    
    
    //инфо юзера + френдлист
    include_once("arc2/ARC2.php");
    $parser = ARC2::getRDFXMLParser();
    $parser->parse('https://'.$username.'.livejournal.com/data/foaf.rdf');
    $triples = $parser->getTriples();
    $res['foaf'] = json_encode($triples, true);  
    $d = json_decode($res['foaf'], true);    
    $obj = array();    
    for($i = 0; $i < count($d); $i++){      
      $id = substr($d[$i]['s'], 2);      
      if(!isset($obj[$id])){
        $obj[$id] = array();        
        $line = array();
        $line[$d[$i]['p']] = $d[$i]['o'];        
        array_push($obj[$id], $line);
      }else{
        $line = array();
        $line[$d[$i]['p']] = $d[$i]['o'];
        array_push($obj[$id], $line);
      }
    }    
    
    $res['foaf'] = array();
    $res['foaf']['info'] = array();
    $res['foaf']['person'] = array();
    
    $info_key = key($obj);
    for($i = 0; $i < count($obj[$info_key]); $i++){
      foreach($obj[$info_key][$i] as $k => $v){        
        if(strpos($k, 'nick') !== false) $res['foaf']['info']['nick'] = $v;
        if(strpos($k, 'name') !== false) $res['foaf']['info']['name'] = $v;
        if(strpos($k, 'journaltitle') !== false) $res['foaf']['info']['journaltitle'] = $v;
        if(strpos($k, 'journalsubtitle') !== false) $res['foaf']['info']['journalsubtitle'] = $v;
        if(strpos($k, 'dateOfBirth') !== false) $res['foaf']['info']['dateOfBirth'] = $v;
        if(strpos($k, 'img') !== false) $res['foaf']['info']['img'] = $v;
        if(strpos($k, 'page') !== false) $res['foaf']['info']['page'] = $v;
        if(strpos($k, 'icqChatID') !== false) $res['foaf']['info']['icqChatID'] = $v;
        if(strpos($k, 'aimChatID') !== false) $res['foaf']['info']['aimChatID'] = $v;
        if(strpos($k, 'jabberID') !== false) $res['foaf']['info']['jabberID'] = $v;
        if(strpos($k, 'bio') !== false) $res['foaf']['info']['bio'] = strip_tags($v, "<img>");
        if(strpos($k, 'interest') !== false) $res['foaf']['info']['interest'] = $v;        
      }
    }    
    
    foreach($obj as $k => $v){
      if($k === $info_key) continue;      
      foreach($obj[$k] as $key => $value){
        if(strpos($key, 'dateCreated') !== false) $res['foaf']['info']['dateCreated'] = $value;
        if(strpos($key, 'dateLastUpdated') !== false) $res['foaf']['info']['dateLastUpdated'] = $value;        
        if(is_array($v) && count($v) == 7 && strpos($v[0]['http://www.w3.org/1999/02/22-rdf-syntax-ns#type'], 'Person') !== false){
          $person = array();
          $person['nick'] = $v[1]['http://xmlns.com/foaf/0.1/nick'];
          $person['name'] = $v[2]['http://xmlns.com/foaf/0.1/member_name'];
          $person['tagLine'] = $v[3]['http://xmlns.com/foaf/0.1/tagLine'];
          $person['image'] = $v[4]['http://xmlns.com/foaf/0.1/image'];      
          array_push($res['foaf']['person'], $person);          
          break;          
        }        
      }      
    }  
    
    //интересы
    $full = file_get_contents('https://www.livejournal.com/misc/interestdata.bml?user='.$username);
    $res['interests'] = $full;


    return $res;
  }  
}

?>