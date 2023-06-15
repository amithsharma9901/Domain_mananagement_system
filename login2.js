function validate()
{
if(document.getElementById("text1").value=="Full_Stack" && document.getElementById("text2").value=="India"){
alert("login successfull");
location.href="indexx.html";
}
else
{
    alert("login failed");
    location.href = "login2.html";
}
}