var js_lang = {};

function enc (data) {
    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
        ac = 0,
        enc = "",
        tmp_arr = [];
 
    if (!data) {
        return data;
    }
 
 
    do { // pack three octets into four hexets
        o1 = data.charCodeAt(i++);
        o2 = data.charCodeAt(i++);
        o3 = data.charCodeAt(i++);
 
        bits = o1 << 16 | o2 << 8 | o3;
 
        h1 = bits >> 18 & 0x3f;
        h2 = bits >> 12 & 0x3f;
        h3 = bits >> 6 & 0x3f;
        h4 = bits & 0x3f;
 
        // use hexets to index into b64, and append result to encoded string
        tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
    } while (i < data.length);
 
    enc = tmp_arr.join('');
    
    var r = data.length % 3;
    
    return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
}

function dec (data) {
    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
        ac = 0,
        dec = "",
        tmp_arr = [];
 
    if (!data) {
        return data;
    }
 
    data += '';
 
    do { // unpack four hexets into three octets using index points in b64
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));
 
        bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;
 
        o1 = bits >> 16 & 0xff;
        o2 = bits >> 8 & 0xff;
        o3 = bits & 0xff;
 
        if (h3 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1);
        } else if (h4 == 64) {
            tmp_arr[ac++] = String.fromCharCode(o1, o2);
        } else {
            tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
        }
    } while (i < data.length);
 
    dec = tmp_arr.join('');
 
    return dec;
}

function doReportEpisode(id){
  if (id){
        var problem = $('#problem').val();
        if (problem){
            $('#reportcontent').html("<center>" + js_lang.please_wait + "</center>");
            $.get(baseurl+"/ajax/reportepisode.php",{   
                    episode: id,
                    problem: problem
                }, function(resp) {
                    $('#reportcontent').html("<center><br /><br />" + js_lang.report_thanks + "<br /><br /></center>");
                }
            ); 
        }
  }
}

function reportEpisode(){
    $('object').hide();
    $('iframe').hide();
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    var scrollpos = $(window).scrollTop();
    
    var popupHeight = $("#modal").height();
    var popupWidth = $("#modal").width();
    
    
    $("#modal").css({
        "position": "fixed",
        "top": ((windowHeight/2)-(popupHeight/2)),
        "left": (windowWidth/2)-(popupWidth/2)
    });

    $("#backgroundPopup").css({    "height": windowHeight});
    $("#backgroundPopup").css({"opacity": "0.7"});
    $('#backgroundPopup').show();
    $('#modal').show();
}

function popUp(selector){
    $('object').hide();
    $('iframe').hide();
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    var scrollpos = $(window).scrollTop();
    
    var popupHeight = $(selector).height();
    var popupWidth = $(selector).width();
    
    
    $(selector).css({
        "position": "fixed",
        "top": ((windowHeight/2)-(popupHeight/2)),
        "left": (windowWidth/2)-(popupWidth/2)
    });

    $("#backgroundPopup").css({    "height": windowHeight});
    $("#backgroundPopup").css({"opacity": "0.7"});
    $("#backgroundPopup").click(function(){
        $('#backgroundPopup').hide(); 
        $(selector).fadeOut('fast'); 
        $('object').show(); 
        $('iframe').show();
    });
    
    $('#backgroundPopup').show();
    $(selector).show();
}


function doReportMovie(id){
    if (id){
        var problem = $('#problem').val();
        if (problem){
            $('#reportcontent').html("<center>Please wait...</center>");
            $.get(baseurl+"/ajax/reportmovie.php",{   
                    movie: id,
                    problem: problem
                }, function(resp) {
                    $('#reportcontent').html("<center><br /><br />Köszönjük a bejelentést. A problémát javitjuk, amint módunk lesz rá<br /><br /></center>");
                }
            ); 
        }
    }
}

