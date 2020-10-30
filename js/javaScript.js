$(document).ready(function () {
    'use strict';




    var FnameError = true,
        LnameError = true,
        PhoneError=true,
        EmailError=true;
    
    $('.gear-check').click(function(){
        $('.color-option').fadeToggle();
    })
    $('.option-box .color-option ul li').eq(0).css('backgroundColor','red').end().
    eq(1).css('backgroundColor','yellow').end().
    eq(2).css('background-color','green').end();
    $('.option-box .color-option ul li').click(function(){
        
        $("link[href*='Theme']").attr("href",$(this).attr("data-value"));
    })
    $('.Fi1 span').click(function () {
        $('.Fi1 li').toggle(1100);
        $('.Fi2 li').hide(800);
        $('.Fi3 li').hide(800);
    });
    $('.Fi2 span').click(function () {
        $('.Fi2 li').toggle(1100);
        $('.Fi1 li').hide(800);
        $('.Fi3 li').hide(800);
        $('.puls0').css('color','#fff');
        $('.puls1').css('color','red');
        $('.puls2').css('color','#fff');
    });
    $('.Fi3 span').click(function () {
        $('.Fi3 li').toggle(1100);
        $('.Fi1 li').hide(800);
        $('.Fi2 li').hide(800);
        $('.puls0').css('color','#fff');
        $('.puls1').css('color','#fff');
        $('.puls2').css('color','red');
    });
    $('.sp').click(function(){
        $(this).addClass("idea");
    })
    $('.logi').click(function () {
        $('.login').animate({
            disply: "block",
        }, 200, function () {
            $('.login').slideToggle(2000);
        });
        $('.singIn').hide();
    });       
    $(function () {
        var userError = true,
            PassError = true,
            Password;
        $('.mail').blur(function () {
            if ($(this).val().length < 1) {
                $(this).css('border', '1px solid #f00');
                $(this).parent().find('.ast0').fadeIn(100).css('display', 'inline');
                $(this).parent().find('.custom0').fadeIn(200);
                userError = true;
            } else {
                $(this).css('border', '1px solid #080');
                $(this).parent().find('.custom0').fadeOut(200);
                $(this).parent().find('.ast0').fadeOut(100);
                userError = false;
            }
        });
        $('.user').blur(function () {
            if ($(this).val().length < 1) {
                $(this).css('border', '1px solid #f00');
            } else {
                $(this).css('border', '1px solid #080');
            }
        });
        $('.pass').blur(function () {
            if ($(this).val().length < 10) {
                $(this).css('border', '1px solid #f00');
                $(this).parent().find('.custom1').fadeIn(200);
                $(this).parent().find('.ast1').fadeIn(100);
                PassError = true;
            } else {
                $(this).css('border', '1px solid #080');
                $(this).parent().find('.custom1').fadeOut(200);
                $(this).parent().find('.ast1').fadeOut(100);
                Password = $(this).val;
                PassError = false;
            }
        });
        $('#check').click(function () {
            $(this).is(':checked') ? $('.pass').attr('type', 'text') : $('.pass').attr('type', 'password');
        });
        $('#check3').click(function () {
            $(this).is(':checked') ? $('.passs').attr('type', 'text') : $('.passs').attr('type', 'password');
        });
        $('#check2').click(function () {
        $(this).is(':checked') ? $('.pas').attr('type', 'text') : $('.pas').attr('type','password');
    });
    $('.Contact-form').submit(function(e)
    {
        if(userError===true || PassError===true)
        {
            e.preventDefault(); 
            $('.mail, .pass').blur(); 
        }
    });  
});
$('.hav').click(function(){
    $('.ast0').hide();
    $('.ast1').hide();
    $('.singIn').slideDown(2000,function(){
        $('.ana').animate({
            left:"-=600px",
        },800,function(){
            $('.ana').show(200);
            $('.ast0').show(200);
            $('.ast1').show(200);
            $('.ana').css('borderTop','none');
        })
    });
    $('.singIn').animate({
        zIndex:"123455222222",
        disply:"block",
    })
    $('.login').hide();
});
$(function () {
    $('.Fname').blur(function () {
        if ($(this).val().length < 1) {
            $(this).css('border', '1px solid #f00');
            $('.Requried1').show(500);
            $(this).parent().find('.ast0').fadeIn(100).css('display', 'inline');
            $(this).parent().find('.custom0').fadeIn(200);
            FnameError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $('.Requried1').hide(500);
            FnameError = false;
        }
    });
    $('.Lname').blur(function () {
        if ($(this).val().length < 1) {
            $(this).css('border', '1px solid #f00');
            $('.Requried2').show(500);
            LnameError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $('.Requried2').hide(500);
            LnameError = false;
        }
    });
    $('.Phone').blur(function () {
        if ($(this).val().length < 11) {
            $(this).css('border', '1px solid #f00');
            $('.Requried3').show(500);
            PhoneError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $('.Requried3').hide(500);
            PhoneError = false;
        }
    });
    $('.Email').blur(function(){
        if($(this).val().length<1)
        {
            $(this).css('border','1px solid #f00');
            $('.Requried4').show(500);
            EmailError = true;
        }
        else{
            $(this).css('border', '1px solid #080');
            $('.Requried4').hide(500);
            EmailError = false;
        }
    });
    $('.st').click(function(){
        if(FnameError===true || LnameError===true || PhoneError===true || EmailError===true){
            alert("There are Some Errors In Any Field Input");
            $('.store').css('display','none');
        }else{
            $('.pers').css('display','none');
            $('.second').css('borderBottom','5px solid #632A7B');
            $('.first').css('borderBottom','none');
            $('.store').slideDown(1000);
        }    
    })
    $('.sun').click(function(){
        if(FnameError===true || LnameError===true || PhoneError===true || EmailError===true){
            $('.store').css('display','none');
        }else{
            $('.pers').animate({
                disply:'block'
            },3000);
            $('.second').css('borderBottom','5px solid #632A7B');
            $('.first').css('borderBottom','none');
            $('.store').css('display','block');
            $('.store').css('zIndex','3333335');  
        }    
    });
    $('.st1').click(function(){
        $('.first').css('borderBottom','5px solid #632A7B');
        $('.second').css('borderBottom','none');
        $('.pers').slideDown(1000);
        $('.store').css('display','none');
    })
});
$(function () {
    var storeNameError = true,
        selectError = true,
        locationError=true,
        websiteError=true;
    $('.storeName').blur(function () {
        if ($(this).val().length < 1) {
            $(this).css('border', '1px solid #f00');
            $('.Requried5').show(500);
            storeNameError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $('.Requried5').hide(500);
            storeNameError = false;
        }
    });
    $('.select').blur(function () {
        if ($(this).val().length < 1) {
            $(this).css('border', '1px solid #f00');
            $('.Requried6').show(500);
            selectError=true;  
        } else {
            $(this).css('border', '1px solid #080');
            $('.Requried6').hide(500);
            selectError=false;
        }
    });
    $('.location').blur(function () {
        if ($(this).val().length < 3) {
            $(this).css('border', '1px solid #f00');
            $('.Requried7').show(500);
            locationError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $('.Requried7').hide(500);
            locationError = false;
        }
    });
    $('.Website').blur(function(){
        if ($(this).val().length < 1) {
            $(this).css('border', '1px solid #f00');
            $('.Requried8').show(500);
            websiteError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $('.Requried8').hide(500);
            websiteError = false;
        }
    });
});
$('.store').button(function(e){
        if(storeNameError===true || locationError===true){
            e.preventDefault();
            alert(storeNameError+" "+locationError); 
            $('.storeName, .location').blur(); 
        }    
    });
    $('.cli').click(function(){
        $('.link a').toggle(300);
        $(this).toogle(300);
    })
   $('.unselectedB').click(function(){
        $(this).css('background','#686868').css('color','#fff');
        $('.SlightlyB').css('background','#eee').css('color','#000');
        $('.moderateB').css('background','#eee').css('color','#000');
        $('.quiteB').css('background','#eee').css('color','#000');
        $('.ExtremelyB').css('background','#eee').css('color','#000');
        $('.unselected').attr('src','Images/FeedBack/icon_notatall_selected.webp',500);
        $('.Slightly').attr('src','Images/FeedBack/icon_slightly_unselected.webp',500);
        $('.moderate').attr('src','Images/FeedBack/icon_moderate_unselected.webp',500);
        $('.quite').attr('src','Images/FeedBack/icon_quite_unselected.webp',500);
        $('.Extremely').attr('src','Images/FeedBack/icon_extreme_unselected.webp',500);
   })  
$('.SlightlyB').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.unselectedB').css('background','#eee').css('color','#000');
    $('.moderateB').css('background','#eee').css('color','#000');
    $('.quiteB').css('background','#eee').css('color','#000');
    $('.ExtremelyB').css('background','#eee').css('color','#000');
    $('.unselected').attr('src','Images/FeedBack/icon_notatall_unselected.webp',500);
    $('.Slightly').attr('src','Images/FeedBack/icon_slightly_selected.png',500);
    $('.moderate').attr('src','Images/FeedBack/icon_moderate_unselected.webp',500);
    $('.quite').attr('src','Images/FeedBack/icon_quite_unselected.webp',500);
    $('.Extremely').attr('src','Images/FeedBack/icon_extreme_unselected.webp',500);
}) 
$('.moderateB').click(function(){
     $(this).css('background','#686868').css('color','#fff');
    $('.unselectedB').css('background','#eee').css('color','#000');
    $('.quiteB').css('background','#eee').css('color','#000');
    $('.ExtremelyB').css('background','#eee').css('color','#000');
    $('.SlightlyB').css('background','#eee').css('color','#000');
    $('.unselected').attr('src','Images/FeedBack/icon_notatall_unselected.webp',500);
    $('.Slightly').attr('src','Images/FeedBack/icon_slightly_unselected.webp',500);
    $('.moderate').attr('src','Images/FeedBack/icon_moderate_selected.png',500);
    $('.quite').attr('src','Images/FeedBack/icon_quite_unselected.webp',500);
    $('.Extremely').attr('src','Images/FeedBack/icon_extreme_unselected.webp',500);
})
$('.quiteB').click(function(){
    $(this).css('background','#686868').css('color','#fff');
     $('.unselectedB').css('background','#eee').css('color','#000');
    $('.SlightlyB').css('background','#eee').css('color','#000');
    $('.moderateB').css('background','#eee').css('color','#000');
    $('.ExtremelyB').css('background','#eee').css('color','#000');
    $('.unselected').attr('src','Images/FeedBack/icon_notatall_unselected.webp',500);
    $('.Slightly').attr('src','Images/FeedBack/icon_slightly_unselected.webp',500);
    $('.moderate').attr('src','Images/FeedBack/icon_moderate_unselected.webp',500);
    $('.quite').attr('src','Images/FeedBack/icon_quite_selected.png',500);
    $('.Extremely').attr('src','Images/FeedBack/icon_extreme_unselected.webp',500);
})
$('.ExtremelyB').click(function(){
    $(this).css('background','#686868').css('color','#fff');
     $('.unselectedB').css('background','#eee').css('color','#000');
    $('.SlightlyB').css('background','#eee').css('color','#000');
    $('.moderateB').css('background','#eee').css('color','#000');
    $('.quiteB').css('background','#eee').css('color','#000');
    $('.unselected').attr('src','Images/FeedBack/icon_notatall_unselected.webp',500);
    $('.Slightly').attr('src','Images/FeedBack/icon_slightly_unselected.webp',500);
    $('.moderate').attr('src','Images/FeedBack/icon_moderate_unselected.webp',500);
    $('.quite').attr('src','Images/FeedBack/icon_quite_unselected.webp',500);
    $('.Extremely').attr('src','Images/FeedBack/icon_extreme_selected.webp',500);
})
$('.1').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.2').css('background','#eee').css('color','#000');
    $('.3').css('background','#eee').css('color','#000');
    $('.4').css('background','#eee').css('color','#000');
    $('.5').css('background','#eee').css('color','#000');
})
$('.2').click(function(){
    $('.1').css('background','#eee').css('color','#000');
    $(this).css('background','#686868').css('color','#fff');
    $('.3').css('background','#eee').css('color','#000');
    $('.4').css('background','#eee').css('color','#000');
    $('.5').css('background','#eee').css('color','#000');
})
$('.3').click(function(){
    $('.1').css('background','#eee').css('color','#000');
    $('.2').css('background','#eee').css('color','#000');
    $(this).css('background','#686868').css('color','#fff');
    $('.4').css('background','#eee').css('color','#000');
    $('.5').css('background','#eee').css('color','#000');
})
$('.4').click(function(){
    $('.1').css('background','#eee').css('color','#000');
    $('.2').css('background','#eee').css('color','#000');
    $('.3').css('background','#eee').css('color','#000');
    $(this).css('background','#686868').css('color','#fff');
    $('.5').css('background','#eee').css('color','#000');
})
$('.5').click(function(){
    $('.1').css('background','#eee').css('color','#000');
    $('.2').css('background','#eee').css('color','#000');
    $('.3').css('background','#eee').css('color','#000');
    $('.4').css('background','#eee').css('color','#000');
    $(this).css('background','#686868').css('color','#fff');
})
$('.00').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.11').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.11').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.22').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.33').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.44').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.55').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.66').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.77').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.88').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
$('.99').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
    $('.10').css('background','#eee').css('color','#000');
})
$('.10').click(function(){
    $(this).css('background','#686868').css('color','#fff');
    $('.00').css('background','#eee').css('color','#000');
    $('.11').css('background','#eee').css('color','#000');
    $('.22').css('background','#eee').css('color','#000');
    $('.33').css('background','#eee').css('color','#000');
    $('.44').css('background','#eee').css('color','#000');
    $('.55').css('background','#eee').css('color','#000');
    $('.66').css('background','#eee').css('color','#000');
    $('.88').css('background','#eee').css('color','#000');
    $('.99').css('background','#eee').css('color','#000');
    $('.77').css('background','#eee').css('color','#000');
});
});
$('.one').click(function(){
    alert($('.file').text());
})
$(".MyAccount").click(function () {
    $(".Account_Parent").slideToggle(200);
    $(".Account").slideToggle(900);
  })
    $('.About .conten ul li:nth-of-type(1)').css('borderLeft','2px solid #632A7F');
    $('.Account_Infor').css('display','block');
    $('.About .conten ul li:nth-of-type(1) a').css('color','#632A7F')
