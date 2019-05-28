/**
 * Created by Administrator on 2016/9/21.
 */
String.prototype.mytirm =function () {

};


function genTable(id, ths)
{
    var html = "";
    html = '<div style="margin-bottom:10px"> ' +
                '<a style="padding-left: 10px;padding-right: 10px" class="btn btn-labeled btn-success add-instance"> ' +
                '<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>选择 ' +
                '</a>' +
           '</div>';

    html += '<div><table id="table-'+id+'" class="table table-bordered smart-form"><thead><tr>';
    $.each(ths, function(k, th){
        html += '<th>'+th+'</th>'
    });
    html += '</tr></thead><tbody></tbody></table></div>';
    return html;
}
// Array.prototype.