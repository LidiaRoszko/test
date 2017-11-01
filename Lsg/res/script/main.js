
function toggle_column(col_id) {
         var col = document.getElementById(col_id);
         var vis = col.style.visibility == 'collapse';
         col.style.visibility = vis? "visible" : "collapse";
}


function add_table_row(table_id){
         var tbl = document.getElementById(table_id);
         var tbod = tbl.getElementsByTagName("tbody")[0];

         for(var i = 0; i < 25; i++){
                 var row = document.createElement('tr');
                 for(var k = 0; k < 7; k++){
                         var cell = document.createElement('td');
                         var cont = document.createTextNode("Test" + k);
                         cell.appendChild(cont);
                         row.appendChild(cell);
                 }
                 tbod.appendChild(row);
         }
}


function sort(table_id, col_nbr, type){
         var tbl = document.getElementById(table_id);
         var tbod = tbl.getElementsByTagName("tbody")[0];
         var rows = tbod.getElementsByTagName("tr");
         shakersort(rows, col_nbr, type);
}


function shakersort(rows, col_nbr, type){
         var end = rows.length - 2;
         var swapped = true;

         while(swapped){
                 swapped = false;
                 for(var i = 0; i < end + 1; i++){
                         var cmp = compare_row(rows[i], rows[i + 1], col_nbr);
                         if(cmp < 0 && type == 0){
                                 swap(rows[i], rows[i + 1]);
                                 swapped = true;
                         }
                         if(cmp > 0 && type == 1){
                                 swap(rows[i], rows[i + 1]);
                                 swapped = true;
                         }
                 }
                 if(!swapped){
                         break;
                 }
                 swapped = false;
                 for(var i = end;  i > -1; i--){
                         var cmp = compare_row(rows[i], rows[i + 1], col_nbr);
                         if(cmp < 0 && type == 0){
                                swap(rows[i], rows[i + 1]);
                                swapped = true;
                         }
                         if(cmp > 0 && type == 1){
                                swap(rows[i], rows[i + 1]);
                                swapped = true;
                         }
                 }
         }
}


function swap(row1, row2){
         row2.parentNode.insertBefore(row1, row2.nextSibling);
}

function compare_row(row1, row2, col_nbr){
         var val1 = row1.cells[col_nbr].firstChild.nodeValue;
         var val2 = row2.cells[col_nbr].firstChild.nodeValue;
         return val1.localeCompare(val2);
}