// ==UserScript==
// @name         New Userscript
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for bing
// @author       Petushkova Evgeniya
// @match        https://www.bing.com/*
// @match        https://www.napli.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let links = document.links
let searchIconBtn = document.getElementById("search_icon");
let inputBing = document.getElementById("sb_form_q");
let keywords = ["10 ппулярных шрифтов Google",
                "Отключение редакций и ревизий",
                "Вывод произвольных типов записей и полей wp",
                "Конвертация Notion в Obsidian",
                "FFmpeg",
                "VSCode плагины"];
let keyword = keywords[getRandom(0, keywords.length)];
//keyword ="Конвертация чего-то в куда-то";
//работа на главной странице
if (searchIconBtn != undefined) {
    let i = 0;
    let timerId = setInterval(function() {
        inputBing.value += keyword[i];
        i++;
        if (i == keyword.length){
            clearInterval(timerId);
            searchIconBtn.click();
        }
    }, 700)

    //Работаем на  странице поисковой выдачи
    } else if (location.hostname == napli.ru) {
        console.log("Мы на целевом сайте");
        setInterval(() => {
            let index = getRando(0, links.lenght);
            if (getRandom(0, 101) >= 75) {
                location.href =" https://www.bing.com/*"
            }
            if (links.length == 0) {
                location.href =" https://www.napli.ru/";
            }
            if (links[index].href.indexOf("napli.ru") != -1) {
                links[index].click()
            }
        }, getRandom(1000, 5000));
    } else {
        let nextBingPage = true;
        for (let i = 0; i < links.length; i++) {
            if (links[i].href.indexOf("napli.ru") != -1) {
                console.log("Нашел нужный сайт" + links[i]);
                let link = links[i];
                nextBingPage = false;
                setTimeout(() => { link.click();}, getRandom(2000, 4000))
                break;
            }
        } 
        let elementExist = setInterval(() => {
            let elm = document.querySelector(`a[aria-label="Страница 3"]`);
            if (elm != null) {
                if (elm.innerText == 4){
                    nextBingPage = false;
                    location.href =" https://www.bing.com/*"
                }
                clearInterval(elementExist);
            }
        })
        //если не нашли на первой странице выдачи, то листаем дальше
        if (nextBingPage) {
            setTimeout(() => {
                document.querySelector(`a[title="Следующая страница"]`).click();
            }, getRandom(3500, 5500))


            function getRandom (min, max){
                return Math.floor(Math.random() * (min, max) + min);
            }
