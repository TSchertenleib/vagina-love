// --------------------------------------------
// bestellen    
// --------------------------------------------

var path;
// Button Click
$('.reg-btn').on('click', function(event) {
    var $this = $(this).parent().parent(); // im Form
    
    var info_date = $this.find('.info-date').text();
    
    var info_mail = $this.find('.info-mail').val();
    
    
    
    
    // $($this).find("input, select").each(function  () {
    //   if(!$(this)[0].checkValidity()){
    //     valid = false;
    //   }
    // }); 

    if( $($this)[0].checkValidity() ){
      // true 
      bestellen(info_date, info_mail);
      console.log('sent data to php: ' + info_mail+","+info_date+"\n");
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
                  date  : date,
                  mail  : mail,
              },
          success: function(resp){
            console.log(resp);
          },
          error: function(resp){
            console.log(resp.responseText);
          }
      });  
}