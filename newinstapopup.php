<div id="gridApp" class="pt-6 flex flex-wrap justify-center gap-4">    
    <div class="app"></div>
</div>

<div class="text-center p-6">
    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="" id="showMore">もっと見る</a>
</div>

<style>
    .insta_box p{
        opacity: 0;
        visibility: hidden;
        transition: 0.3s;
    }
    .insta_box:hover p{
        opacity: 1;
        visibility: visible;
    }
    .insta_box:hover .overlay{
        opacity: 0.5;
    }
</style>
<?php
    $serverPath = getcwd();

    // raw data path
    $filePath = "{$serverPath}/insta.txt";
    
    // get insta.txt
    $toBeRestored = file_get_contents($filePath);
    $data = unserialize($toBeRestored);

    // get time now
    $mytimeNow = Carbon\Carbon::now()->timestamp;

    // set and create insta.txt content
    function createInstaData($filePath, $instanames){
        $mytime = Carbon\Carbon::now()->add("2 minute")->timestamp;
        $dataInsta = [];
        foreach($instanames as $instaname){

            // テスト用アカウント
            //$instagram_business_account = "";
            //$access_token = "";

            // $instagram_business_account = "";
            // $access_token = "";

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://graph.facebook.com/v16.0/{$instagram_business_account}?fields=business_discovery.username({$instaname}){media{username,permalink,media_url,timestamp,media_type,comments_count,like_count,caption,children{media_url}}}&access_token={$access_token}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            
            $dataInsta[$instaname] = $response;
        }
        $data = [
            "date" => $mytime,
            "instagram" => $dataInsta
        ];
        $toBeSaved = serialize($data);
        file_put_contents( $filePath, $toBeSaved);
    }
    
    // if insta.txt is empty
    if( $data == false ){
        createInstaData($filePath, $instanames);
        return back();
    }

    // if 1 time ago
    if( $mytimeNow > $data["date"] ) echo "koshin";
    else echo "not koshin";
   
    // if( $mytimeNow > $data["date"] ) createInstaData($filePath, $instanames);

    foreach ($data["instagram"] as $key => $value) {
        echo "<div class='raw_insta hidden'>{$value}</div>";
    }

