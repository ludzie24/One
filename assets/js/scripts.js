document.getElementById("get-info").addEventListener("click", myFunction);
function myFunction(){

};
$("#get-info").on("click",function(e){
    let name = $("#name-get").val();
    let surname = $("#surname-get").val();
    let nick = $("#nick-get").val();
    let password = $("#password-get").val();
    let number = $("#number-get").val();
    let email = $("#email-get").val();
    let statusName;
    let statusSurname;
    let statusNick;
    let statusPassword;
    let statusNumber;
    let statusEmail;
    var emailCharacters = ["@","."];
    var illegalCharacters = /[<->]/g;
    function checkIllegalCharacters(word,table){
            if (word.match(table)){
                return  false;
            }else{
                return  true;
            };           
    };
    function checkAllowedCharacters(word,table){
        let result;
            if ((word.indexOf(table[0]) >= 0) && (word.indexOf(table[1]) >= 0)){
                result = true;
            }else{
                result = false;
            };           
        return result;     
    };
    function alphanumeric(inputtxt)
    {
        var letterNumber = /^[0-9a-zA-Z]+$/;
        if((inputtxt.match(letterNumber)) )
        {
            return true;
        }
        else
        { 
            return false; 
        };
    };
    function checkOnlyNumbers(inputNumber)
    {
        var number = /^[0-9]+$/;
        if((inputNumber.match(number)) )
        {
            return true;
        }
        else
        { 
            return false; 
        };
    };
    function checkName(name)
    {
        let statusLenght;
        if((name.length < 3) || name.length > 20){
            statusLenght= false;
        }else{
            statusLenght = true;          
        }
        let statuscontents = alphanumeric(name);
        if(statusLenght == true && statuscontents == true){
            return true;
        }else{
            return false;
        };
    };
    function checkEmail(email)
    {
        let statusLenght;
        let statusIllegalCharacters;
        let statusAllowedCharacters;
        if((email.length < 3) || email.length > 30){
            statusLenght= false;
        }else{
            statusLenght = true;          
        }     
        statusIllegalCharacters=checkIllegalCharacters(email,illegalCharacters)
        statusAllowedCharacters = checkAllowedCharacters(email,emailCharacters);
        if(statusLenght == true && statusIllegalCharacters == true && statusAllowedCharacters == true){
            return true;
        }else{
            return false;
        };
    };
    function checkPassword(inputPassword){
        let bigLetter = /[A-Z]/g;
        let smallLetter = /[a-z]/g;
        let number = /[0-9]/g;
        let statusLenght;
        let statusBigLetter;
        let statusSmallLetter;
        let statusNumber;
        let statusIllegalCharacters;
        if((inputPassword.length < 6) || inputPassword.length > 10){
            statusLenght= false;
        }else{
            statusLenght = true;          
        }
        if(inputPassword.match(bigLetter))
        {
            statusBigLetter = true;
        }
        else
        { 
            statusBigLetter = false; 
        };
        if(inputPassword.match(smallLetter))
        {
            statusSmallLetter = true;
        }
        else
        { 
            statusSmallLetter = false; 
        };
        if(inputPassword.match(number))
        {
            statusNumber = true;
        }
        else
        {
            statusNumber = false; 
        };
        statusIllegalCharacters = checkIllegalCharacters(inputPassword,illegalCharacters);
        console.log(statusIllegalCharacters);
        if (statusLenght == true && statusBigLetter == true && statusSmallLetter == true && statusNumber == true && statusIllegalCharacters ==true){
            return true;
        }else{
            return false;
        };
    };
    statusName = checkName(name);
    statusSurname = checkName(surname);
    statusNick = checkName(nick);
    statusPassword = checkPassword(password);
    statusNumber = checkOnlyNumbers(number);
    statusEmail = checkEmail(email);
    displayError(statusName,"alert-name");
    displayError(statusSurname,"alert-surname")
    displayError(statusNick,"alert-nick")
    displayError(statusPassword,"alert-password")
    displayError(statusNumber,"alert-number")
    displayError(statusEmail,"alert-email")
    function displayError(status,id){
        let htmlid = "#"+id;
        if(status == false){
            $(htmlid).css("display", "inline");
            event.preventDefault();
        }else{
            $(htmlid).css("display", "none");
        };
    };
});