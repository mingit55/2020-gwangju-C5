class App {
    constructor(){
        this.init();
    }

    async init(){
        let {statusCd, statusMsg, dt, items} = await this.getExchangeData();
        let showIndex = localStorage.getItem("showIndex");
        let scrollY = localStorage.getItem("scrollY");
        
        if(statusCd != 200) this.throwError(statusMsg);
        else {
            this.updated_at = dt;
            this.list = items;

            this.showIndex = showIndex ? showIndex : 9;

        
            
            $("#update-date").text(this.updated_at);
            
            this.render();
            this.setEvents();
            setTimeout(() => window.scrollTo(0, scrollY ? scrollY : 0));
        }
    }

    render(){
        $("#content").html('');

        if(this.showIndex >= this.list.length - 1) {
            this.showIndex = this.list.length - 1;
            $("#more").remove();
        }

        for(let i = 0; i <= this.showIndex; i++){
            let item = this.list[i];
            
            $("#content").append(`<div class="py-4 item ${ item.result != 1 ? 'active' : '' }">
                                        <div>
                                            <span class="fx-6">${item.cur_nm}</span>
                                            <span class="fx-2 text-muted ml-3">${item.cur_unit}</span>
                                        </div>
                                        <div class="border-top mt-3 border-red">
                                            <div class="t-row text-left">
                                                <div class="cell-20">송금 시</div>
                                                <div class="cell-80">${item.ttb}</div>
                                            </div>
                                            <div class="t-row text-left">
                                                <div class="cell-20">수금 시</div>
                                                <div class="cell-80">${item.tts}</div>
                                            </div>
                                            <div class="t-row text-left">
                                                <div class="cell-20">매매 기준율</div>
                                                <div class="cell-80">${item.deal_bas_r}</div>
                                            </div>
                                            <div class="t-row text-left">
                                                <div class="cell-20">장부가격</div>
                                                <div class="cell-80">${item.bkpr}</div>
                                            </div>
                                            <div class="t-row text-left">
                                                <div class="cell-20">년환가료율</div>
                                                <div class="cell-80">${item.yy_efee_r}</div>
                                            </div>
                                            <div class="t-row text-left">
                                                <div class="cell-20">10일환가료율</div>
                                                <div class="cell-80">${item.ten_dd_efee_r}</div>
                                            </div>
                                            <div class="t-row text-left">
                                                <div class="cell-20">매매 기준율</div>
                                                <div class="cell-80">${item.kftc_bkpr}</div>
                                            </div>
                                            <div class="t-row text-left">
                                                <div class="cell-20">장부가격</div>
                                                <div class="cell-80">${item.kftc_deal_bas_r}</div>
                                            </div>
                                        </div>
                                    </div>`);
        }
    }

    getExchangeData(){
        return fetch("/restAPI/currentExchangeRate.php")
            .then(res => res.json())
    }

    throwError(error){
        $("#content").html(`<p class="fx-n1 text-muted">${error}</p>`);
    }

    setEvents(){
        $(window).on("scroll", e => {
            localStorage.setItem("scrollY", window.scrollY);

            let scrollBottom = window.innerHeight + window.scrollY;
            let height = document.body.offsetHeight;
            if(scrollBottom >= height){
                localStorage.setItem("showIndex", this.showIndex);
                this.showIndex += 10;
                this.render();
            }
        });

        $("#more").on("click", e => {
            localStorage.setItem("showIndex", this.showIndex);
            this.showIndex += 10;
            this.render();
        });
    }
}

$(function(){
    let app = new App();
});