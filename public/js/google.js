$('#googleLogin').click(function(){

    firebase.auth()
      .signInWithPopup(googleProvider)
      .then((result) => {



        var user = result.user;
        const regex = /@ua\.edu\.ph/;
        if(regex.test(user.email)) {

          /** @type {firebase.auth.OAuthCredential} */
          var credential = result.credential;
      
          // This gives you a Google Access Token. You can use it to access the Google API.
          var token = credential.accessToken;
          // The signed-in user info.

          $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
            url : URL + "/google/login",
            type : "post",
            dataType : "json",
            data : user.providerData[0],
            success : function(data){
      
              if(data.status == "success"){
                alert("Sucessfully logged");
                window.location.replace(URL + "/dashboard");
              }else{
                alert("Something went wrong here");
              }
      
            },
            error : function (error){
              console.log(error);
            }
          })
          
        }else {
          alert('email must be @ua.edu.ph');
        }
      // ...
    }).catch((error) => {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      console.log(error)
      // ...
    });
  
  })