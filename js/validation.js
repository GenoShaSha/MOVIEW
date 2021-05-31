function validateSignUp()
{
    var x = document.forms["SignUpForm"]["full_name"].value;
    if (x != "")
    {
        document.getElementById("errorfull").innerHTML = x;
        return false;
    }
}

function ShowPassword()
{
    var x = document.getElementById("password");
    if (x.type === "password") 
        {
            x.type = "text";
        } else 
        {
            x.type = "password";
        }
}