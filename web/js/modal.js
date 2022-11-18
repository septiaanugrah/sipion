// $(function(){
//     let judulModal = null;
        
//     $('#modalCreate').click(function(){
//         judulModal = $('#modalCreate').attr('data-judul');
//         $('#modal-header').text(judulModal);
//         $('#modal').modal('show')
//             .find('#modalContent')
//             .load($(this).attr('value'));
//     });
//     $('#modalUpdate').click(function(){
//         console.log('up kli');
//         judulModal = $('#modalUpdate').attr('data-judul');
//         $('#modal-header').text(judulModal);
//         $('#modal').modal('show')
//             .find('#modalContent')
//             .load($(this).attr('value'));
//     });
// });

$(document).ready(function () {
    let judulModal = null;
    
    $('body').on('click', '#modalCreate', function (e) {
        showModal('modalCreate', $(this));
    });
    
    $('body').on('click', '#modalView', function (e) {
        showModal('modalView', $(this));
    });

    let showModal = (data, ini) => {
        judulModal = $('#'+data).attr('data-judul');
        $('#modal-header').text(judulModal);
        $('#modal').modal('show')
            .find('#modalContent')
            .load(ini.attr('value'));
    }








    // $('body').on('click', '#modalUpdate', function (e) {
    //     judulModal = $('#modalUpdate').attr('data-judul');
    //     $('#modal').attr('data-id', 'update');
    //     $('#modal-header').text(judulModal);
    //     $('#modal').modal('show')
    //         .find('#modalContent')
    //         .load($(this).attr('value'));
    // });
});

