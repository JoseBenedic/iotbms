$(document).ready(function(){
  $("#example").DataTable({
    "processing": true,
    "serverSide": true,
    "search": {
      return: true,
    },
    "ajax":{
      url: ""
    }
  });
});
