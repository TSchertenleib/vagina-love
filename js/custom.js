// --------------------------------------------
// bestellen    
// --------------------------------------------



// information: .info-date
// send request btn: .reg-btn


var path;
// Button Click
$('.reg-btn').on('click', function(event) {
    path =  $(this).parent().parent(); // form-tag


    var valid = true;

$(path).find("input, select").each(function  () {
        if(!$(this)[0].checkValidity()){
            valid = false;
        }
});
    if(valid){
        bestellen();
        // $('.js-bestellung-erfolgt').addClass('is-visible');
    }
});


function bestellen() {

    $.ajax({   
          url: 'php/send.php',   
          type: 'POST',
          data: {
                    mail            : $(path).find('.info-date').val(),
                    date            : $(path).find('.info-mail').val(),
              },
          success: function(resp){
            console.log(resp);
    
          },
          error: function(resp){
            console.log(resp.responseText);
          }
      });  
}