
function showForm(){
        var x = document.getElementById("formular");
        var y = document.getElementById("boutton");

        if (x.style.display = "none"){

        x.style.display = 'block';
        y.style.display = 'none';
   
    } 
    else{
        y.style.display = 'block';
        x.style.display = "none";
    }
}


function validate() {

    var verify = 0;
    var prenom = document.getElementById("prenom");
    var nom = document.getElementById("nom");
    var nin = document.getElementById("nin");
    var phone = document.getElementById("phone");
    var email = document.getElementById("email");
    var categorie_id = document.getElementById("categorie_id");
    



    var cntlprenom = document.getElementById("cntlprenom");
    var cntlnom = document.getElementById("cntlnom");
    var cntlnin = document.getElementById("cntlnin");
    var cntlphone = document.getElementById("cntlphone");
    var cntlemail = document.getElementById("cntlemail");
    var cntlcategorie = document.getElementById("cntlcategorie");

    
        if (prenom.value == "") {
            cntlprenom.style.display = 'block';
            verify = 1
        }
        if (nom.value == "") {
            cntlnom.style.display = 'block';
            verify = 1
        }
        if (nin.value == "") {
            cntlnin.style.display = 'block';
            verify = 1
        }
        if (phone.value == "") {
            cntlphone.style.display = 'block';
            verify = 1
        }
        if (email.value == "") {
            cntlemail.style.display = 'block';
            verify = 1
        }
        if (categorie_id.value == "") {
            cntlcategorie.style.display = 'block';
            verify = 1
        }

        if(verify !=0){
            return false;
        }


}