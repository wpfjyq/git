$(function() {
    $(".hc_tag li").not(".more").children("a").bind("click", function() {
        var a = $(".hc_tag").children("dd"),
            b = a.find("dl").eq(0).find("a.current").text(),
            c = a.find("dl").eq(1).find("a.current").text(),
            d = a.find("dl").eq(2).find("a.current").text(),
            e = $(this).text();
        $("#fs").val(b), $("#ifs").val(c), $("#ol").val(d), $("#city").val(e), $("#companyListForm").submit()
    }), $("#box_expectCity dd span").click(function() {
        var a = $(".hc_tag").children("dd"),
            b = a.find("dl").eq(0).find("a.current").text(),
            c = a.find("dl").eq(1).find("a.current").text(),
            d = a.find("dl").eq(2).find("a.current").text(),
            e = $(this).text();
        $("#fs").val(b), $("#ifs").val(c), $("#ol").val(d), $("#city").val(e), $("#companyListForm").submit()
    }), $(".hc_tag dd a").bind("click", function() {
        var a, b, c, d, e;
        $(this).hasClass("current") ? $(this).removeClass("current") : ($(this).siblings().removeClass("current"), $(this).addClass("current")), a = $(".hc_tag").children("dd"), b = a.find("dl").eq(0).find("a.current").text(), c = a.find("dl").eq(1).find("a.current").text(), d = a.find("dl").eq(2).find("a.current").text(), e = $(".hc_tag .workplace a.current").text(), $("#fs").val(b), $("#ifs").val(c), $("#ol").val(d), $("#city").val(e), $("#companyListForm").submit()
    })
});