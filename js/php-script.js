// --------------------------------------------
// bestellen    
// --------------------------------------------

var path;
// Button Click
$('.reg-btn').on('click', function(event) {
    var $this = $(this).parent().parent(); // im Form
    var info_date = $this.find('.info-date').text();
    var info_mail = $this.find('.info-mail').val();
    var info_name = $this.find('.info-name').val();
    

    if( $($this)[0].checkValidity() ){
      // true 
      bestellen(info_date, info_mail, info_name);
       console.log('sent data to php: ' + info_mail+","+info_date+","+info_name+"\n");
    } else {
      console.log('Email error');
    }
});


function bestellen(date, mail, vname) {
    $.ajax({   
          url: 'php/send.php',   
          type: 'POST',
          data: {
                  date  : date,
                  mail  : mail,
                  vname  : vname,
              },
          success: function(resp){
            //console.log(resp);
            console.log('success');
          },
          error: function(resp){
            //console.log(resp.responseText);
            console.log('erorr');
          }
      });  
}