$('.About .conten ul li:nth-of-type(1)').click(function(){
    $(this).css('borderLeft','2px solid #632A7F')
    $('.Account_Infor').css('display','block');
    $('.order2').css('display','none')
    $('.Saved').css('display','none')
    $('.visa').css('display','none');
    $('.mony').css('display','none');
    $('.About .conten ul li:nth-of-type(1) a').css('color','#632A7F')
    $('.About .conten ul li:nth-of-type(2) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(3) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(4) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(5) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(2)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(3)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(4)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(5)').css('borderLeft','none')
})
$('.About .conten ul li:nth-of-type(2)').click(function(){
    $(this).css('borderLeft','2px solid #632A7F')
    $('.Saved').css('display','block');
    $('.Account_Infor').css('display','none');
    $('.order2').css('display','none');
    $('.visa').css('display','none');
    $('.mony').css('display','none');
    $('.About .conten ul li:nth-of-type(2) a').css('color','#632A7F')
    $('.About .conten ul li:nth-of-type(1) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(3) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(4) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(5) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(1)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(3)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(4)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(5)').css('borderLeft','none')
})
$('.About .conten ul li:nth-of-type(3)').click(function(){
    $(this).css('borderLeft','2px solid #632A7F')
    $('.order2').css('display','block');
    $('.Account_Infor').css('display','none');
    $('.Saved').css('display','none');
    $('.visa').css('display','none');
    $('.mony').css('display','none');
    $('.About .conten ul li:nth-of-type(3) a').css('color','#632A7F')
    $('.About .conten ul li:nth-of-type(1) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(2) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(4) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(5) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(1)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(2)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(4)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(5)').css('borderLeft','none')
})
$('.About .conten ul li:nth-of-type(4)').click(function(){
    $(this).css('borderLeft','2px solid #632A7F')
    $('.order2').css('display','none');
    $('.Account_Infor').css('display','none');
    $('.Saved').css('display','none');
    $('.visa').css('display','block');
    $('.mony').css('display','none');
    $('.About .conten ul li:nth-of-type(4) a').css('color','#632A7F')
    $('.About .conten ul li:nth-of-type(1) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(2) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(3) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(5) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(1)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(2)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(3)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(5)').css('borderLeft','none')
})
$('.About .conten ul li:nth-of-type(5)').click(function(){
    $(this).css('borderLeft','2px solid #632A7F')
    $('.order2').css('display','none');
    $('.Account_Infor').css('display','none');
    $('.Saved').css('display','none');
    $('.visa').css('display','none');
    $('.mony').css('display','block');
    $('.About .conten ul li:nth-of-type(5) a').css('color','#632A7F')
    $('.About .conten ul li:nth-of-type(1) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(2) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(3) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(4) a').css('color','#646464')
    $('.About .conten ul li:nth-of-type(1)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(2)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(4)').css('borderLeft','none')
    $('.About .conten ul li:nth-of-type(3)').css('borderLeft','none')
})