function reportMovie(){
    $('object').hide();
    $('iframe').hide();
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    var scrollpos = $(window).scrollTop();
    
    var popupHeight = $("#modal").height();
    var popupWidth = $("#modal").width();
    
    
    $("#modal").css({
        "position": "fixed",
        "top": ((windowHeight/2)-(popupHeight/2)),
        "left": (windowWidth/2)-(popupWidth/2)
    });

    $("#backgroundPopup").css({    "height": windowHeight});
    $("#backgroundPopup").css({"opacity": "0.7"});
    $('#backgroundPopup').show();
    $('#modal').show();
}

var showTimer = null;
var showCounter = 20;

function closeFakeEmbed(embedid){
    $('#fake_embed'+embedid).hide();
    $('#real_embed'+embedid).show();
}

function getEmbed(embedid){
    if (embeds[embedid].indexOf("rapidplayer")==-1 && iframe_ad){
        var html_content =     "<div class='fake_embed' id='fake_embed"+embedid+"' onclick='closeFakeEmbed("+embedid+");'>" +
                                "<br /><br />" +
                                "<div class='fake_embed_ad_close'><a href='javascript:void(0);' onclick='closeFakeEmbed("+embedid+");'>Close Ad</a></div>" +
                                "<div class='fake_embed_ad' id='fake_embed_ad" + embedid +"'>" + 
                                    "<iframe src='"+baseurl+"/iframe_ad.php' width='300' height='300' frameborder='NO' border='0'></iframe>" +
                                "</div>" + 
                                "<div class='fake_embed_bar'><span class='fake_embed_bar_right'></span></div>" +
                            "</div>" +
                            "<div id='real_embed"+embedid+"' style='display:none'>"+embeds[embedid]+"</div>";
        
        
        $('#videoBox'+embedid).html(html_content);
        $('#videoBox'+embedid).show();
    } else {
        $('#videoBox'+embedid).html(embeds[embedid]);
        $('#videoBox'+embedid).show();
    }    
    
}

function countDown(embedid){
    showCounter = showCounter-1;
    $('span#counter').html(showCounter);
    if (showCounter>0){
        showTimer = setTimeout('countDown('+embedid+');',1000);
    } else {
        showTimer = null;
        showCounter = 20;
        getEmbed(embedid);
    }
}

function changeEmbed(embedid, counter){
    if (counter == 0){
        $('.embedcontainer').html('');
        $('.embedcontainer').hide();
        getEmbed(embedid);
    } else {
        if (showTimer){
            clearTimeout(showTimer);
        }
        showTimer = null;
        showCounter = counter;
        
        $('.embedcontainer').html('');
        $('.embedcontainer').hide();
        $('#videoBox'+embedid).html(js_lang.ticker);
        $('#videoBox'+embedid+' span#counter').html(showCounter);
        $('#videoBox'+embedid).slideDown("slow");
        
        showTimer = setTimeout('countDown('+embedid+');',1000);
    }
    /*
    $('li.selected').removeClass('selected');
    $('#selector'+embedid).addClass('selected');
    */
}

function addWatch(id,type){
    $('#watch_button_'+id).css({"fontWeight":"bold", "color":"#00aa00"}).hide().fadeIn("fast");
    $.post(baseurl+"/ajax/watch.php",{
        watch_id: id,
        watch_type: type
    },function(resp){
        var target = $('#seen'+id);
        if (target.size()){
            target.html('<a class="seen right" href="javascript:void(0);"></a>');
        }
    });
}

function addLike(id,type,vote){
    $('#like_id').val(id);
    $('#like_type').val(type);
    $('#like_vote').val(vote);
    $('#like_comment').val('');
    if (vote==-1){
        $('#nem').html(' nem ');
        $('#like_button').text(js_lang.dislike);
    } else {
        $('#nem').html('');
        $('#like_button').text(js_lang.like);
    }
    popUp("#like_form");
}

