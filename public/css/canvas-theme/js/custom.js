// Start of notifications!!! //

var time_popup_existense;
var now;

function checkPopupTimeExistense() {
    now = (new Date()).getTime();
    if ((now-time_popup_existense) > 10 * 1000) {
        jQuery('.popup_body').css('display', 'none');
    }
}

function getNotification(){
        if (window.location.pathname == '/messages') {
            return false;
        }
        if (!AuthUser) {
            return false;
        }
        jQuery.ajax({
            url: getnotification,
            type: 'get',
            data: {
            '_token': "{{ csrf_token() }}",
            },
            success: function(data) {
                if (data == 'false') {
                    return false;
                }
                else {
                    var count_user_names = 0;
                    var user_id = data['user_names'];
                    var company = data['company_name'];                   
                    if (user_id) {
                        time_popup_existense = (new Date()).getTime();
                        if (user_id.length > 1) {                            
                            jQuery('.messages_from_user_text').text(youhavenewmessages);
                        }
                        else if (user_id.length == 1) {                            
                            jQuery('.popup_body').css('display', 'block');
                            if (company) {
                                /*jQuery('.popup_body').css('height', '90px');*/
                                jQuery('.popup_body').css('display', 'block');
                                jQuery('.messages_from_user_text').text(youhavenewmessage + user_id[0] + ', ' + company);
                            }
                            else {
                                /*jQuery('.popup_body').css('height', '80px');*/
                                jQuery('.popup_body').css('display', 'block');
                                jQuery('.messages_from_user_text').text(youhavenewmessage + user_id[0]);
                            }
                        }
                    }                        
                }                             
            }
        });
    }
    jQuery(document).ready(function() {
        var timer_for_popup = setInterval(function() {
            checkPopupTimeExistense();
        }, 10 * 1000);
        var timerID = setInterval(function() {
            getNotification();
        }, 30 * 1000);
    });
    jQuery( ".popup_body" ).click(function() {
      jQuery('.popup_body').css('display', 'none');
    });   

// Start of notifications!!! //