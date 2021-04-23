function editAulaOnClick(id) {
  //alert("edit id: " + id);
}

function deleteAulaOnClick(id) {
  $.ajax({
    url: 'command_functions.php',
    type: 'POST',
    data: {command: 'delete', id: id},
    success:function(response){
      console.log('Success: '+response);
      location.reload();
    },
    error:function(x,e){
      console.log('Unknow Error.\n'+x.responseText);
    }
  });
}