$('.change_mail').click(function(){
    $('.changeM').slideDown(900);
});
$('.chane_password').click(function(){
    $('.changePassword').slideDown(900);
})
$('.hid').click(function(){
    $('.changeM').hide(900);
})
$('.hid3').click(function(){
    $('.forget_Password').slideUp(1000);
})
$('.hid2').click(function(){
    $('.changePassword').slideUp(900);
})
$('.forget').click(function(){
    $('.forget_Password').slideDown(900);
    $('body').css('backgroundColor','#fff');
})
$('.gender1').click(function(){
    $(this).css('backgroundColor','green');
    $('.gender2').css('backgroundColor','#fff');
    $(this).css('color','#fff');
    $('.gender2').css('color','#000');
})
$('.gender2').click(function(){
    $(this).css('backgroundColor','green');
    $('.gender1').css('backgroundColor','#fff');
    $(this).css('color','#fff');
    $('.gender1').css('color','#000');
})
$('#check4').click(function () {
    $(this).is(':checked') ? $('.pass4').attr('type', 'text') : $('.pass4').attr('type','password');
})
$('#check5').click(function () {
    $(this).is(':checked') ? $('.pass5').attr('type', 'text') : $('.pass5').attr('type','password');
})
$('.Name').click(function(){
    // $(this).css('backgroundColor','red');
    // alert("Hello World");
})
var error1=true,
    error2=true,
    error3=true;
