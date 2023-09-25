// Ce script permet de définir le nombre de followers (Il est préférable de le faire en php, mais pour les cours, on avais besoin de faire du javascript).
console.log("test");
const ytbapi =""; // Don't put api-key on client
youtubes = document.querySelectorAll(".stats.youtube");

console.log(youtubes);
youtubes.forEach(youtube => {//Youtube avait l'api la plus simple et permissive. Toute les autres API nécéssitent une connection Oauth et la récupération d'un token individuel pour récupéré les informations
    uid = youtube.getAttribute("id")
    console.log(uid);
    fetch("https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&id="+uid+"&key="+ytbapi).then((res)=>{
        console.log(res);    
    res.json().then((res)=>{
            let p = youtube.getElementsByTagName("p")[0]
            let sc = res["items"][0]["statistics"]["subscriberCount"]
            if (sc > 1000000){
                sc = sc/1000000+"M";
            }
            console.log();
            p.innerHTML = sc
            console.log(res);
        })
    })

});