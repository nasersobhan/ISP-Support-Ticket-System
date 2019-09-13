// GROUP CHAT
$('#btn-chat').click(function(){
    console.log('down');
    var objDiv = document.getElementById("groupchat");
    objDiv.scrollTop = objDiv.scrollHeight;
});

$('#gchat').submit(function(){
    setTimeout(function() {
        console.log('down');
        var objDiv = document.getElementById("groupchat");
        objDiv.scrollTop = objDiv.scrollHeight;
    },100);
  });