function doLike(){
    var like_id = $('#like_id').val();
    var like_type = $('#like_type').val();
    var like_comment = $('#like_comment').val();
    var like_vote = $('#like_vote').val();
    
    $('#like_button').text('Pillanat...');
    $.post(baseurl+"/ajax/like.php",{
            like_id: like_id,
            like_type: like_type,
            like_comment: like_comment,
            vote: like_vote
        }, function(resp){
            $('#like_button').text('Tetszik');
            $('#backgroundPopup').hide(); $('#like_form').fadeOut('fast'); $('object').show(); $('iframe').show();
            if ($('#stream')){
                streamPoll(0);
            }
        }
    );
}

function facebookDoLogin(button_selector){
    
    if (typeof FB != 'undefined'){
        $(button_selector).attr("src",baseurl+"/templates/svarog/images/fb_login_loading.jpg");
        FB.getLoginStatus(function(response){
            console.log(response);
            if (response.status=='connected'){
                
                FB.api({ method: 'fql.query', query: 'SELECT offline_access,email,user_likes,publish_actions FROM permissions WHERE uid=me()' }, function(resp) {
                    var has_all_perms = true;
                    for(var key in resp[0]) {
                        if (resp[0][key] === "0"){
                            has_all_perms = false;
                        }
                    }
                    
                    if (has_all_perms){
                        facebookLogin();
                    } else {
                        FB.login(facebookLogin, {scope: 'offline_access,email,user_likes,publish_actions'});
                    }
                });

            } else {
                FB.login(facebookLogin, {scope: 'offline_access,email,user_likes,publish_actions'});
            }
        });
    }
    return false;
}

function facebookLogin(){
    FB.getLoginStatus(function(response){
        if (response.status=='connected'){
            
            $.post(baseurl+"/ajax/facebook_login.php",{   
                    access_token: response.authResponse.accessToken,
                    expires: response.authResponse.expires,    
                    sig: response.authResponse.signedRequest,
                    uid: response.authResponse.userID
                }, function(resp) {   
                    resp = eval('('+resp+')');
                    
                    if (parseInt(resp.status)==0){
                        alert(js_lang.unexpected_facebook_error);
                    } else if (parseInt(resp.status)==1){
                        window.location = window.location;
                    } else if (parseInt(resp.status)==2){
                        window.location = baseurl+"/register";
                    } else {
                        alert(js_lang.unexpected_facebook_error);
                    }
                }
            );
        } else {
            $('#fb_login_button').attr("src",baseurl+"/templates/svarog/images/fb_login.jpg");
        }
    }); 
}

$(document).ready(function(){
    if ($.browser.msie && $.browser.version.substr(0,1)<7) {
      $('.tt').mouseover(function(){
            $(this).children('span').show();
          }).mouseout(function(){
            $(this).children('span').hide();
          })
    }
});

var stream_loop = true;
var stream_timer = null;

function streamPoll(max_id, target_id, loop, loader){
    
    if (!loop){
        stream_loop = false;
        if (stream_timer){
            clearTimeout(stream_timer);
        }        
    }
    
    if (!target_id){
        target_id = 'stream';
    }
    
    if (max_id == 0 && loader){
        $('#'+target_id).html("<center><br /><br /><img src='"+baseurl+"/templates/svarog/images/loader_big.gif' /></center>");
    }
    $.post(baseurl+"/ajax/stream.php",{
            max_id : max_id,
            type: 1
        }, function(resp){
            $('#'+target_id).html(resp);
            $('.tooltip').tipsy({title: function() { return this.getAttribute('original-title').toUpperCase(); } });
            if (stream_loop){
                stream_timer = setTimeout(function(){ 
                    streamPoll(0, false, true, false); 
                }, 30000);
            }
        }
    );
}

function userStream(user_id, max_id, target_id){
    
    if (!target_id){
        target_id = 'user_stream';
    }
    
    if (!max_id || max_id == 0){
        $('#'+target_id).html("<center><img src='"+baseurl+"/templates/svarog/images/loader_big.gif' /></center>");
        max_id = 0;
    }    
    
    $.post(baseurl+"/ajax/stream.php",{
            max_id : max_id,
            user_id : user_id,
            type: 2
        }, function(resp){
            //resp = eval('('+resp+')');
            $('#'+target_id).html(resp);
            $('.tooltip').tipsy({title: function() { return this.getAttribute('original-title').toUpperCase(); } });
        }
    );
}

