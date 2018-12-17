/**
 * Created by Administrator on 2018-12-15.
 */
$(function(){
    $("tr.tron").mouseover(function () {
        $(this).find("td").css("backgroundColor","#F1FAFC");
    });
    $("tr.tron").mouseout(function () {
        $(this).find("td").css("backgroundColor","#FFF");
    });
});
