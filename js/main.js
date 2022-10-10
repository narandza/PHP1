// $(document).ready(()=>{

// })
    


// function sendEmail(){
//     var firstName, lastName, email, username, password, cpassword;
//     firstName = $("#firstNameReg");
//     lastName = $("#lastNameReg");
//     email = $("#emailReg");
//     username = $("#usernameReg");
//     password = $("#passwordReg");
//     cpassword = $("#cpasswordReg");
//     var errors = 0;
//     var respone = $("#responeReg");
    

//     //validacija
//     if(firstName.val()== ""){
//         errors++;
//         respone.html("All fields must be filed out.")
//         respone.addClass('alert-danger');  
//     }
//     else{
//         if(firstName.val().length>50){
//             errors++;
//             respone.html("first name too long");
//             respone.addClass('alert-danger');
//         }
//         else{  
//         respone.html("")
//         respone.removeClass('alert-danger');
//         }
//     }

//     if(lastName.val()== ""){
//         errors++;
//         respone.html("All fields must be filed out.")
//         respone.addClass('alert-danger');  
//     }
//     else{
//         if(lastName.val().length>50){
//             errors++;
//             respone.html("Last name too long");
//             respone.addClass('alert-danger');
//         }
//         else{  
//         respone.html("")
//         respone.removeClass('alert-danger');
//         }
//     }

//     if(email.val()== ""){
//         errors++;
//         respone.html("All fields must be filed out.")
//         respone.addClass('alert-danger');  
//     }
//     else{
//         if(email.val().length>100){
//             errors++;
//             respone.html("Email name too long(max.100)");
//             respone.addClass('alert-danger');
//         }
//         else{  
//         respone.html("")
//         respone.removeClass('alert-danger');
//         }
//     }

//     if(username.val()== ""){
//         errors++;
//         respone.html("All fields must be filed out.")
//         respone.addClass('alert-danger');  
//     }
//     else{
//         if(username.val().length>20){
//             errors++;
//             respone.html("Username too long(max 20)");
//             respone.addClass('alert-danger');
//         }
//         else{  
//         respone.html("")
//         respone.removeClass('alert-danger');
//         }
//     }
//     if(password.val()== ""){
//         errors++;
//         respone.html("All fields must be filed out.")
//         respone.addClass('alert-danger');  
//     }
//     else{
//         if(password.val().length>20&&password.val()<8){
//             errors++;
//             respone.html("password must be bettwen 8 and 20 charaters");
//             respone.addClass('alert-danger');
//         }
//         else{  
//         respone.html("")
//         respone.removeClass('alert-danger');
//         }
//     }
//     if(cpassword.val()== ""){
//         errors++;
//         respone.html("All fields must be filed out.")
//         respone.addClass('alert-danger');  
//     }
//     else{
//         respone.html("")
//         respone.removeClass('alert-danger');
//     }

    
//     if(!testName(firstName.val())||!testName(lastName.val())){
//         errors++;
//         respone.html("Invalid name");
//         respone.addClass('alert-danger');
//     }
//     else{
//         respone.html("")
//         respone.removeClass('alert-danger');
//     }

//     if(!testEmail(email.val())){
//         errors++;
//         respone.html("Invalid email");
//         respone.addClass('alert-danger');
//     }
//     else{
//         respone.html("")
//         respone.removeClass('alert-danger');
//     }


//     if(!testUsername(username.val())){
//         errors++;
//         respone.html("Invalid username");
//         respone.addClass('alert-danger');
//     }
//     else{
//         respone.html("")
//         respone.removeClass('alert-danger');
//     }

//     if(!testPassword(password.val())){
//         errors++;
//         respone.html("Invalid password - must be at least 8 charaters with at leasr one lowercase letter, uppercase letter and a number(maxl ength 20)");
//         respone.addClass('alert-danger');
//     }
//     else{
//         respone.html("")
//         respone.removeClass('alert-danger');
//     }

//     if(password.val()!=cpassword.val()){
//         errors++;
//         respone.html("Passwords dont match");
//         respone.addClass('alert-danger');
//     }
//     else{
//         respone.html("")
//         respone.removeClass('alert-danger');
//     }
//     //ajaxx
//     var dataForAjax = {
//         firstName: firstName,
//         lastName: lastName,
//         username: username,
//         email: email,
//         password: password,
//         cpassword : cpassword
//     }
//     ajaxSendData("/models/registration-model.php",dataForAjax,function(result){
//         console.log(result)
//     })
// }


// function testName(name){
//     re = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/
//     return re.test(name);
// }

// function testEmail(email){
//     re  = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g
//     return re.test(email)
// }
// function testUsername(username){
//     re  = /^[a-z0-9_-]{3,20}$/igm
//     return re.test(username)
// }

// function testPassword(pass){
//     re = /(?=^.{8,20}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/
//     return re.test(pass);
// }



// //ajax callback
// function ajaxSendData(url,data,result){
//     $.ajax({
//         url: url,
//         method: "post",
//         dataType : "json",
//         data: data,
//         success: result,
//         error: (xhr)=>{console.log(xhr)}
//     })
// }