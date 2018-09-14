
//UPITI ZA FORMU na single-post.php stranici, kreiranje komentara (create-comment.php)
    //ovde proveravamo podatke koji su uneti u formu. Ako sva polja nisu popunjena bacice gresku i iskocice prozor upozorenja, u suprotnom ce ispisati komentar

function commentForm() {//funkcija koja se pokrece na klik 'Submit'
    var author = document.forms['firstFrom']['formName'].value;//kad se unese komentar, u var author se dovlaci iz baze podataka ime autora komentara
                                                                    //preko imena forme(<form> tag->name="firstForm") 
                                                                    //i preko inputa gde se upisuje ime (<input> tag->name="formName")
    var comment = document.forms['firstFrom']['comment'].value;//u var comment se dovlaci komentar iz baze podataka
                                                                    //preko imena forme(<form> tag->name="firstForm") 
                                                                    //i preko imena polja gde se unosi tekst (<textarea name="comment">)
    if (author == '' || comment == '') { //ako je autor prazno polje ili ako je komentar prazno polje
        alert('Both fields are required!!!');//vrati iskacuci prozor na kom ce pisati da su upiti odbijeni
        return false;//i nece se ispisivati komentar koji je prazan
    }

    return true;//u suprotnom vrati komentar i autora
}





//BUTTON SHOW/HIDDEN na single-post.php stranici
var btn = document.querySelector("#myBtn");//dovukla sam <button> u varijablu btn
//console.log(btn);
var comm = document.querySelector("#allComments");//dovukla sam listu komentara

btn.addEventListener('click', function(){
//alert('asd');
    btn.innerText = 'Show comments';

    if(comm.style.display === 'none'){
        comm.style.display = 'block';
        btn.innerText = 'Hide comments';
        comm.classList.add('hidden');//dodavanje klase na komentare(<ul>) kad su komentari sakriveni

    } else {
        comm.style.display = 'none';
        comm.classList.remove('hidden');//brisanje klase sa komentara(<ul>) kad su komentari prikazani
    }
});




//funkcija za odbijanje praznih polja kod kreiranja posta
function createPostRequire() {
    var author = document.forms['newPost']['author'].value;
    var title = document.forms['newPost']['title'].value;
    var bodyText = document.forms['newPost']['bodyText'].value;

    if(author == '' || title == '' || bodyText == '') {
        alert('Fields are required');
        return false;
    }
    return true;
}