?>
<script>

    window.addEventListener('load', function() {

        // define
        let grid = document.querySelectorAll('#gridApp'),
            apps = document.querySelectorAll('.app')
        
        // get instagram
        const rawInstas = document.querySelectorAll(".raw_insta")

        rawInstas.forEach( (rawInsta,i) => {
            let rawInstaJson = JSON.parse( rawInsta.innerText )
            
            getData(apps,rawInstaJson, i)
            rawInsta.remove()
        });
        function getData(apps,rawInstaJson,i){
            return apps.forEach(username => {
                
                const promise = new Promise((resolve, reject) => {
                    resolve(rawInstaJson)
                })
                promise
                .then(function (res) {
                    let datas = res.business_discovery.media.data

                    // username.innerText = ""
                    datas.forEach( (element, idx) => {
                        let date = new Date(element.timestamp).toLocaleString('en-us', {
                            year: 'numeric',
                            month: 'numeric',
                            day: 'numeric',
                        })

                        if( idx > 7 ) return false

                        username.innerHTML += `
                        <div class="insta_item w-[166px] h-[166px] sm:w-[238px] sm:h-[238px]">
                            <div class="insta_wrap">
                                <a class="insta_link" data-user="${element.username}" data-date="${date}" data-image="${element.media_url}" data-caption="${element.caption}" data-children='${JSON.stringify(element.children)}'>
                                    ${
                                        element.media_type == "VIDEO"
                                        ? `
                                        <div class="w-full h-full bg-gray-500 relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="fill-white" viewBox="0 0 24 24" stroke-width="1.5" stroke="stroke-white" class="w-10 h-10 absolute fill-white stroke-white inset-0 m-auto">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                            </svg>
                                        </div>
                                        `
                                        : `
                                        <div class="w-full h-full relative insta_box">
                                            <span class="insta_date hidden">${date}</span>
                                            <img class="h-full object-cover w-full" src="${element.media_url}" alt="${element.caption}">
                                            ${
                                                element.media_type == "CAROUSEL_ALBUM"
                                                ? `<div class="absolute top-0 m-auto right-0 text-white p-1">
                                                    <svg aria-label="Carousel" class="_ab6-" color="#ffffff" fill="#ffffff" height="22" role="img" viewBox="0 0 48 48" width="22">
                                                        <path d="M34.8 29.7V11c0-2.9-2.3-5.2-5.2-5.2H11c-2.9 0-5.2 2.3-5.2 5.2v18.7c0 2.9 2.3 5.2 5.2 5.2h18.7c2.8-.1 5.1-2.4 5.1-5.2zM39.2 15v16.1c0 4.5-3.7 8.2-8.2 8.2H14.9c-.6 0-.9.7-.5 1.1 1 1.1 2.4 1.8 4.1 1.8h13.4c5.7 0 10.3-4.6 10.3-10.3V18.5c0-1.6-.7-3.1-1.8-4.1-.5-.4-1.2 0-1.2.6z"></path>
                                                    </svg>
                                                </div>`
                                                : ""
                                            }
                                            <p class="overlay bg-gray-800 w-full h-full absolute top-0">
                                            </p>
                                            <p class="absolute inset-0 flex items-center justify-center text-white flex-wrap">
                                                <span class="w-full text-center">${element.username}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                                                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                                </svg>
                                                ${element.like_count}
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-6 mr-1" style="transform: scaleX(-1)">
                                                    <path fill-rule="evenodd" d="M5.337 21.718a6.707 6.707 0 01-.533-.074.75.75 0 01-.44-1.223 3.73 3.73 0 00.814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 01-4.246.997z" clip-rule="evenodd" />
                                                </svg>
                                                ${element.comments_count}
                                            </p>

                                            <div data="only view in sp" class="opacity-30 bg-gray-800 w-full h-full absolute top-0 md:hidden"></div>
                                            <div data="only view in sp" class="absolute inset-0 flex items-center justify-center text-white md:!hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                                                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                                </svg>
                                                ${element.like_count}
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ml-6 mr-1" style="transform: scaleX(-1)">
                                                    <path fill-rule="evenodd" d="M5.337 21.718a6.707 6.707 0 01-.533-.074.75.75 0 01-.44-1.223 3.73 3.73 0 00.814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 01-4.246.997z" clip-rule="evenodd" />
                                                </svg>
                                                ${element.comments_count}
                                            </div>

                                        </div>
                                        `
                                    }
                                </a>
                            </div>
                        </div>
                        `
                    })

                    return res
                })
                .then(function (res) {

                    // appタグ削除
                    username.replaceWith(...username.childNodes)

                    // adjust image
                    let width = document.querySelector(".insta_item").clientWidth,
                        items = document.querySelectorAll(".insta_item")
                    items.forEach(element => {

                        element.querySelector('.insta_wrap').style.height = `${width}px`
                        element.querySelector('.insta_wrap').style.overflow = "hidden"
                    })

                    // 日付でインスタ並ぶ処理
                    let instaItem = gridApp.querySelectorAll(".insta_item"),
                        sortDate = Array.from(instaItem)
                    sortDate
                    .sort( (a, b) => {
                        if( a.querySelector(".insta_date") !== null && b.querySelector(".insta_date") !== null)
                            return new Date(a.querySelector(".insta_date").innerText) - new Date(b.querySelector(".insta_date").innerText)
                    } )
                    .reverse()
                    sortDate.forEach(element => gridApp.append(element))
                    // 日付でインスタ並ぶ処理 end

                    // 表示数
                    let total = 11,
                        newInstaItem = gridApp.querySelectorAll(".insta_item")
                    
                    function instaContent(count, x = newInstaItem){
                        x.forEach( (e,i) => {
                            e.style.display = "none"
                            if( i <= count ) return e.style.display = "block"
                        })
                    }

                    // もっと見る処理
                    instaContent(total)
                    showMore.onclick = (e)=>{
                        e.preventDefault()
                        let display = Array.from( newInstaItem )
                                        .filter( e => e.style.display !== "none" )
                                        .length
                        instaContent( display + total )
                        if( newInstaItem.length - 1 === display + total ) e.target.remove()
                    }

                    return res
                })
                .then(function (res) {
                    document.querySelectorAll(".insta_link").forEach( (element,index)=>{
                        element.onclick = e=>{
                            let child = e.target.closest("a").getAttribute("data-children"),
                                img = e.target.closest("a").getAttribute("data-image"),
                                date = e.target.closest("a").getAttribute("data-date"),
                                caption = e.target.closest("a").getAttribute("data-caption"),
                                user = e.target.closest("a").getAttribute("data-user")

                            instaPop.style.display = "flex"
                            if(child === "undefined" ){
                                imgInsta.innerHTML = `<img class="h-full object-cover w-full" src="${img}">`
                            }
                            else{
                                imgInsta.innerHTML = ""
                                imgInsta.innerHTML = `<img class="invisible h-full object-cover w-full" src="${img}">`
                                imgInsta.innerHTML += "<div id='multiImageInsta'>"
                                multiImageInsta.innerHTML += "<div id='multiImgInnerInsta'>"
                                multiImgInnerInsta.innerHTML += `
                                    <svg id="leftImageInsta" width="32" height="32" viewBox="0 0 24 24">
                                        <polyline fill="none" id="Left" points="15.5 5 8.5 12 15.5 19" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                    <svg id="rightImageInsta" width="32" height="32" viewBox="0 0 24 24">
                                        <polyline fill="none" id="Left" points="15.5 5 8.5 12 15.5 19" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                `
                                JSON.parse(child)["data"].forEach( (e,i)=>{
                                    multiImgInnerInsta.innerHTML += `<img class="h-full object-cover w-full" style="display:none" src="${e.media_url}">`
                                })
                                multiImageInsta.innerHTML += "</div>"
                                imgInsta.innerHTML += "</div>"
                            }
                            timeInsta.innerHTML = `
                                <p class="date">
                                    ${user} <br>
                                    ${date}
                                </p>
                            `
                            captionInsta.innerHTML = `<p>${caption}</p>`
                            
                            ////////////////////// big arrow start //////////////////////
                            // arrow
                            leftInsta.style.display = index > 0 ? "block" : "none"
                            
                            // trigger
                            let event = new Event("click")

                            // arrow right
                            rightInsta.onclick = ()=>{
                                document.querySelectorAll(".insta_link")[index + 1].dispatchEvent(event)
                            }

                            // arrow left
                            leftInsta.onclick = ()=>{
                                document.querySelectorAll(".insta_link")[index - 1].dispatchEvent(event)
                            }
                            ////////////////////// big arrow end //////////////////////

                            ////////////////////// small arrow end //////////////////////
                            // default
                            multiImgInnerInsta.querySelectorAll("img").forEach( (e,i)=>{
                                if( i === 0 ){
                                    e.style.display = "block"
                                    e.classList.add("active")
                                    leftImageInsta.style.display = "none"
                                }
                            })

                            // arrow right image
                            rightImageInsta.onclick = ()=>{
                                let flag = []
                                multiImgInnerInsta.querySelectorAll("img").forEach( (e,i)=>{
                                    if( e.classList.contains("active") ){
                                        flag = e
                                        num = i + 1
                                    }
                                })
                                flag.nextSibling.style.display ="block"
                                flag.nextSibling.classList.add("active")
                                flag.style.display = "none"
                                flag.classList.remove("active")

                                if( num === 1 ) leftImageInsta.style.display = "block"
                                if( num === multiImgInnerInsta.querySelectorAll("img").length - 1){
                                    rightImageInsta.style.display = "none"
                                }
                            }

                            // arrow left image
                            leftImageInsta.onclick = ()=>{
                                let flag = []
                                multiImgInnerInsta.querySelectorAll("img").forEach( (e,i)=>{
                                    if( e.classList.contains("active") ){
                                        flag = e
                                        num = i - 1
                                    }
                                })
                                console.log(num)
                                flag.previousSibling.style.display ="block"
                                flag.previousSibling.classList.add("active")
                                flag.style.display = "none"
                                flag.classList.remove("active")

                                if( num === multiImgInnerInsta.querySelectorAll("img").length - 2 ){
                                    rightImageInsta.style.display = "block"
                                }
                                if( num === 0) leftImageInsta.style.display = "none"
                            }
                            ////////////////////// small arrow end //////////////////////

                        }
                    })
                })
                .catch(function (err) {
                    console.log("Something went wrong.", err)
                    username.innerHTML = "インスタ名が登録されてません"
                })
            })
        }
        
    })
   
