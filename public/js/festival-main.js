class App {
    constructor(){
        this.init();        
    }

    async init(){
        let q = location.getQueryString();
        this.page = q.page && q.page >= 1 && !isNaN(parseInt(q.page)) ? parseInt(q.page) : 1;
        this.viewType = q.type && ["normal", "list"].includes(q.type) ? q.type : "normal";
        this.festivals = await this.getFestivals();

        this.render();
        this.setEvents();
    }

    getFestivals(){
        return fetch("/xml/festivalList.xml")
            .then(res => res.json())
            // .then(text => {
            //     let parser = new DOMParser();
            //     let xml = parser.parseFromString(text, "text/xml");
            //     let festivals = Array.from(xml.querySelectorAll("item")).map(item => ({
            //         id: item.querySelector("sn").innerHTML,
            //         no: item.querySelector("no").innerHTML,
            //         name: item.querySelector("nm").innerHTML,
            //         area: item.querySelector("area").innerHTML,
            //         location: item.querySelector("location").innerHTML,
            //         period: item.querySelector("dt").innerHTML,
            //         content: item.querySelector("cn").innerHTML,
            //         images: Array.from(item.querySelectorAll("image")).map(img => img.innerHTML),
            //     }));
            //     festivals = festivals.map(festival => ({
            //         ...festival,
            //         imagePath: "/xml/festivalImages/" + festival.id.padStart(3, '0') + "_" + festival.no
            //     }));
                
            //     return festivals;
            // });
    }

    render(){
        const COUNT = this.viewType === "normal" ? 6 : 10;
        const BCOUNT = 5;

        let viewList = this.festivals;
        let totalPage = Math.ceil(viewList.length / COUNT);
        let c_block = Math.ceil((this.page) / BCOUNT);

        let start = (c_block - 1) * BCOUNT + 1;
        let end = start + BCOUNT - 1;
        end = end > totalPage ? totalPage : end;

        let prevPage = start - 1;
        let prev = prevPage >= 1;
        
        let nextPage = end + 1;
        let next = nextPage <= totalPage;

        let sp = (this.page - 1) * COUNT;
        let ep = sp + COUNT;
        viewList = viewList.slice(sp, ep);

        $("#pagination").html(`<a href="?page=${prevPage}&type=${this.viewType}" class="mx-1 icon bg-red text-white" ${!prev ? 'disabled' : ''}><i class="fa fa-angle-left"></i></a>`);
        for(let i = start; i <= end; i++){
            $("#pagination").append(`<a href="?page=${i}&type=${this.viewType}" class="mx-1 icon border ${i == this.page ? 'bg-red text-white' : 'border-red text-red'}">${i}</a>`);
        }
        $("#pagination").append(`<a href="?page=${nextPage}&type=${this.viewType}" class="mx-1 icon bg-red text-white" ${!next ? 'disabled' : ''}><i class="fa fa-angle-right"></i></a>`);

        $(`[data-target='${this.viewType}']`).addClass("text-red");


        if(this.viewType === "normal") this.renderNormal(viewList);
        else this.renderList(viewList);
    }

    renderNormal(viewList){
        let first = this.festivals[ this.festivals.length - 1 ];
        $("#content").html(`<div class="row" data-target="#view-modal" data-toggle="modal" data-id="${first.id}">
                                <div class="col-lg-5">
                                    ${
                                        first.images[0] ? 
                                        `<img src="${first.imagePath}/${first.images[0]}" alt="축제 이미지" class="fit-cover hx-300">`
                                        : `<img src="/images/no-image.jpg" alt="No image" class="fit-cover hx-300">`
                                    }
                                    
                                </div>
                                <div class="col-lg-7">
                                    <div class="fx-4 font-weight-bold">${first.name}</div>
                                    <div class="mt-3 fx-n1 text-muted">
                                        ${first.content}
                                    </div>
                                    <div class="mt-4 d-between">
                                        <div>
                                            <span class="fx-n2 text-muted">축제 기간</span>
                                            <span class="ml-3 fx-n1">${first.period}</span>
                                        </div>
                                        <button class="btn-filled">자세히 보기</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row--festival mt-4 row border-top mt-4 pt-4"></div>`);

        viewList.forEach(item => {
            $("#content .row--festival").append(`<div class="col-lg-4 mb-4" data-target="#view-modal" data-toggle="modal" data-id="${item.id}">
                                            <div class="border bg-white">
                                                ${
                                                    item.images[0] ? 
                                                    `<img src="${item.imagePath}/${item.images[0]}" alt="축제 이미지" class="fit-cover hx-200">`
                                                    : `<img src="/images/no-image.jpg" alt="No image" class="fit-cover hx-200">`
                                                }
                                                <div class="p-3 border-top">
                                                    <div class="fx-3">${item.name}</div>
                                                    <div class="mt-2">
                                                        <span class="fx-n2 text-muted">축제 기간</span>
                                                        <span class="ml-2 fx-n1">${item.period}</span>
                                                    </div>
                                                    <div class="mt-2 image-count">
                                                        <span class="fx-n2 text-muted">사진 개수</span>
                                                        <span class="ml-2 fx-n1">${item.images.length}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
        });

        $("#content img").on("error", e => {
            e.target.src = "/images/no-image.jpg";
            $(e.target).siblings(".border-top").find(".image-count").remove();
        });
    }

    renderList(viewList){
        $("#content").html(`<div class="t-head">
                                <div class="cell-10">번호</div>
                                <div class="cell-50">축제명</div>
                                <div class="cell-20">기간</div>
                                <div class="cell-20">장소</div>
                            </div>`);
        viewList.forEach(item => {
            $("#content").append(`<div class="t-row" data-toggle="modal" data-target="#view-modal" data-id="${item.id}">
                                        <div class="cell-10">${item.no}</div>
                                        <div class="cell-50">${item.name}</div>
                                        <div class="cell-20">${item.period}</div>
                                        <div class="cell-20">${item.area}</div>
                                    </div>`);
        });
    }

    setEvents(){
        $("[data-target='#view-modal']").on("click", e => {
            let festival = this.festivals.find(f => f.id == e.currentTarget.dataset.id);
            
            if(festival){
                $("#view-modal .modal-body").html(`<div class="row">
                                                            <div class="col-lg-4">
                                                                ${
                                                                    festival.images[0] ? 
                                                                    `<img src="${festival.imagePath}/${festival.images[0]}" alt="축제 이미지" class="fit-cover hx-300">` 
                                                                    : `<img src="/images/no-image.jpg" alt="No image" class="fit-cover">`
                                                                }
                                                                
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="fx-4 font-weight-bold">${festival.name}</div>
                                                                <div class="fx-n1 text-muted mt-2">${festival.content}</div>
                                                                <div class="mt-2">
                                                                    <span class="fx-n2 text-muted">지역</span>
                                                                    <span class="fx-n1 ml-2">${festival.area}</span>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <span class="fx-n2 text-muted">장소</span>
                                                                    <span class="fx-n1 ml-2">${festival.location}</span>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <span class="fx-n2 text-muted">기간</span>
                                                                    <span class="fx-n1 ml-2">${festival.period}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="fx-2 mt-4">축제 사진</div>
                                                        <div class="mt-3">
                                                            <div class="modal-slide">
                                                                <div class="inner" style="width: ${festival.images.length * 100}%">
                                                                    ${ festival.images.map(img => `<img style="width: ${100 / festival.images.length}%" src="${festival.imagePath}/${img}" alt="축제 이미지">`).join('') }
                                                                </div>
                                                            </div>
                                                            <div class="modal-control d-center mt-4"></div>
                                                        </div>`);
                $("#view-modal .modal-control").html(`<button class="move relative icon mx-1" data-value="-1" disabled> <i class="fa fa-angle-left"></i> </button>`);
                for(let i = 0; i < festival.images.length; i ++){
                    $("#view-modal .modal-control").append(`<button class="move absolute icon mx-1 ${i == 0 ? 'active' : ''}" data-value="${i}"> ${i+1} </button>`);
                }
                $("#view-modal .modal-control").append(`<button class="move relative icon mx-1" data-value="1"> <i class="fa fa-angle-right"></i> </button>`);
                $("#view-modal").data("sno", "1");

                $("#view-modal img").on("error", e => {
                    e.target.src = "/images/no-image.jpg";
                });
            }
        });

        $("#view-modal").on("click", ".move", e => {
            $("#view-modal .move").removeAttr("disabled");
            $("#view-modal .move").removeClass("active");

            let i_length = $("#view-modal .modal-slide img").length;
            let sno = parseInt($("#view-modal").data("sno"));
            let value = parseInt(e.currentTarget.dataset.value );
            let isAbs = e.currentTarget.classList.contains("absolute");

            if(isAbs){
                sno = value;
            } else {
                sno = sno + value;
            }

            $("#view-modal").data("sno", sno);
            $("#view-modal .modal-slide .inner").css("left", sno * -100 + "%");
            $("#view-modal .move").eq(1 + sno).addClass("active");
            
            if(sno + 1 >= i_length) $(".move:last-child").attr("disabled", "disabled");
            else if(sno - 1 < 0) $(".move:first-child").attr("disabled", "disabled");
        });
    }
}

$(function(){
    let app = new App();
});