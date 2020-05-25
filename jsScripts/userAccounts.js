function openForm(name) {
  if(name =="chngEmail"){
    document.getElementById("emailPopup").style.display = "block";
  }else if(name == "chngName"){
    document.getElementById("namePopup").style.display = "block";
  }else if(name == "chngTelNum"){
    document.getElementById("telNumPopup").style.display = "block";
  }
}
  
  function closeForm(name) {
    if(name =="chngEmail"){
      document.getElementById("emailPopup").style.display = "none";
    }else if(name == "chngName"){
      document.getElementById("namePopup").style.display = "none";
    }else if(name == "chngTelNum"){
      document.getElementById("telNumPopup").style.display = "none";
    }
}