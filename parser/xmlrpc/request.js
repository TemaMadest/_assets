(function(){  
  
  $.ajax({
    url: "https://www.livejournal.com/__api/",
    type: "POST",
    jsonrpc: "2.0",
    crossDomain: true,
    id: 4,
    method:"user.search",
    params: {
      auth_token: "sessionless:1512547200:/__api/::ee21de281ade8334d27e04c7c3b6acc4152be277",
      fields: {
        is_friend:true,
        journal_title:true,
        journal_url:true,
        journaltype:true,
        updated:true
      },
      limit: 10,
      pagenum: 2,
      q: "ivanov ivan"
    }
    
  }).success(function(data){
    console.log(data, 'azazaza');
  }).error(function(err){    
    console.log(err, 'azazaza');
  });
  
}());