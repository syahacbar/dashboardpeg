/**
 * Written by: Agus Prawoto Hadi
 * Year		: 2021-2022
 * Website	: jagowebdev.com
 */

jQuery(document).ready(function() {

    const column = $.parseJSON($('#dataTables-column').html());
    const url = $('#dataTables-url').text();

    const settings = {
        "processing": true,
        "serverSide": true,
        "scrollX": true,
        "ajax": {
            "url": url,
            "type": "POST"
        },
        "columns": column,
        "initComplete": function(settings, json) {
            table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                $row = $(this.node());
                /* this
                	.child(
                		$(
                			'<tr>'+
                				'<td>'+rowIdx+'.1</td>'+
                				'<td>'+rowIdx+'.2</td>'+
                				'<td>'+rowIdx+'.3</td>'+
                				'<td>'+rowIdx+'.4</td>'+
                			'</tr>'
                		)
                	)
                	.show(); */
            });
        }
    }

    const settings_kp = {
        "processing": true,
        "serverSide": true,
        "scrollX": true,
        "ajax": {
            "url": url,
            "type": "POST",
            "data": function(data){
               data.searchStatusKP = $('#dd_statuspengusulan').val();
               data.searchProsedur = $('#dd_prosedur').val();
               data.searchJenisJabatan = $('#dd_jenisjabatan').val();
               data.searchSatuanKerja = $('#dd_satuankerja').val();
            }
        },
        "columns": column,
        "initComplete": function(settings, json) {
            table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                $row = $(this.node());
            
            });
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        // dom: '<"float-left"B><"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
        // dom: 'lBfrtip',
        // dom: '<"top"i>rt<"bottom"flp><"clear">',
        dom: '<"top"Bf>rt<"bottom"lip><"clear">',


        "buttons":[
                {"extend":"copy"
                    ,"text":"<i class='far fa-copy'></i> Copy"
                    ,"className":"btn-light me-1"
                },
                {"extend":"excel"
                    , "title":"Data Kenaikan Pangkat"
                    , "text":"<i class='far fa-file-excel'></i> Excel"
                    , "exportOptions": {
                      columns: [1,2, 3, 4, 5, 6, 7],
                      modifier: {selected: null}
                    }
                    , "className":"btn-light me-1"
                },
                {"extend":"pdf"
                    ,"title":"Data Kenaikan Pangkat"
                    ,"text":"<i class='far fa-file-pdf'></i> PDF"
                    , "exportOptions": {
                      columns: [1,2, 3, 4, 5, 6, 7],
                      modifier: {selected: null}
                    }
                    ,"className":"btn-light me-1"
                },
                {"extend":"csv"
                    ,"title":"Data Kenaikan Pangkat"
                    ,"text":"<i class='far fa-file-alt'></i> CSV"
                    , "exportOptions": {
                      columns: [1,2, 3, 4, 5, 6, 7],
                      modifier: {selected: null}
                    }
                    ,"className":"btn-light me-1"
                },
                {"extend":"print"
                    ,"title":"Data Kenaikan Pangkat"
                    ,"text":"<i class='fas fa-print'></i> Print"
                    , "exportOptions": {
                      columns: [1,2, 3, 4, 5, 6, 7],
                      modifier: {selected: null}
                    }
                    ,"className":"btn-light"
                },
                'pageLength',
            ],
    }

    
   

    let $add_setting = $('#dataTables-setting');
    if ($add_setting.length > 0) {
        add_setting = $.parseJSON($('#dataTables-setting').html());
        for (k in add_setting) {
            settings[k] = add_setting[k];
        }
    }

    const table = $('#table-result').DataTable(settings);
    const table2 = $('#tbl-struktural-kp').DataTable(settings_kp);
    const table3 = $('#tbl-fungsionalumum').DataTable(settings);
    const table4 = $('#tbl-fungsionaltertentu').DataTable(settings);

    // table2.buttons().container()
    //         .appendTo( '#data-tables_wrapper .col-md-6:eq(0)' );

     $('#dd_jenisjabatan,#dd_statuspengusulan,#dd_prosedur,#dd_satuankerja').change(function(){
        table2.draw();
    });

     // var tablex = $('#data-tables').DataTable(settings_kp);
    table2.buttons().container().appendTo('#data-tables_wrapper .col-md-6:eq(0)');
        
});