$("#button1").click(function(){
    var newpass=$("#new").val();
    var conpass=$("#confirm").val();
    if(newpass!=conpass){
        alert("Please Enter Same Password");
        $("#confirm").focus();
        return false;
    }
    
});
$("#on_click").click(function(){
 if($("#username").val()=="" || $("#username").val()==null){
       alert("Please Enter username ");
       $("#username").focus();
       return false;

   }
   if($("#pass").val()=="" || $("#pass").val()==null){
    alert("Please Enter password");
    $("#pass").focus();
    return false;
   }
    
});
//add-category ke liye
$("#cate_sub").click(function(){
    
    if(!$("input[name='featured']:checked").val() || !$("input[name='active']:checked").val() ){
        alert("please check buttons");
        return false;
    }

    
});

