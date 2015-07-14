$(document).ready(function(){
                $("#accordion").accordion();
                animarLogomarcasParceiros();
                function animarLogomarcasParceiros(){
                    $("#logomarcasParceiros").animate({left: '0%'}, 10000);
                    $("#logomarcasParceiros").animate({left: '-50%'}, 10000, animarLogomarcasParceiros);
                }                
            });