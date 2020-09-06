location.getQueryString = function(){
    if(this.search.length <= 1) return {};
    else return this.search.substr(1).split("&").reduce((p, c) => {
        let [key, value] = c.split("=");
        p[key] = value;
        return p;
    }, {});
};

$(function(){
    $("[data-target='#road-modal']").on("click", e => {
        e.stopPropagation();

        let timeout = false;

        setTimeout(() => {
            if(timeout == false){
                timeout = true;
                alert("찾아오시는 길을 표시할 수 없습니다.");
            }
        }, 1000);

        fetch("/location.php")
            .then(res => res.text())
            .then(result => {
                if(timeout == false){
                    timeout = true;
                    $("#road-modal .modal-body").html( result );
                    $("#road-modal").modal("show");
                }
            });
    });
});