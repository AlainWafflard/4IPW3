function custom(param)
{
    let el = document.getElementById("userbutton");
    let x
    x = 3

    if( param >= 5 )
    {
        // el = document.getElementById("brol");
        el.innerHTML = "Log In";
        x = 4
    }
    else
    {
        el.innerHTML = "Logguez-vous";
        x = 2
    }

    console.log("x vaut " + x + "!")
}


console.log("Hello World !");
custom(10)
// alert("attention de bien utiliser ctrl-F5");
