function clearTxt(){
  let msg = "Are you sure you want to clear all text input fields?";
  if(confirm(msg)){-
      document.getElementsByTagName("form")[0].reset();
  }
}

function pEmpty(){
  let num = document.forms.length;
  for(let i=0; i<num;i++){
      let id = document.forms.item(i).id;
      if(id.value=="description"){continue;}
      else if(id.value==""||id.value==null){
          alert("Must not be left empty");
          return false;
      }
  }
  return true;
}
