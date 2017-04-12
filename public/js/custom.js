$(function(){
   function checkele($elename){
       return $('body').find($elename).length;
   }

   var captain = checkele('#captain');
   if(captain > 0){
       $('.submit_form').on('click', function(){
          if($('#captain').hasClass('active')){
              var val = $('#details').find('.no_travel').val();
              var date = $('#details').find('.start_date').val();
              var itinerary = $('#details').find('.itinerary').val();


              var html = '';
              var defaultHtml = '<h4 class="info-text">Please fill personal details as per your passport details </h4>' +

                                  '<input type="hidden" class="form-control" name="number" id="number" value="" > ' +
                                  '<input type="hidden" class="form-control" name="date" id="date" value=""> ' +
                                  '<input type="hidden" class="form-control" name="itinerary" id="itinerary" value=""> '
                                ;


              for(var i = 1; i<= val; i++){

                  html += '<div class = "customize-box alert alert-info">' +
                      '<p>Personal Information Traveler<b>'+" "+i+'</b></p>'+
                      '</div> ' +
                      '<div class="row"> ' +
                      '<div class="col-md-3"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Title</label> ' +
                      '<select class="form-control" name="title'+i+'" id="title'+i+'">' +
                      '<option>Mr.</option> ' +
                      '<option>Ms.</option> ' +
                      '<option>Mrs.</option> ' +
                      '<option>Dr.</option> ' +
                      '<option>Er.</option> ' +
                      '<option>Prof.</option> ' +
                      '</select> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-3"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">First Name</label> ' +
                      '<input type="text" class="form-control" name="first_name'+i+'"   id="first_name'+i+'"  > ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-3"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Middle Name</label> ' +
                      '<input type="text" class="form-control" name="middle_name'+i+'" id="middle_name'+i+'" "> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-3"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Last Name</label> ' +
                      '<input type="text" class="form-control" name="last_name'+i+'" id="last_name'+i+'" > ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="row"> ' +
                      '<div class="col-md-4"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label>Nationality</label> ' +
                      '<select class="form-control" name="nationality'+i+'" id="nationality'+i+'"> ' +
                      '<option value="">Country...</option> ' +
                      '<option value="Afganistan">Afghanistan</option> ' +
                      '<option value="Albania">Albania</option> ' +
                      '<option value="Algeria">Algeria</option> <option value="Botswana">Botswana</option> ' +
                      '<option value="Brazil">Brazil</option> ' +
                      '<option value="British Indian Ocean Ter">British Indian Ocean Ter</option> ' +
                      '<option value="Brunei">Brunei</option> ' +
                      '<option value="Bulgaria">Bulgaria</option> ' +
                      '<option value="Burkina Faso">Burkina Faso</option> ' +
                      '</select> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-4"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label>State</label> ' +
                      '<select class="form-control" name="state'+i+'" id="state'+i+'"> ' +
                      '<option>New York</option> ' +
                      '</select> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-4"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label>Date of Birth</label> ' +
                      '<input type="date" class="form-control" name="date_of_birth'+i+'" id="date_of_birth'+i+'" > ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="row"> ' +
                      '<div class="col-md-3"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Email</label> ' +
                      '<input type="text" class="form-control" name="email'+i+'" id="email'+i+'" > ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-3"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Mobile</label> ' +
                      '<input type="text" class="form-control" name="mobile'+i+'" id="mobile'+i+'" > ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-3"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Landline</label> ' +
                      '<input type="text" class="form-control" name="landline'+i+'" id="landline'+i+'"> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-3"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Occupation</label> ' +
                      '<input type="text" class="form-control" name="occupation'+i+'" id="occupation'+i+'" > ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="row"> ' +
                      '<div class="col-md-12"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label>Detailed Mailing Address</label> ' +
                      '<textarea row=20 class="form-control" name="mailing_address'+i+'" id="mailing_address'+i+'"></textarea> ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="row"> ' +
                      '<div class="col-md-6"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Passport No</label> ' +
                      '<input type="text" class="form-control" name="passport_no'+i+'" id="passport_no'+i+'"> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-6"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label class="control-label">Place of Issue</label> ' +
                      '<input type="text" class="form-control" name="place_of_issue'+i+'" id="place_of_issue'+i+'" >' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="row"> ' +
                      '<div class="col-md-6"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label>Issue Date</label> ' +
                      '<input type="date" class="form-control" name="issue_date'+i+'" id="issue_date'+i+'" > ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="col-md-6"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label>Expiration Date</label> ' +
                      '<input type="date" class="form-control" name="expiration_date'+i+'" id="expiration_date'+i+'"> ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '<div class="row"> ' +
                      '<div class="col-md-12"> ' +
                      '<div class="form-group label-floating"> ' +
                      '<label>Emergency Contact</label> ' +
                      '<textarea row=20 class="form-control" name="emergency_contact'+i+'" id="emergency_contact'+i+'"></textarea> ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> ' +
                      '</div> '
                     ;
              }

              $('#captain').html(defaultHtml).append(html);

              document.getElementById('number').value=val;
              document.getElementById('date').value=date;
              document.getElementById('itinerary').value=itinerary;
          }
       });
   }
});