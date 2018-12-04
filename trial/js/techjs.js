
function validateProduct(){
	
	resetProduct();
}

function resetProduct(){
	document.getElementById("productForm").reset();
}


/**
New Javascript validation
*/
     //Decalring variables
     //var name = document.forms["myForm"]["name"];
     var email = document.forms["myForm"]["email"];
     var password = document.forms["myForm"]["password"];
     var country = document.forms["myForm"]["country"];
     var city = document.forms["myForm"]["city"];
      var contact = document.forms["myForm"]["contact"];
     var image = document.forms["myForm"]["customerImg"];
     var address = document.forms["myForm"]["address"];
     // var atpos = email.indexOf("@");
     // var dotpos = email.lastIndexOf(".");
      
      function validate()
      {
      var name = document.forms["myForm"]["name"];
      	//Checking if the name is empty
         if( name.value == "" )
         {
            document.getElementById('name_error').innerHTML = "Full Name needed";
            name.style.border="2px solid red";
            name.focus() ;
            return false;
         }
        
         //Checking if the email is empty
         if(email.value == "" )
         {
            document.getElementById('email_error').innerHTML = "Email needed";
            email.style.border="2px solid red";
            return false;
         }
         // if (atpos < 1 || ( dotpos - atpos < 2 )) 
         if ((email.indexOf("@") != 1) && (email.indexOf(".") != 2)) {
         {
            document.getElementById('email_error').innerHTML = "Wrong email format";
            email.style.border="2px solid red";
            email.focus() ;
            return false;
         }
         //Checking the password is empty
         if( password.value == "")
         {
           document.getElementById('password_error').innerHTML = "Password needed";
           password.style.border="2px solid red";
            password.focus() ;
            return false;
         }
         //Checking if the country is empty
         if(country.value =="")
         {
           document.getElementById('country_error').innerHTML = "Country Needed";
           country.style.border="2px solid red";
            country.focus() ;
            return false;
         }
// city
         if( city.value=="")
         {
            document.getElementById('city_error').innerHTML = "City Needed";
            city.style.border="2px solid red";
            city.focus() ;
            return false;
         }
         
         if( contact.value =="")
         {
            document.getElementById('contact_error').innerHTML = "Contact details Needed";
            contact.style.border="2px solid red";
            contact.focus();
            return false;
         }
        if( image.value =="")
         {
            document.getElementById('image_error').innerHTML = "Image Needed";
            image.style.border="2px solid red";
            image.focus();
            return false;
         }
         if( address.value =="")
          {
             document.getElementById('address_error').innerHTML = "address Needed";
             address.style.border="2px solid red";
             address.focus();
             return false;
          }
         
         return true;
         
      }

}



function validateLogin(){
	//alert("Success!");
    return true;
}