</script>

<style>
    #instaPop{
        display: none;
        position: fixed;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,.5);
        z-index: 999;
    }
    #instaPop > svg{
        margin: 2%;
        align-self: self-end;
        cursor: pointer;
    }
    #bgInsta{
        background-color: #FFFFFF;
        display: flex;
        margin: 0 4%;
        max-width: 1000px;
        position: relative;
        height: 80%;
    }
    #leftInsta, #rightInsta,
    #leftImageInsta, #rightImageInsta{
        position: absolute;
        cursor: pointer;
        top: 50%;
    }
    #leftInsta{
        left: -7%;
        transform: translateY(-50%);
        z-index: 999;
    }
    #rightInsta{
        right: -7%;
        transform: translateY(-50%) rotate(180deg);
        z-index: 999;
    }
    #imgInsta{
        position: relative;
        /* overflow: hidden */
    }
    #multiImageInsta{
        position: absolute;
        top: 0;
        height: 100%;
    }
    #multiImgInnerInsta{
        position: relative;
        height: 100%;
    }
    #rightImageInsta{
        right: 0;
        transform: rotate(180deg);
    }
    #captionTime{
        max-width: 374px;
        overflow-y: scroll;
        height: 700px;
    }
    #timeInsta, #captionInsta{
        padding: 1rem;
    }
    @media screen and (max-width:1111px){
        #instaPop{
            justify-content: flex-start;
        }
        #bgInsta{
            max-width: 100%;
            flex-direction: column;
        }
        #imgInsta{
            max-width: 400px;
            width: 100%;
        }
        #captionTime{
            height: 200px;
        }
        #leftInsta{
            left: -15%;
        }
        #rightInsta{
            right: -15%;
        }
    }
    @media screen and (max-width:490px){
        #instaPop{
            padding-top: 1rem;
        }
        #leftInsta{
            left: -7%;
        }
        #rightInsta{
            right: -7%;
        }
    }
</style>
<div id="instaPop">
    <svg onclick="instaPop.style.display = 'none'" width="32px" height="32px" viewBox="0 -0.5 21 21">
        <g id="Dribbble-Light-Preview" transform="translate(-419.000000, -240.000000)" fill="#FFFFFF">
            <g id="icons" transform="translate(56.000000, 160.000000)">
                <polygon id="close-[#1511]" points="375.0183 90 384 98.554 382.48065 100 373.5 91.446 364.5183 100 363 98.554 371.98065 90 363 81.446 364.5183 80 373.5 88.554 382.48065 80 384 81.446"></polygon>
            </g>
        </g>
    </svg>
    <div id="bgInsta">
        <svg id="leftInsta" width="64" height="64" viewBox="0 0 24 24">
            <polyline fill="none" id="Left" points="15.5 5 8.5 12 15.5 19" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
        </svg>
        <svg id="rightInsta" width="64" height="64" viewBox="0 0 24 24">
            <polyline fill="none" id="Left" points="15.5 5 8.5 12 15.5 19" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
        </svg>

        <div id="imgInsta"></div>
        <div id="captionTime">
            <div id="timeInsta"></div>
            <div id="captionInsta"></div>
        </div>
    </div>
</div>