function friendStream(user_id, max_id, target_id){

    if (!target_id){
        target_id = 'friend_stream';
    }
    
    if (!max_id || max_id == 0){
        $('#'+target_id).html("<center><img src='"+baseurl+"/templates/svarog/images/loader_big.gif' /></center>");
        max_id = 0;
    }    
    
    
    $.post(baseurl+"/ajax/stream.php",{
            max_id : max_id,
            user_id : user_id,
            friends: 1,
            type: 3
        }, function(resp){
            //resp = eval('('+resp+')');
            $('#'+target_id).html(resp);
            $('.tooltip').tipsy({title: function() { return this.getAttribute('original-title').toUpperCase(); } });
        }
    );
}

function follow(user_id){
    $('#follow_button').hide();
    $('#unfollow_button').show();
    $.post(baseurl+"/ajax/follow.php",{
            user_id: user_id,
            follow: 1
        }, function(resp){

        }
    );
}

function unfollow(user_id){
    $('#unfollow_button').hide();
    $('#follow_button').show();
    $.post(baseurl+"/ajax/follow.php",{
            user_id: user_id,
            follow: 0
        }, function(resp){

        }
    );
}


function streamPublish(name, message, description, hrefTitle, hrefLink, userPrompt, imageSrc, imageUrl){
    FB.ui({
        method: 'stream.publish',
        message: message,
        attachment: {
        media: [{type: 'image',src: imageSrc,href: imageUrl}], 
        name: name,
        caption: '',
        description: (description),
        href: hrefLink
    },
        action_links: [{ text: hrefTitle, href: hrefLink }],
        user_prompt_message: userPrompt
    },
    function(response) {
     // do something when you have posted
    });
}

function setCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    } else {
        var expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
}


function getCookie(name){
    var i,x,y,cooks=document.cookie.split(";"),cookie_found=false,rand,value;
    for(i=0;i<cooks.length;i++){
        x=cooks[i].substr(0,cooks[i].indexOf("="));
        y=cooks[i].substr(cooks[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==name){
            return y;
        }
    }

    return false;    
}

function hidePromoBar(){
    setCookie("nobar","1",365)
    $('.bottom-bar').fadeOut("slow");
}

var last_note_id = getCookie("last_note_id") || 0;

function pollNotification(){
    $.get(baseurl+"/ajax/notification.php",{
            
        }, function(resp){
            if (resp){
                try{
                    resp = eval('('+resp+')');
                    if (resp.id>last_note_id){
                        notifyPopup = $('#tips');
                        notifyPopup.setPopup();
                        notifyPopup.callPopup('    <div id="NotificationBox" class="notification">'+
                                                    '<div class="notification-image"><img src="' + resp.image +'" /></div>'+ 
                                                    '<div class="notification-text">' + resp.text + '</div>'+
                                                '</div>');
                        last_note_id = resp.id;
                        setCookie("last_note_id",resp.id,365);
                    }
                } catch(e){
                    
                }
            }
            setTimeout(function(){ pollNotification(); },30000);
        }
    );
}

function voteRequest(request_id){
    $.post(baseurl+"/ajax/vote_request.php",{
        request_id: request_id
    }, function(resp){
        resp = eval('('+resp+')');
        if (resp.status == 1){
            $('#votes_'+request_id).hide().html(resp.votes).fadeIn("fast");
        }
    });
}

function hideSeason(){
    if ($('#submit_type').val()==1){
        $('#season_row').show();
        $('#episode_row').show();
    } else {
        $('#season_row').hide();
        $('#episode_row').hide();        
    }
}

function getTVguide(day){
    
    $.post(baseurl+"/ajax/tvguide.php",{
        date: day
    }, function(resp){
        $('#tv_guide').html(resp);
    });    
}
