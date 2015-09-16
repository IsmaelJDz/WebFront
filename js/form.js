function validar(){
  i=1;
  $("#frm_contacto :input").each(function(index, item){
    //console.log(item.type+ " " + item.value.length );
    if($(item).val().length==0 &&  item.type != "submit"){
      i=0;
      return false;
    }
    //console.log(i); 
  }); 
  return i;
  
}

function enviar(){
    console.log("hola");
  if(validar()==1){
    $.post("scripts/enviar.php",$("#frm_contacto").serialize(),function(){
      alert("Tus datos se han enviado correctamente en breve nos prondremos en contacto contigo, gracias !");
      resetfrm();
    });
  }else{
    alert("Todos los campos son obligatorios");
  } 
}
function resetfrm(){
    $("#frm_contacto :input").each(function(index, item){
      if(item.type!="submit")
        $(item).val("");
    });
}