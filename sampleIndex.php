<h3 class="flex items-center">
    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none">
        <path d="M12 7.90001C11.1891 7.90001 10.3964 8.14048 9.72218 8.59099C9.04794 9.0415 8.52243 9.68184 8.21211 10.431C7.90179 11.1802 7.8206 12.0046 7.9788 12.7999C8.13699 13.5952 8.52748 14.3258 9.10088 14.8992C9.67427 15.4725 10.4048 15.863 11.2001 16.0212C11.9955 16.1794 12.8198 16.0982 13.569 15.7879C14.3182 15.4776 14.9585 14.9521 15.409 14.2779C15.8596 13.6036 16.1 12.8109 16.1 12C16.1013 11.4612 15.9962 10.9275 15.7906 10.4295C15.585 9.93142 15.2831 9.47892 14.9021 9.09794C14.5211 8.71695 14.0686 8.415 13.5706 8.20942C13.0725 8.00385 12.5388 7.8987 12 7.90001ZM12 14.67C11.4719 14.67 10.9557 14.5134 10.5166 14.22C10.0776 13.9267 9.73534 13.5097 9.53326 13.0218C9.33117 12.5339 9.2783 11.9971 9.38132 11.4791C9.48434 10.9612 9.73863 10.4854 10.112 10.112C10.4854 9.73863 10.9612 9.48434 11.4791 9.38132C11.9971 9.2783 12.5339 9.33117 13.0218 9.53326C13.5097 9.73534 13.9267 10.0776 14.22 10.5166C14.5134 10.9557 14.67 11.4719 14.67 12C14.67 12.7081 14.3887 13.3873 13.888 13.888C13.3873 14.3887 12.7081 14.67 12 14.67ZM17.23 7.73001C17.23 7.9278 17.1714 8.12114 17.0615 8.28558C16.9516 8.45003 16.7954 8.57821 16.6127 8.65389C16.43 8.72958 16.2289 8.74938 16.0349 8.7108C15.8409 8.67221 15.6628 8.57697 15.5229 8.43712C15.3831 8.29727 15.2878 8.11909 15.2492 7.92511C15.2106 7.73112 15.2304 7.53006 15.3061 7.34733C15.3818 7.16461 15.51 7.00843 15.6744 6.89855C15.8389 6.78866 16.0322 6.73001 16.23 6.73001C16.4952 6.73001 16.7496 6.83537 16.9371 7.02291C17.1247 7.21044 17.23 7.4648 17.23 7.73001ZM19.94 8.73001C19.9691 7.48684 19.5054 6.28261 18.65 5.38001C17.7522 4.5137 16.5474 4.03897 15.3 4.06001C14 4.00001 10 4.00001 8.70001 4.06001C7.45722 4.0331 6.25379 4.49652 5.35001 5.35001C4.49465 6.25261 4.03093 7.45684 4.06001 8.70001C4.00001 10 4.00001 14 4.06001 15.3C4.03093 16.5432 4.49465 17.7474 5.35001 18.65C6.25379 19.5035 7.45722 19.9669 8.70001 19.94C10.02 20.02 13.98 20.02 15.3 19.94C16.5432 19.9691 17.7474 19.5054 18.65 18.65C19.5054 17.7474 19.9691 16.5432 19.94 15.3C20 14 20 10 19.94 8.70001V8.73001ZM18.24 16.73C18.1042 17.074 17.8993 17.3863 17.6378 17.6478C17.3763 17.9093 17.064 18.1142 16.72 18.25C15.1676 18.5639 13.5806 18.6715 12 18.57C10.4228 18.6716 8.83902 18.564 7.29001 18.25C6.94608 18.1142 6.63369 17.9093 6.37223 17.6478C6.11076 17.3863 5.90579 17.074 5.77001 16.73C5.35001 15.67 5.44001 13.17 5.44001 12.01C5.44001 10.85 5.35001 8.34001 5.77001 7.29001C5.90196 6.94268 6.10547 6.62698 6.36733 6.36339C6.62919 6.09981 6.94355 5.89423 7.29001 5.76001C8.83902 5.44599 10.4228 5.33839 12 5.44001C13.5806 5.33856 15.1676 5.44616 16.72 5.76001C17.064 5.89579 17.3763 6.10076 17.6378 6.36223C17.8993 6.62369 18.1042 6.93608 18.24 7.28001C18.66 8.34001 18.56 10.84 18.56 12C18.56 13.16 18.66 15.67 18.24 16.72V16.73Z" fill="#000000"/>
    </svg>
    久美浜遊漁船団
</h3>

<div id="gridApp" class="flex flex-wrap justify-center gap-4">    
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
    // raw data path
    $filePath = '/home/.../.../public_html/demo/backend/public/insta.txt';
    
    // get insta.txt
    $toBeRestored = file_get_contents($filePath);
    $data = unserialize($toBeRestored);

    // get time now
    $mytimeNow = Carbon\Carbon::now()->timestamp;

    // set and create insta.txt content
    function createInstaData($filePath, $instanames){
        $mytime = Carbon\Carbon::now()->add("1 minute")->timestamp;
        $dataInsta = [];
        foreach($instanames as $instaname){

            // テスト用アカウント
            // $instagram_business_account = "17841459232661561";
            // $access_token = "EABTxZAOmxqnIBAATjvkPL1hERWr2ZBcTp0U5JXGAF15ihXhGCt137U6ok2St3E68itLmFLupK9hiBSVkzNDbozXPR1Lf7ZBXWHTGdeZAkamA82eXUYStiBZCWOY1VZBh3LrtgL965IgXZCd6zMUnie3ytOCnVbBf6pXySDZADgG7O9oydZApW4g7O";

            $instagram_business_account = "17841453155525663";
            $access_token = "EAAN9muLE90ABAPepZCL79jmGKzY9VebDHMW3TmDiYpSzoZBnSWb6WuPASG5vH0yca2BxzPWRVZApM6tjsf4cbcTf2tKL8qv6WOUNRZBUJzsZAO0JZB8CZBfwa7EwXPVzjKaI023MbWzh6D7Ci1xDGWZC8MNmBVKvNQeZAHmDSpGgZAGdKRbgbHTN7C";

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://graph.facebook.com/v16.0/{$instagram_business_account}?fields=business_discovery.username({$instaname}){media{username,permalink,media_url,timestamp,media_type,comments_count,like_count,caption}}&access_token={$access_token}",
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
    if( $mytimeNow > $data["date"] ) createInstaData($filePath, $instanames);

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
                                <a class="insta_link" href="${element.permalink}" target="_blank" rel="noopener nofollow">
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
                    .sort( (a, b) => new Date(a.querySelector(".insta_date").innerText) - new Date(b.querySelector(".insta_date").innerText) )
                    .reverse()
                    sortDate.forEach(element => gridApp.append(element))
                    // 日付でインスタ並ぶ処理 end

                    // 表示数
                    let total = 7,
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

                })
                .catch(function (err) {
                    console.log("Something went wrong.", err)
                    username.innerHTML = "インスタ名が登録されてません"
                })
            })
        }
        
    })
   
</script>

