function se(){
  var data = $('#se').serialize()+'auth/login';
  $.post(request_url,data,function(response)
  {
    if(response.error)
    {
      alert(response.error);
    }else{
      window.location.reload(true);
    }
  },'json');
}