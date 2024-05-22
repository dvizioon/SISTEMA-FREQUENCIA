
 function verficar(number){

    var code = number.charCode ? number.charCode : number.keyCode;

    if(code != 8 && code != 9){

        if(code < 48 || code > 57){
            return false;
        }
    }
    

 }


const btn = document.querySelector('.btn_archiver');
const alfa = document.querySelector('.alfa_archiver');
const span = document.querySelector('.span');

const btn_beta = document.querySelector('.btn_beta_archiver');
const zone = document.querySelector('.zone_archiver');

btn.onclick=()=>{
    
    if(btn.innerHTML == '📂'){
        btn.innerHTML = '📁'
        span.innerHTML = "Aberta";
        alfa.style.display = 'block';
    }
    else{
        btn.innerHTML = '📂';
        btn_beta.innerHTML ='📂';
        span.innerHTML = "Fechada";
        zone.style.display = 'none';
        alfa.style.display = 'none';
    }

    
}


btn_beta.onclick = function(){
    if(btn_beta.innerHTML == '📂'){
        btn_beta.innerHTML ='📁';
        zone.style.display = 'block';
    }
    else{
        btn_beta.innerHTML ='📂';
        zone.style.display = 'none';
    }
    
}



function trocar_svg(){

    const open = document.querySelector('.open');

    if(open.src = 'img/door-open.svg'){
        open.src = 'img/door-closed.svg';
    }


}

function destrocar(){
    const open = document.querySelector('.open');

    if(open.src = 'img/door-closed.svg'){
        open.src = 'img/door-open.svg';
        
    }
}


const alert_min = document.querySelector('.alert_min');

function contador(){

    setTimeout(()=>{
        alert_min.style.display= 'none';
    },4000)

}

setInterval(contador,1000)



new window.VLibras.Widget('https://vlibras.gov.br/app');