$('.Name').blur(function Name(){
    // $(body).css('backgroundColor','#F00');
    if($(this).val().length<3){
       $('.Name_Enter').fadeIn(500);
       $(this).css('border','1px solid red');
       error1=true;
    }else{
        $('.Name_Enter').fadeOut(500);
        $(this).css('border','1px solid #080');
        error1=false;
    }
})
$('.mail').blur(function Mail(){
    // $(body).css('backgroundColor','#F00');
    if($(this).val().length<3){
       $('.Email_Enter').fadeIn(500);
       $(this).css('border','1px solid red');
       error2=true;
    }else{
        $('.Email_Enter').fadeOut(500);
        $(this).css('border','1px solid #080');
        error2=false;
    }
})
$('.mobile').blur(function Mobile(){
    // $(body).css('backgroundColor','#F00');
    if($(this).val().length<11){
       $('.Mobile_Enter').fadeIn(500);
       $(this).css('border','1px solid red');
       error3=true;
    }else{
        $('.Mobile_Enter').fadeOut(500);
        $(this).css('border','1px solid #080');
        error3=false;
    }
})
$('.Enter').click(function(event){
    if(error1===true || error2===true || error3===True){
        event.preventDefault();
        $('.Name,.mail, .mobile').blur(); 
    }
})
}); 