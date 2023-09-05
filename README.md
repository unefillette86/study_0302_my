// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for bing
// @author       Petushkova Evgeniya
// @match        https://www.bing.com/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let links = document.links
let searchIcon = document.getElementById("search_icon");
let inputBing = document.getElementById("sb_form_q");
let keywords = ["Самые популярные художники-импрессионисты", 
                "Импрессиониз во Франции", 
                "Художники-импрессионисты Испании"];
let keyword = keywords[getRandom(0, keywords.length)];


if (searchIcon != undefined) {
    let i = 0;
    let timerId = setInterval(function() {
        inputBing.value += keyword[i];
        i++;
        if (i == keyword.length){
            clearInterval(timerId);
            searchIcon.click();
        }
    }, 700)
    } else {
        for (let i = 0; i < links.length; i++) {
            if (links[i].href.indexOf("arts-dnevnik.ru") != -1) {
                console.log("Нашел нужный сайт" + links[i]);
                let link = links[i];
                setTimeout(() => { link.click();}, getRandom(2000, 4000))
                break;
            }
        }     
    }   


function getRandom (min, max){
    return Math.floor(Math.random() * (min, max) + min);
}
