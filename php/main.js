$(document).ready(function() {
    $('#appointments').DataTable({
        "pageLength": 10,
        "responsive" : true,
        "autowidth" : true
    });
});

// $(document).ready(function() {
//     var table = $('#appointments').DataTable( {       
//         scrollX:        true,
//         scrollCollapse: true,
//         autoWidth:      true,  
//         paging:         true,       
//         columnDefs: [
//         { "width": "150px", "targets": [0,1] },       
//         { "width": "40px", "targets": [4] }
//       ]
//     } );
// } );

$(".btnedit").click(e =>{
    console.log("icon clicked");
    displayDate();
});


function displayDate(e){
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = []

    for(const value of td){
        console.log(value)
    }
}

