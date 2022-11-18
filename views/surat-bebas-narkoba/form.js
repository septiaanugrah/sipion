
let clearPengkajian = () => {
    $('#amphetamin > .btn').removeClass('active')
    $('#opiate > .btn').removeClass('active')
    $('#canabinoid > .btn').removeClass('active')
}

$('#pilih-semua .btn').on('click', function (e) {    
    let pilih = $(this).text()    
    clearPengkajian()
    if(pilih == " NEGATIF"){
        $('#amphetamin > .btn').eq(0).addClass('active')
        $('#opiate > .btn').eq(0).addClass('active')
        $('#canabinoid > .btn').eq(0).addClass('active')
       
    }
    else if(pilih == " POSITIF"){
        $('#amphetamin > .btn').eq(1).addClass('active')
        $('#opiate > .btn').eq(1).addClass('active')
        $('#canabinoid > .btn').eq(1).addClass('active')
    }

})