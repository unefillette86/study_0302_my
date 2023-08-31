// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for yandex
// @author       Petushkova Evgeniya
// @match        https://ya.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==


let links = document.links
let btn = document.querySelector(`button[type="submit"]`).click();
let input = document.getElementsByName("text")[0];
let keywords = ["10 самых популярных аниме",
            "топ аниме-мультфильмов",
            "самые любимые герои аниме"]
let keyword = keywords[getRandom(0, keywords.length)];
if (btn != undefined) {
    input.value = keyword;
    btn.click;
} else {
 for (let i = 0; i < links.length; i++) {
        if (links[i].href.indexOf("blog.eldorado.ru") != -1){
            console.log("Нашел строку " + links[i]);
            links[i].click();
            break;
        }
    }
}

function getRandom(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}
