
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2019-04-27 21:29:44 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2019-08-09 17:48:30
 */

$(document).ready(function () {
    
    // $('#jenis').on('change', function (e) {

    //     let a1 = $('#jenis').find('.active').text()
    //     console.log(a1)
    //     // if($("#jenis").val() == 'ANTIGEN') 
    //     //     console.log('antigen')
    //     // else if ($("#jenis").val() == 'ANTIBODI') 
    //     //     console.log('antigen')
    // })

    // $('#jenis').on('click', function (e) {    
      
    //     let pilih = $(this).text()    
    //     console.log(pilih)
    //     if(pilih == " Antigen"){
    //     //     $('#hasil').eq(0).addClass('active')
    //         console.log('antigen')
    //     }
    //     // else if(pilih == " ANTIBODI"){
    //     //     $('#hasil').eq(1).addClass('active')
    //     //     console.log('antibodi')
    //     // }
    
    // })

    $('#jenis').on('click', function (e) {    
        let pilih = $(this).text()    
        // console.log(pilih)
        if(pilih == ' Antigen') {
            $("#hasil").val('NEGATIF')
            console.log($("#hasil").val())
        } else if(pilih == ' ') { 
            $("#hasil").val('NON-REAKTIF')
            console.log($("#hasil").val())
        }
    })
    

})