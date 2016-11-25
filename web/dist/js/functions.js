function restN6nikita(texte)
{
        var remainingText=2100-texte.length;
        document.getElementById('caracteresN6nikita').innerHTML=remainingText;
        if (remainingText < 0){
            document.getElementById('countN6nikita').style.color = "red";
        } else{
            document.getElementById('countN6nikita').style.color = "#000";
        }
}

function restN6tyrell(texte)
{
    var remainingText=2100-texte.length;
    document.getElementById('caracteresN6tyrell').innerHTML=remainingText;
    if (remainingText < 0){
        document.getElementById('countN6tyrell').style.color = "red";
    } else{
        document.getElementById('countN6tyrell').style.color = "#000";
    }
}

function restN6marzoni(texte)
{
    var remainingText=2100-texte.length;
    document.getElementById('caracteresN6marzoni').innerHTML=remainingText;
    if (remainingText < 0){
        document.getElementById('countN6marzoni').style.color = "red";
    } else{
        document.getElementById('countN6marzoni').style.color = "#000";
    }
}

function restN6palm(texte)
{
    var remainingText=2100-texte.length;
    document.getElementById('caracteresN6palm').innerHTML=remainingText;
    if (remainingText < 0){
        document.getElementById('countN6palm').style.color = "red";
    } else{
        document.getElementById('countN6palm').style.color = "#000";
    }
}


/*var ratingArea;
ratingArea = $('div.content-4 p.rating');
var note = ratingArea.text();*/



restN6nikita();
restN6tyrell();
restN6marzoni();
restN6palm();