// --------------------------------------------
// bestellen    
// --------------------------------------------

var path;
// Button Click
$('.reg-btn').on('click', function(event) {
    var $this = $(this).parent().parent(); // im Form
    var info_date = $this.find('.info-date').text();
    var info_mail = $this.find('.info-mail').val();
    
    console.log('Registration!');
    console.log('date: ' + info_date );
    console.log('mail: ' + info_mail );
      
    if( $($this)[0].checkValidity() ){
      // true 
      console.log('Email OK --S senden');
      bestellen(info_date, info_mail);
    } else {
      // false = keine mail adresse
      console.log('Email error');
    }

});

function bestellen(date, mail) {
    $.ajax({   
          url: 'php/send.php',   
          type: 'POST',
          data: {
                  mail  : date,
                  date  : mail,
              },
          success: function(resp){
            console.log(resp);
          },
          error: function(resp){
            console.log(resp.responseText);
          }
      });  
}